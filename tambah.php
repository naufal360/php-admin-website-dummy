<?php
session_start();

// cek apakah ada session login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// cek form sudah submit
if (isset($_POST['submit'])) {

    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar sticky-top navbar-light" style="background-color: #2A0944;">
        <div class="container-fluid">
            <a class="navbar-brand p-3 d-inline-flex" href="#">
                <h4 style="color: whitesmoke;">Universitas Guara-Guara</h4>
            </a>
            <a class="navbar-brand p-3 d-inline-flex" href="logout.php">
                <h6 style="color: whitesmoke;">Logout</h6>
            </a>
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5 mb-3">
                    <h2>Tambah Data Mahasiswa</h2>
                </div>
                <div class="col-md-12">
                    <a href="index.php" class="btn btn-info px-4 my-1">Kembali</a>
                </div>
                <div class="col-md-12 my-3">
                    <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" class="form-control" id="npm" name="npm" maxlength="8" autocomplete="off">
                        </div>
                        <div class="col-md-8">
                            <label for="semester" class="form-label">Semester</label>
                            <select id="semester" class="form-select" name="semester">
                                <option selected>Pilih...</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                            </select>
                        </div>
                        <div class="col-md12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                        </div>
                        <div class="col-md-12">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select id="jurusan" class="form-select" name="jurusan">
                                <option selected>Pilih...</option>
                                <option>Teknik Informatika</option>
                                <option>Teknik Industri</option>
                                <option>Teknik Arsitektur</option>
                                <option>Seni Musik</option>
                                <option>Ahli Gizi</option>
                                <option>Kesehatan Masyarakat</option>
                                <option>Psikologi</option>
                                <option>Hukum</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="telepon" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" maxlength="14" autocomplete="off">
                        </div>
                        <div class="col-md-12">
                            <label for="gambar" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-auto bg-light">
        <div class="container-fluid p-3" style="background-color: #2A0944;">
            <span class="text-muted">Copyright 2021 @AhmadNaufalF</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>