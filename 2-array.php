<?php
echo "<h1>Praktikum Array</h1>";
echo "<hr>";

$ar_buah = ['Pepaya', 'Mangga', 'Pisang', 'Jambu'];
$ar_buah[2] = 'Jeruk';
unset($ar_buah[3]);
$ar_buah[] = 'Naga';

echo "<h2>Array 1 Dimensi</h2>";

echo "<h3>1. Cetak Index dan Value</h3>";
foreach ($ar_buah as $index => $buah) {
    echo "Index $index : $buah <br>";
}

echo "<br><h3>2. Cetak Key Saja</h3>";
foreach ($ar_buah as $id => $buah) {
    echo "Key: $id <br>";
}

echo "<br><h3>3. Cetak Value Saja</h3>";
foreach ($ar_buah as $buah) {
    echo "Buah: $buah <br>";
}

echo "<br><h3>4. Cetak Key dan Value</h3>";
foreach ($ar_buah as $id => $buah) {
    echo "Buah dengan id $id adalah $buah <br>";
}
echo "<hr>";

$b1 = ['kode' => 'a1', 'buah' => 'Apel', 'harga' => 25000];
$b2 = ['kode' => 'a2', 'buah' => 'Anggur', 'harga' => 45000];
$b3 = ['kode' => 'b1', 'buah' => 'Belimbing', 'harga' => 15000];

$buah2an = [$b1, $b2, $b3];

echo "<h2>Array Associative</h2>";

echo "<table border='1' cellpadding='5'>
<tr>
    <th>No</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>Harga</th>
</tr>";

$no = 1;
$total = 0;

foreach ($buah2an as $b) {
    $warna = $no % 2 == 1 ? 'khaki' : 'beige';
    $total += $b['harga'];
?>
    <tr style="background-color: <?= $warna ?>">
        <td><?= $no ?></td>
        <td><?= $b['kode'] ?></td>
        <td><?= $b['buah'] ?></td>
        <td>Rp <?= number_format($b['harga'], 0, ',', '.') ?></td>
    </tr>
<?php
    $no++;
}
?>

<tr>
    <td colspan="3"><b>Total Harga</b></td>
    <td><b>Rp <?= number_format($total, 0, ',', '.') ?></b></td>
</tr>

</table>