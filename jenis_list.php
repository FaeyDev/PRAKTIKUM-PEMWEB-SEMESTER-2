<?php
$obj = new Jenis();
$rs = $obj->index();
?>

<div class="container mt-4">
    <h3>Data Jenis Produk</h3>
    <a href="index.php?hal=jenis_form" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rs)) {
                $no = 1;
                foreach ($rs as $row) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td>
                            <!-- DETAIL -->
                            <a href="index.php?hal=jenis_detail&id=<?= $row['id'] ?>"
                                class="btn btn-info btn-sm" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>

                            <!-- EDIT -->
                            <a href="index.php?hal=jenis_form&id=<?= $row['id'] ?>"
                                class="btn btn-warning btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- HAPUS (FORM SENDIRI) -->
                            <form method="POST" action="controller/jenisController.php"
                                style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="proses" value="hapus"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="3" class="text-center">
                        Data belum tersedia
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>