<form method="GET" action="#">
  <label for="">Nama Siswa</label>
  <input type="text" name="nama" />
  <br/>
  <label for="">Pelajaran</label>
  <select name="pelajaran" id="">
    <option value="IPA">IPA</option>
    <option value="Matematika">Matematika</option>
    <option value="IPS">IPS</option>
  </select><br/>
  <label for="">Nilai Siswa</label>
  <input type="text" name="nilai">
  <input type="submit" name="proses" value="Simpan">
</form>

<?php
error_reporting(0);
// tangkap request
$nama = $_GET['nama'];
$pelajaran = $_GET['pelajaran'];
$nilai = $_GET['nilai'];
$submit = $_GET['proses'];
// ternary operator
$keterangan = ($nilai >= 60)? 'Lulus' : 'Tidak Lulus';

// if else multikondisi
if ($nilai > 85 && $nilai <= 100) $grade = 'A';
else if ($nilai > 75 && $nilai <= 85) $grade = 'B';
else if ($nilai >= 60 && $nilai <= 75) $grade = 'C';
else if ($nilai >= 30 && $nilai < 60) $grade = 'D';
else if ($nilai >= 0 && $nilai < 30 ) $grade = 'E';
else $grade = '';

// switch case
switch ($grade) {
  case 'A': $predikat = "Memuaskan"; break;
  case 'B': $predikat = "Bagus"; break;
  case 'C': $predikat = "Cukup"; break;
  case 'D': $predikat = "Kurang"; break;
  case 'E': $predikat = "Buruk"; break;
  default: $predikat = ""; break;
}

// print menggunakan echo, di PHP 5 kebawah
/* echo 'Nama siswa : '. $nama;
echo '<br/>Mata pelajaran : '. $pelajaran;
echo '<br/>Nilai siswa : '. $nilai;
echo '<br/>Status : '. $keterangan; */
?>

<!-- print menggunakan html biasa dan disambung dgn tag pembuka-penutuh PHP, di PHP 7 -->
Nama siswa : <?= $nama ?>
<br/>Mata pelajaran : <?=$pelajaran?>
<br/>Nilai siswa : <?=$nilai?>
<br/>Status : <?=$keterangan?>
<br/>Grade : <?=$grade?>
<br/>Predikat : <?=$predikat?>
<br/>