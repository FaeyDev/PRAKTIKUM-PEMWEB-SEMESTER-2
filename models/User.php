<?php
class User
{
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    // Fungsi Register (Simpan User Baru)
    public function simpan($data) {
        $sql = "INSERT INTO users (fullname, email, username, password) VALUES (?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }

    // Fungsi Login (Cek User)
    public function cekLogin($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ? OR username = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$email, $password]); // Mencari berdasarkan email atau username
        $rs = $ps->fetch();
        
        if ($rs) {
            // Cek apakah password cocok (Hash verification)
            if (password_verify($password, $rs['password'])) {
                return $rs;
            }
        }
        return false;
    }
}
?>