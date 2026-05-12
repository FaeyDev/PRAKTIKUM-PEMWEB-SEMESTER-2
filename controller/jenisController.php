<?php
include_once '../koneksi.php';
include_once '../models/Jenis.php';

$obj = new Jenis();
$proses = $_POST['proses'] ?? '';
$nama = $_POST['nama'] ?? '';

switch ($proses) {
    case 'simpan':
        $obj->simpan([$nama]);
        break;
    case 'ubah':
        $id = $_POST['idx'] ?? '';
        if (!empty($id)) {
            $obj->ubah([$nama, $id]);
        }
        break;
    case 'hapus':
        $id = $_POST['id'] ?? '';
        if (!empty($id)) {
            $obj->hapus($id);
        }
        break;
}

header("Location: ../index.php?hal=jenis_list");
exit;