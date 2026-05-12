<?php
// form get
$nama = "";
$alamat = "";

if (isset($_GET['proses'])) {
    $nama = $_GET['nama'] ?? "";
    $alamat = $_GET['alamat'] ?? "";
}
?>

<h3>FORM GET</h3>
<form method="get">
    <label>Nama</label><br>
    <input type="text>" name="nama"><br>

    <label>Alamat</label><br>
    <input name="alamat"></textarea><br>

    <input type="submit" name="proses" value="simpan">
</form>

<hr>

<?php
$username = "";
$pw = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? "";
    $pw = $_POST['pass'] ?? "";
}
?>

<h3>FORM POST</h3>
<form method="POST">
    <label>Username</label><br>
    <input type="text>" name="username"><br>

    <label>Password</label><br>
    <input type="password" name="pass"><br>

    <input type="submit" name="login" value="login">
</form>

<?php if (isset($_POST['login'])): ?>
    <p>
        <strong>Hasil method POST:</strong><br>
        Hello <?= htmlspecialchars($username) ?>,
        password Anda <?= htmlentities($pw) ?>
    </p>
<?php endif; ?>