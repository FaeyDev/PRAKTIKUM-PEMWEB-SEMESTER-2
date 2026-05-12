<?php
class Jenis
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function index()
    {
        return $this->koneksi->query("SELECT * FROM jenis ORDER BY id DESC");
    }

    public function getJenis($id)
    {
        $sql = "SELECT * FROM jenis WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO jenis (nama) VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }

    public function ubah($data)
    {
        $sql = "UPDATE jenis SET nama=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }

    public function hapus($id)
    {
        $sql = "DELETE FROM jenis WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$id]);
    }
}