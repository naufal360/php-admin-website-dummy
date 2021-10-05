<?php

require '../functions.php';

$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa WHERE
        nama LIKE '%$keyword%' OR
        npm LIKE '%$keyword%'
    ";
$mahasiswa = query($query);

// cek klo keyword ga ditemukan datanya
if ($mahasiswa == null) {
    $kosong = true;
}

?>

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