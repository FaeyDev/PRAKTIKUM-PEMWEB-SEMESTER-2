<?php
class Pendidikan
{
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function index() {
        return $this->koneksi->query("SELECT * FROM pendidikan ORDER BY id DESC");
    }
    public function simpan($data) {
        $sql = "INSERT INTO pendidikan (jenjang, nama_sekolah, tahun_lulus, deskripsi) VALUES (?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }
    public function getPendidikan($id) {
        $sql = "SELECT * FROM pendidikan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
    public function ubah($data) {
        $sql = "UPDATE pendidikan SET jenjang=?, nama_sekolah=?, tahun_lulus=?, deskripsi=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }
    public function hapus($id) {
        $sql = "DELETE FROM pendidikan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$id]);
    }
    public function cari($keyword)
{
    $sql = "SELECT * FROM pendidikan 
            WHERE nama_sekolah LIKE ? 
            OR jenjang LIKE ? 
            OR deskripsi LIKE ?";
    $ps = $this->koneksi->prepare($sql);
    $keyword_like = '%' . $keyword . '%';
    $ps->execute([$keyword_like, $keyword_like, $keyword_like]);
    return $ps;
}
}
?>