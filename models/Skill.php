<?php
class Skill
{
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function index() {
        return $this->koneksi->query("SELECT * FROM skill ORDER BY id DESC");
    }
    public function simpan($data) {
        $sql = "INSERT INTO skill (nama_skill, kategori, level) VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }
    public function getSkill($id) {
        $sql = "SELECT * FROM skill WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
    public function ubah($data) {
        $sql = "UPDATE skill SET nama_skill=?, kategori=?, level=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }
    public function hapus($id) {
        $sql = "DELETE FROM skill WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$id]);
    }
    public function cari($keyword)
{
    $sql = "SELECT * FROM skill 
            WHERE nama_skill LIKE ? 
            OR kategori LIKE ?";
    $ps = $this->koneksi->prepare($sql);
    $keyword_like = '%' . $keyword . '%';
    $ps->execute([$keyword_like, $keyword_like]);
    return $ps;
}
}
?>