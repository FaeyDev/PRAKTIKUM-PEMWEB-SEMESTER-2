<?php
echo "<h1>Praktikum Function</h1>";
echo "<hr>";

$str = 'Belajar PHP di Kampus Merdeka Asyiik';
echo "<h2>Function Built-in String</h2>";

echo strtoupper($str);
echo '<br/>' . strtolower($str);
echo '<br/>' . ucfirst(strtolower($str));
echo '<br/>' . ucwords(strtolower($str));
echo '<hr/>';

$ar_buah = ['Pepaya', 'Mangga', 'Pisang', 'Jambu', 'Apel'];
echo "<h2>Sorting Array</h2>";

sort($ar_buah);
echo "<b>Sort (Ascending):</b>";
foreach ($ar_buah as $buah) {
    echo '<br/>' . $buah;
}
echo '<hr/>';

arsort($ar_buah);
echo "<b>Arsort (Descending):</b>";
foreach ($ar_buah as $buah) {
    echo '<br/>' . $buah;
}
echo '<hr/>';

function salam()
{
    echo 'Selamat Pagi Teman-teman';
}

function sapa($kawan)
{
    echo '<br/>Selamat Pagi ' . $kawan;
}

function kabar($kawan = 'Budi')
{
    echo '<br/>Hai Apa Kabar ' . $kawan . '?';
}

echo "<h2>Function Void</h2>";
salam();

$nama = 'Deden';
sapa($nama);
kabar();
kabar('Ahmad');
kabar('Alex');
echo '<hr/>';

function tambah($a, $b)
{
    return $a + $b;
}

echo "<h2>Function Return</h2>";
$x = 10;
$y = 20;

echo 'Hasil 50 + 30 = ' . tambah(50, 30);
echo "<br/>Hasil $x + $y = " . tambah($x, $y);
echo '<hr/>';
