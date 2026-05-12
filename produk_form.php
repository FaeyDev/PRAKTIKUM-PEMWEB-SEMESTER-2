<?php
$obj_jenis = new Jenis();
$rs = $obj_jenis->index();
$ar_kondisi = ['Baru', 'Second'];

// ambil id dengan aman
$id = $_GET['id'] ?? null;
$obj_produk = new Produk();
if (!empty($id)) {
    $row = $obj_produk->getProduk($id);
} else {
    $row = [];
}

// helper biar ga ribet isset
function val($row, $key)
{
    return isset($row[$key]) ? $row[$key] : '';
}
?>

<div class="container px-5 my-5">
    <h3>Form Produk</h3>
    <form method="POST" action="controller/produkController.php">
        <div class="form-floating mb-3">
            <input class="form-control" name="kode"
                value="<?= val($row, 'kode') ?>"
                type="text" placeholder="Kode Produk" required>
            <label>Kode Produk</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="nama"
                value="<?= val($row, 'nama') ?>"
                type="text" placeholder="Nama Produk" required>
            <label>Nama Produk</label>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Kondisi Produk</label>
            <?php foreach ($ar_kondisi as $kondisi) {
                $cek = (val($row, 'kondisi') == $kondisi) ? "checked" : "";
            ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                        name="kondisi" value="<?= $kondisi ?>" <?= $cek ?> required>
                    <label class="form-check-label"><?= $kondisi ?></label>
                </div>
            <?php } ?>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="harga"
                value="<?= val($row, 'harga') ?>"
                type="number" placeholder="Harga Produk" required>
            <label>Harga Produk</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="stok"
                value="<?= val($row, 'stok') ?>"
                type="number" placeholder="Stok Produk" required>
            <label>Stok Produk</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="idjenis" required>
                <option value="">-- Pilih Jenis Produk --</option>
                <?php foreach ($rs as $jenis) {
                    $sel = (val($row, 'idjenis') == $jenis['id']) ? "selected" : "";
                ?>
                    <option value="<?= $jenis['id'] ?>" <?= $sel ?>>
                        <?= $jenis['nama'] ?>
                    </option>
                <?php } ?>
            </select>
            <label>Jenis Produk</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="foto"
                value="<?= val($row, 'foto') ?>"
                type="text" placeholder="Foto Produk">
            <label>Foto Produk</label>
        </div>
        <div class="text-center">
            <?php if (empty($id)) { ?>
                <button class="btn btn-primary" name="proses" value="simpan">
                    Simpan
                </button>
            <?php } else { ?>
                <button class="btn btn-success" name="proses" value="ubah">
                    Ubah
                </button>
                <input type="hidden" name="idx" value="<?= $id ?>">
            <?php } ?>

            <a href="index.php?hal=produk_list" class="btn btn-info">
                Kembali
            </a>
        </div>
    </form>
</div>