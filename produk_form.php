<?php
$obj_jenis = new Jenis();
$rs = $obj_jenis->index();

$ar_kondisi = ['Baru', 'Second'];
?>

<div class="container px-5 my-5">
    <h3>Form Produk</h3>
    <form method="POST" action="controller/produkController.php">

        <div class="form-floating mb-3">
            <input class="form-control" name="kode" id="kodeProduk" type="text" placeholder="Kode Produk" required />
            <label for="kodeProduk">Kode Produk</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="nama" id="namaProduk" type="text" placeholder="Nama Produk" required />
            <label for="namaProduk">Nama Produk</label>
        </div>

        <!-- KONDISI -->
        <div class="mb-3">
            <label class="form-label d-block">Kondisi Produk</label>
            <?php foreach ($ar_kondisi as $kondisi) { ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kondisi" value="<?= $kondisi ?>" required>
                    <label class="form-check-label"><?= $kondisi ?></label>
                </div>
            <?php } ?>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="harga" id="hargaProduk" type="number" placeholder="Harga Produk" required />
            <label for="hargaProduk">Harga Produk</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="stok" id="stokProduk" type="number" placeholder="Stok Produk" required />
            <label for="stokProduk">Stok Produk</label>
        </div>

        <!-- JENIS -->
        <div class="form-floating mb-3">
            <select class="form-select" name="idjenis" id="jenisProduk" required>
                <option value="">-- Pilih Jenis --</option>
                <?php foreach ($rs as $jenis) { ?>
                    <option value="<?= $jenis['id'] ?>">
                        <?= $jenis['nama'] ?>
                    </option>
                <?php } ?>
            </select>
            <label for="jenisProduk">Jenis Produk</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="foto" id="fotoProduk" type="text" placeholder="Foto Produk" />
            <label for="fotoProduk">Foto Produk</label>
        </div>

        <div class="text-center">
            <button class="btn btn-primary" name="proses" type="submit" value="simpan">Simpan</button>
            <a href="index.php?hal=produk_list" class="btn btn-info">Kembali</a>
        </div>

    </form>
</div>