<?php

function hitung($a1, $a2, $operator)
{
    if ($operator == '+') {
        return $a1 + $a2;
    } elseif ($operator == '-') {
        return $a1 - $a2;
    } elseif ($operator == '*') {
        return $a1 * $a2;
    } elseif ($operator == '/') {
        if ($a2 == 0) {
            return "Tidak bisa dibagi 0";
        }
        return $a1 / $a2;
    } else {
        return 0;
    }
}
?>

<h1>Kalkulator Sederhana</h1>
<hr>

<form action="" method="POST">
    Angka 1 :
    <input type="number" name="a1" required>
    <br><br>

    Angka 2 :
    <input type="number" name="a2" required>
    <br><br>

    <button type="submit" name="operator" value="+">+</button>
    <button type="submit" name="operator" value="-">-</button>
    <button type="submit" name="operator" value="*">*</button>
    <button type="submit" name="operator" value="/">/</button>
</form>

<?php
if (isset($_POST['operator'])) {
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $operator = $_POST['operator'];

    $hasil = hitung($a1, $a2, $operator);

    echo "<hr>";
    echo "<h3>Hasil: $hasil</h3>";
}
?>