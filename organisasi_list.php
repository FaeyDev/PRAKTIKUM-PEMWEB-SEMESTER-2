<?php
include_once 'koneksi.php';
include_once 'models/Organisasi.php';

 $obj = new Organisasi();
 $rs = $obj->index();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="section-title m-0">Pengalaman Organisasi</h3>
    <a href="index.php?hal=organisasi_form" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Organisasi</a>
</div>

<div class="row g-2">
    <?php foreach($rs as $row): ?>
    <div class="col-6 col-md-6 mb-3">
        <div class="card shadow h-100 border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <?php if($row['foto']): ?>
                    <img src="img/<?= $row['foto'] ?>" class="img-fluid rounded-start h-100" style="object-fit:cover;"
                        alt="...">
                    <?php else: ?>
                    <img src="https://via.placeholder.com/200x300" class="img-fluid rounded-start h-100" alt="...">
                    <?php endif; ?>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['nama_organisasi'] ?></h5>
                        <p class="badge bg-primary mb-2"><?= $row['jabatan'] ?></p>
                        <p class="card-text small text-muted mb-1"><i class="bi bi-calendar"></i> <?= $row['periode'] ?>
                        </p>
                        <p class="card-text text-truncate" style="max-height: 40px;"><?= $row['deskripsi'] ?></p>

                        <!-- TOMBOL TAMPIL (Satu Baris) -->
                        <div class="mt-3 d-flex flex-wrap gap-2">
                            <!-- LIHAT DETAIL (Admin & User) -->
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#modalOrganisasi" onclick="fillOrganisasi(this)"
                                data-nama="<?= $row['nama_organisasi'] ?>" data-jabatan="<?= $row['jabatan'] ?>"
                                data-periode="<?= $row['periode'] ?>"
                                data-desc="<?= htmlspecialchars($row['deskripsi']) ?>" data-foto="<?= $row['foto'] ?>">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </button>

                            <!-- EDIT/HAPUS (Hanya Admin) -->
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                            <div class="d-flex gap-1">
                                <a href="index.php?hal=organisasi_form&id=<?= $row['id'] ?>"
                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="controller/organisasiController.php" method="POST"
                                    style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="proses" value="hapus" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- MODAL DETAIL ORGANISASI -->
<div class="modal fade" id="modalOrganisasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-custom">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="modalTitleOrganisasi">Detail Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 text-center mb-3 mb-md-0">
                        <img id="viewFotoOrg" src="" class="img-fluid rounded shadow-sm" style="max-width:200px;">
                    </div>
                    <div class="col-md-7">
                        <h4 class="fw-bold mb-2" id="viewNamaOrg">-</h4>
                        <span class="badge bg-primary mb-3" id="viewJabatanOrg">-</span>
                        <p class="small text-muted"><i class="bi bi-calendar"></i> <span id="viewPeriodeOrg">-</span>
                        </p>
                        <p id="viewDeskripsiOrg" class="text-justify mt-3">-</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function fillOrganisasi(btn) {
    document.getElementById('modalTitleOrganisasi').textContent = "Detail " + btn.getAttribute('data-nama');
    document.getElementById('viewNamaOrg').textContent = btn.getAttribute('data-nama');
    document.getElementById('viewJabatanOrg').textContent = btn.getAttribute('data-jabatan');
    document.getElementById('viewPeriodeOrg').textContent = btn.getAttribute('data-periode');
    document.getElementById('viewDeskripsiOrg').textContent = btn.getAttribute('data-desc');

    var foto = btn.getAttribute('data-foto');
    if (foto) {
        document.getElementById('viewFotoOrg').src = "img/" + foto;
    } else {
        document.getElementById('viewFotoOrg').src = "https://via.placeholder.com/200x300";
    }
}
</script>