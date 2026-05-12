<?php
echo "<h1>Praktikum Looping</h1>";
echo "<hr>";

echo "<h2>1. Looping For (1 - 10)</h2>";
for ($i = 1; $i <= 10; $i++) {
    echo "Bilangan ke-$i <br>";
}
echo "<br>";

for ($j = 10; $j >= 1; $j--) {
    echo "Angka ke-$j <br>";
}
echo "<hr>";

echo "<h2>2. Looping While (Genap & Ganjil)</h2>";
$x = 2;
$y = 1;

while ($y <= 10) {
    echo "Bilangan Ganjil: $y <br>";
    $y += 2;
}
echo "<br>";

while ($x <= 10) {
    echo "Bilangan Genap: $x <br>";
    $x += 2;
}
echo "<hr>";

echo "<h2>3. Looping Do While (Turun 1-10)</h2>";
$z = 1;

do {
    echo '<br/>' . $z;
    $z++;
} while ($z <= 10);

echo "<hr>";
