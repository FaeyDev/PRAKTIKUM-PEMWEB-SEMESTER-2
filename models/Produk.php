<?php
class Produk
{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh; //memanggil variabel di file lain
        $this->koneksi = $dbh;
    }
    //member3 fungsionalitas CRUD
    public function index()
    {
        $sql = "SELECT * FROM produk ORDER BY id DESC";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO produk (kode,nama,kondisi,harga,stok,idjenis,foto)
                VALUES (?,?,?,?,?,?,?)";
        //PDO prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}