<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
<?php
error_reporting(0);
// array skalar
$m1 = ['nim'=>'001', 'nama'=>'Meuthia', 'nilai'=>80];
$m2 = ['nim'=>'002', 'nama'=>'Farah', 'nilai'=>90];
$m3 = ['nim'=>'003', 'nama'=>'Hidayah', 'nilai'=>50];
$m4 = ['nim'=>'004', 'nama'=>'Bambang', 'nilai'=>60];
$m5 = ['nim'=>'005', 'nama'=>'Fikri', 'nilai'=>75];
$m6 = ['nim'=>'006', 'nama'=>'Mutia', 'nilai'=>30];
$m7 = ['nim'=>'007', 'nama'=>'Eka', 'nilai'=>90];
$m8 = ['nim'=>'008', 'nama'=>'Nada', 'nilai'=>85];
$m9 = ['nim'=>'009', 'nama'=>'Jihan', 'nilai'=>65];
$m10 = ['nim'=>'0010', 'nama'=>'Nurul', 'nilai'=>40];

// array asosiatif
$mahasiswas = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

// array skalar
$juduls = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

// identifikasi data
$nilai = array_column($mahasiswas, 'nilai');
$total_nilai = array_sum($nilai);
$jumlah_nilai = count($nilai);
$nilai_max = max($nilai);
$nilai_min = min($nilai);
$rata_rata = $total_nilai/$jumlah_nilai;
$kets = [
  'Nilai Tertinggi' => $nilai_max,
  'Nilai Terendah' => $nilai_min,
  'Rata Rata' => $rata_rata,
  'Jumlah Siswa' => $jumlah_nilai,
];

?>
<br/>
<h2 class="text-center">Data Mahasiswa</h2>
<br/>
<table class="container table text-center">
  <thead>
    <tr bgcolor="cyan">
      <!-- php start -->
      <?php 
      foreach ($juduls as $judul){ 
        ?>
        <th><?= $judul; ?></th>
      <?php }?>
      <!-- php end -->
    </tr>
  </thead>
  <tbody>
    <!-- php start -->
    <?php 
    $no = 1;
    foreach ($mahasiswas as $mahasiswa){
      // keterangan ternary operator
      $keterangans = ($mahasiswa['nilai'] >= 60) ? 'Lulus' : 'Tidak Lulus';

      // grade if multikondisi
      if ($mahasiswa['nilai'] >= 90 && $mahasiswa['nilai'] <= 100) $grade = 'A';
      else if ($mahasiswa['nilai'] >= 80 && $mahasiswa['nilai'] < 90 ) $grade = 'B';
      else if ($mahasiswa['nilai'] >= 70 && $mahasiswa['nilai'] < 80 ) $grade = 'C';
      else if ($mahasiswa['nilai'] >= 60 && $mahasiswa['nilai'] < 70 ) $grade = 'D';
      else if ($mahasiswa['nilai'] >= 0 && $mahasiswa['nilai'] < 60 ) $grade = 'E';
      else $grade = '';

      // predikat switch case
      switch($grade){
        case 'A': $predikat = "Memuaskan"; break;
        case 'B': $predikat = "Bagus"; break;
        case 'C': $predikat = "Cukup"; break;
        case 'D': $predikat = "Kurang"; break;
        case 'E': $predikat = "Buruk"; break;
        default: $predikat = ""; break;
      }

      // warna
      $warnas = ($mahasiswa['nilai'] >= 60) ? '' : 'red';
    ?>
    <tr bgcolor=<?= $warnas ?>>
      <td><?= $no++?></td>
      <td><?= $mahasiswa['nim']?></td>
      <td><?= $mahasiswa['nama']?></td>
      <td><?= $mahasiswa['nilai']?></td>
      <td><?= $keterangans?></td>
      <td><?= $grade?></td>
      <td><?= $predikat?></td>
    </tr>
    <?php }?>
    <!-- php end -->
  </tbody>
  <thead>
    <!-- php start -->
    <?php 
    foreach ($kets as $key => $ket){ 
    ?>
    <!-- looping agregate -->
    <tr>
      <th colspan="6"><?= $key; ?></th>
      <th><?= $ket; ?></th>
    </tr>
    <?php } ?>
    <!-- php end -->
  </thead>
</table>
</body>
</html>



