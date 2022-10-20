<?php
require_once 'Pegawai.php';
// object
$n1 = new Pegawai('001', 'Budi', 'Manager', 'Islam', 'Menikah');
$n2 = new Pegawai('002', 'Farah', 'Asmen', 'Islam', 'Belum Menikah');
$n3 = new Pegawai('003', 'Dina', 'Staff', 'Kristen', 'Menikah');
$n4 = new Pegawai('004', 'Satria', 'Asmen', 'Islam', 'Belum Menikah');
$n5 = new Pegawai('005', 'Loli', 'Kabag', 'Katholik', 'Menikah');

function all($arg){
  $arg->setGajiPokok(); $arg->setTunjab(); $arg->setTunkel(); $arg->gajiKotor(); $arg->setZakatProfesi(); $arg->gajiBersih(); $arg->cetak();
}

// call
echo '<h3 align="center">'.Pegawai::PEGAWAI.'</h3>';
all($n1); all($n2);all($n3); all($n4); all($n5);
