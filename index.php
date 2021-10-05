<?php
session_start();

// cek apakah ada session login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Ambil data mahasiswa dari object $result
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
    if ($mahasiswa == null) {
        $kosong = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
            <div class="row mb-5 pb-5">
                <div class="col-md-12 mt-2">
                    <h1 class="pt-5">Data Mahasiswa</h1>
                </div>
                <div class="col-md-12">
                    <h4 class="mt-5 mb-3 fw-light">Cari Mahasiswa</h4>
                    <form action="" method="post">
                        <div class="input-group mb-4">
                            <input id="keyword" type="text" class="form-control" placeholder="Masukkan Nama atau NPM" autocomplete="off" name="keyword">
                            <button id="tombol-cari" class="btn btn-outline-primary" type="submit" id="button-addon2" name="cari">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 m-3">
                    <a href="tambah.php" class="btn btn-primary px-4 my-1">Tambah Data</a>
                </div>
                <div id="sub-container">
                    <div class="col-md-12 m-2">
                        <table class="table table-hover border border-dark text-center">
                            <tr class="table-primary">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Aksi</th>
                            </tr>

                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $mhs) { ?>
                                <tr class="mt-3">
                                    <td><?= $i; ?></td>
                                    <td><?= $mhs["nama"]; ?></td>
                                    <td><?= $mhs["npm"]; ?></td>
                                    <td>
                                        <a href="profile.php?id=<?= $mhs['id']; ?>" class="btn btn-primary px-3 my-1">
                                            Profile
                                        </a>
                                        <a href="edit.php?id=<?= $mhs['id']; ?>" class="btn btn-success px-4 my-1">
                                            Edit
                                        </a>
                                        <a href="hapus.php?id=<?= $mhs["id"]; ?>" class="btn btn-warning px-3 my-1" onclick="return confirm('Hapus Data?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        </table>

                        <?php if (isset($kosong)) { ?>
                            <div class="col-md-12 m-3">
                                <h4 class="mt-5 mb-3 fw-light text-center">Data Tidak Ditemukan!</h4>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-auto bg-light">
        <div class="container-fluid p-3" style="background-color: #2A0944;">
            <span class="text-muted">Copyright 2021 @AhmadNaufalF</span>
        </div>
    </footer>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>