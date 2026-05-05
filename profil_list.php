<?php
 $obj = new Profil();
 $row = $obj->getProfil();
?>
<div class="card card-custom p-4">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h4 class="mb-0 text-primary fw-bold">About Me</h4>

        <!-- TOMBOL EDIT (HANYA UNTUK ADMIN) -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
        <a href="index.php?hal=profil_form" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Edit</a>
        <?php else: ?>
        <span class="badge bg-secondary text-white">Mode View Only</span>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="img/<?= $row['foto'] ?>" class="img-fluid rounded shadow-sm" style="max-width:200px;"
                    alt="Profil">
            </div>
            <div class="col-md-8">
                <h3 class="fw-bold"><?= $row['nama'] ?></h3>
                <p class="text-muted"><i class="bi bi-envelope"></i> <?= $row['email'] ?></p>
                <hr>
                <p><?= nl2br($row['deskripsi']) ?></p>

                <!-- SOSIAL MEDIA (DENGAN AUTO-FIX HTTPS) -->
                <div class="mt-3">
                    <!-- LinkedIn -->
                    <?php if($row['linkedin']): ?>
                    <?php 
                        $link = $row['linkedin'];
                        if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
                            $link = "https://" . $link;
                        }
                    ?>
                    <a href="<?= $link ?>" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                        <i class="bi bi-linkedin"></i> LinkedIn
                    </a>
                    <?php endif; ?>

                    <!-- GitHub -->
                    <?php if($row['github']): ?>
                    <?php 
                        $linkGithub = $row['github'];
                        if (!preg_match("~^(?:f|ht)tps?://~i", $linkGithub)) {
                            $linkGithub = "https://" . $linkGithub;
                        }
                    ?>
                    <a href="<?= $linkGithub ?>" target="_blank" class="btn btn-sm btn-dark me-2">
                        <i class="bi bi-github"></i> GitHub
                    </a>
                    <?php endif; ?>

                    <!-- Instagram -->
                    <?php if($row['instagram']): ?>
                    <?php 
                        $linkInsta = $row['instagram'];
                        if (!preg_match("~^(?:f|ht)tps?://~i", $linkInsta)) {
                            $linkInsta = "https://" . $linkInsta;
                        }
                    ?>
                    <a href="<?= $linkInsta ?>" target="_blank" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>