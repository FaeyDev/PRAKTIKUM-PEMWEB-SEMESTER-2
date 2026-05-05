<?php
class Profil
{
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function getProfil() {
        // Ambil data profil baris pertama (id 1)
        $sql = "SELECT * FROM profil WHERE id=1";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
    public function ubah($data) {
        $sql = "UPDATE profil SET nama=?, deskripsi=?, foto=?, email=?, linkedin=?, github=?, instagram=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }
}
?>