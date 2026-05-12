<?php
$id = $_GET['id'] ?? null;
$obj = new Jenis();

if ($id) {
    $row = $obj->getJenis($id);
} else {
    $row = [];
}

function val($r, $k)
{
    return isset($r[$k]) ? $r[$k] : '';
}
?>

<div class="container mt-4">
    <h3>Form Jenis</h3>

    <form method="POST" action="controller/jenisController.php">

        <div class="mb-3">
            <label>Nama Jenis</label>
            <input type="text" name="nama" class="form-control"
                value="<?= val($row, 'nama') ?>" required>
        </div>

        <?php if (empty($id)) { ?>
            <button class="btn btn-primary" name="proses" value="simpan">Simpan</button>
        <?php } else { ?>
            <button class="btn btn-success" name="proses" value="ubah">Ubah</button>
            <input type="hidden" name="idx" value="<?= $id ?>">
        <?php } ?>

        <a href="index.php?hal=jenis_list" class="btn btn-secondary">Kembali</a>
    </form>
</div>