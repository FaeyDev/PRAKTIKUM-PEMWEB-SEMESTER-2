<?php
class Organisasi
{
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function index() {
        return $this->koneksi->query("SELECT * FROM organisasi ORDER BY id DESC");
    }
    public function simpan($data) {
        $sql = "INSERT INTO organisasi (nama_organisasi, jabatan, periode, deskripsi, foto) VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }
    public function getOrganisasi($id) {
        $sql = "SELECT * FROM organisasi WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
    public function ubah($data) {
        $sql = "UPDATE organisasi SET nama_organisasi=?, jabatan=?, periode=?, deskripsi=?, foto=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }
    public function hapus($id) {
        $sql = "DELETE FROM organisasi WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$id]);
    }
    public function cari($keyword)
{
    $sql = "SELECT * FROM organisasi 
            WHERE nama_organisasi LIKE ? 
            OR jabatan LIKE ? 
            OR deskripsi LIKE ?";
    $ps = $this->koneksi->prepare($sql);
    $keyword_like = '%' . $keyword . '%';
    $ps->execute([$keyword_like, $keyword_like, $keyword_like]);
    return $ps;
}
}
?>