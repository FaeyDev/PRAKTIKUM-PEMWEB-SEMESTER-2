<?php

require 'Bank.php';

// membuat object dari class Bank
$n1 = new Bank('001', 'Siti', 5000000);
$n2 = new Bank('002', 'Andi', 7000000);
$n3 = new Bank('003', 'Dede', 3000000);
$n4 = new Bank('004', 'Didin', 1000000);

// melakukan transaksi setor uang
$n1->setor(400000);
$n3->setor(100000);

// ambil uang
$n1->ambil(300000);
$n2->ambil(2000000);

// output
echo "<h3>".Bank::BANK."</h3>";
$n1->cetak();
$n2->cetak();
$n3->cetak();

echo "Jumlah Nasabah : ".Bank::$jml." orang";
?>