<?php
/* Connect to a MySQL database using driver invocation */
// UBAH DBNAME DI SINI
 $dsn = 'mysql:dbname=db_profile;host=localhost;port=3306'; 
 $user = 'root';
 $password = '';

 $dbh = null;

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<div style="color: red; padding: 20px;">';
    echo 'Koneksi Gagal: ' . $e->getMessage();
    echo '</div>';
    $dbh = null;
}
?>