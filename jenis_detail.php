<?php
$id = $_GET['id'] ?? null;

$obj = new Jenis();
$row = $obj->getJenis($id);
?>

<div class="container mt-4">
    <h3>Detail Jenis</h3>

    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $row['id'] ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?= $row['nama'] ?></td>
        </tr>
    </table>

    <a href="index.php?hal=jenis_list" class="btn btn-secondary">Kembali</a>
</div>