<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "guara_db");
// Ambil data
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $npm = htmlspecialchars($data['npm']);
    $semester = htmlspecialchars($data['semester']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $telepon = htmlspecialchars($data['telepon']);

    $gambar = upload();
    // cek sudah upload?
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa
        VALUES
        ('','$nama','$npm','$semester','$email','$jurusan','$telepon','$gambar')
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada error dalam upload
    if ($error === 4) {
        echo "
            <script>
                alert('Pilih Gambar dahulu');
            </script>
        ";
        return false;
    }

    // cek ekstensi file
    $validEkstensi = ['jpg', 'jpeg', 'png'];
    $gambarEkstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($gambarEkstensi, $validEkstensi)) {
        echo "
            <script>
                alert('Pilih Ekstensi yg tepat(jpg/jpeg/png)');
            </script>
        ";
        return false;
    }

    // cek ukuran file
    $bait = 2000000;
    if ($ukuranFile > $bait) {
        echo "
            <script>
                alert('Ukuran gambar lebih dari 1 mb');
            </script>
        ";
        return false;
    }

    // lolos 3 tahap pengecekan
    // generate id unik utk nama gambar biar gaada nama yg sama
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $gambarEkstensi;

    move_uploaded_file($tmpName, 'img/' . $namaFilebaru);

    return $namaFilebaru;
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $npm = htmlspecialchars($data['npm']);
    $semester = htmlspecialchars($data['semester']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $telepon = htmlspecialchars($data['telepon']);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek upload gambar baru?
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
        nama = '$nama',
        npm = '$npm',
        semester = '$semester',
        email = '$email',
        jurusan = '$jurusan',
        telepon = '$telepon',
        gambar = '$gambar'
        WHERE id = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE
        nama LIKE '%$keyword%' OR
        npm = '$keyword'
    ";

    return query($query);
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username kosong atau tidak
    if (empty(trim($username))) {
        echo "
            <script>
                alert('Username tidak boleh kosong!');
            </script>
        ";
        return false;
    }

    // cek username terdaftar atau belum
    $res_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($res_username)) {
        echo "
            <script>
                alert('Username sudah terdaftar!');
            </script>
        ";
        return false;
    }

    // cek password sama atau tidak
    if ($password !== $password2) {
        echo "
            <script>
                alert('Password tidak sesuai');
            </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // memasukan ke database
    $query = "INSERT INTO users VALUES(
        '', '$username', '$password')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
