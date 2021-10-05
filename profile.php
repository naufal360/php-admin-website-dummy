<?php
session_start();

// cek apakah ada session login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// menampung id
$id = $_GET['id'];

// memanggil data
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Side - Profile</title>
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
            <div class="row my-5">
                <div class="d-flex justify-content-start m-2 p-2">
                    <h1 class="mb-2">Profile</h1>
                </div>
                <div class="col-md-12 m-3 p-4">
                    <img src="img/<?= $mhs['gambar']; ?>" class="card-img-top" alt="Profile-image" style="width: 18rem; border-radius: 50%; display:block; margin-left:auto; margin-right:auto;">
                </div>
                <div class="card d-inline-flex col-md-12 m-2 p-4">
                    <div class="m-1 p-2">
                        <h4 class="text-center pb-2">Biodata</h4>
                    </div>
                    <div class="card-body m-3 p-2">
                        <ul style="list-style-type:none;">
                            <li>Nama : <?= $mhs['nama']; ?></li>
                            <li>NPM : <?= $mhs['npm']; ?></li>
                            <li>Semester : <?= $mhs['semester']; ?></li>
                            <li>Email : <?= $mhs['email']; ?></li>
                            <li>Jurusan : <?= $mhs['jurusan']; ?></li>
                            <li>Telepon : <?= $mhs['telepon']; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <a href="edit.php?id=<?= $mhs['id']; ?>" class="btn btn-primary px-4 my-1">
                        Edit
                    </a>
                    <a href="index.php" class="btn btn-info px-3 my-1">
                        Kembali
                    </a>
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