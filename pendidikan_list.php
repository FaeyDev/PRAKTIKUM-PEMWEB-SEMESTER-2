<?php
include_once 'koneksi.php';
include_once 'models/Pendidikan.php';

 $obj = new Pendidikan();
 $rs = $obj->index();
?>

<div class="card card-custom p-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Riwayat Pendidikan</h5>

        <!-- Tombol Tambah (Hanya Admin) -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
        <a href="index.php?hal=pendidikan_form" class="btn btn-sm btn-primary">+ Tambah Data</a>
        <?php else: ?>
        <span class="badge bg-secondary text-white">Mode View Only</span>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <?php foreach($rs as $row): ?>
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-bold mb-1"><?= $row['jenjang'] ?> - <?= $row['nama_sekolah'] ?></h6>
                        <small class="text-muted">Lulus: <?= $row['tahun_lulus'] ?></small>
                    </div>

                    <!-- WRAPPER TOMBOL (BERBEDA BERDASARKAN ROLE) -->
                    <div class="d-flex gap-2">
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                        <!-- LAYOUT ADMIN: Berjejer (Flex) -->
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#modalPendidikan" onclick="fillPendidikan(this)"
                            data-jenjang="<?= $row['jenjang'] ?>" data-sekolah="<?= $row['nama_sekolah'] ?>"
                            data-tahun="<?= $row['tahun_lulus'] ?>"
                            data-desc="<?= htmlspecialchars($row['deskripsi']) ?>">
                            <i class="bi bi-eye"></i>
                        </button>
                        <a href="index.php?hal=pendidikan_form&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i
                                class="bi bi-pencil"></i></a>
                        <form action="controller/pendidikanController.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="proses" value="hapus" class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i></button>
                        </form>
                        <?php else: ?>
                        <!-- LAYOUT USER: Tombol Detail Tepat di Tengah (Text-Center) -->
                        <div class="text-center ms-auto">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#modalPendidikan" onclick="fillPendidikan(this)"
                                data-jenjang="<?= $row['jenjang'] ?>" data-sekolah="<?= $row['nama_sekolah'] ?>"
                                data-tahun="<?= $row['tahun_lulus'] ?>"
                                data-desc="<?= htmlspecialchars($row['deskripsi']) ?>">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- MODAL DETAIL PENDIDIKAN -->
<div class="modal fade" id="modalPendidikan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-custom">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="modalTitlePendidikan">Detail Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="bi bi-mortarboard-fill text-primary fs-1"></i>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <td width="30%"><strong>Jenjang</strong></td>
                        <td id="viewJenjang"></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Sekolah</strong></td>
                        <td id="viewSekolah"></td>
                    </tr>
                    <tr>
                        <td><strong>Tahun Lulus</strong></td>
                        <td id="viewTahun"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                            <strong>Deskripsi:</strong>
                            <p id="viewDeskripsi" class="mt-2 text-muted"></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function fillPendidikan(btn) {
    document.getElementById('modalTitlePendidikan').innerText = btn.getAttribute('data-jenjang');
    document.getElementById('viewJenjang').innerText = btn.getAttribute('data-jenjang');
    document.getElementById('viewSekolah').innerText = btn.getAttribute('data-sekolah');
    document.getElementById('viewTahun').innerText = btn.getAttribute('data-tahun');
    document.getElementById('viewDeskripsi').innerText = btn.getAttribute('data-desc');
}
</script>