<?php

require 'Dosen.php';
require 'Mahasiswa.php';

// object dosen
$d1 = new Dosen('Budi', 'L', 'N11', 'S.kom., M.Kom');
$d2 = new Dosen('Nina', 'P', 'N12', 'S.kom');

// object mahasiswa
$m1 = new Mahasiswa('Deden', 'L', 4, 'TI');
$m2 = new Mahasiswa('Lana', 'P', 2, 'SI');

// ubah jadi array
$data = [$d1, $d2, $m1, $m2];

// output
echo "<h3>Data Civitas Kampus</h3>";

foreach($data as $d){
    echo $d->cetak();
}

?>