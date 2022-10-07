<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Document</title>
</head>
<body class="container px-2 my-3">
<h2 class="text-center">Data Pegawai</h2>
<div class="d-flex justify-content-center">
    <div class="container px-5 my-5 p-2">
    <form id="inputForm" method="post" action="#">
        <div class="mb-3">
          <label class="form-label" for="namaPegawai">Nama Pegawai</label>
          <input class="form-control" name="namaPegawai" type="text" placeholder="Nama pegawai" required/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="agama">Agama</label>
          <select class="form-select" name="agama" aria-label="Agama">
              <option value="----- Pilih Agama -----">----- Pilih Agama -----</option>
              <option value="Islam">Islam</option>
              <option value="Katholik">Katholik</option>
              <option value="Kristen">Kristen</option>
              <option value="Budha">Budha</option>
              <option value="Hindu">Hindu</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label d-block">Jabatan</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" value="Manager" type="radio" name="jabatan" />
            <label class="form-check-label" for="manager">Manager</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" value="Asisten Manager" type="radio" name="jabatan" />
            <label class="form-check-label" for="asistenManager">Asisten Manager</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" value="Kabag" type="radio" name="jabatan" />
            <label class="form-check-label" for="kabag">Kabag</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" value="Staff" type="radio" name="jabatan" />
            <label class="form-check-label" for="staff">Staff</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label d-block">Status</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" value="Menikah" type="radio" name="status" />
            <label class="form-check-label" for="menikah">Menikah</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" value="Belum Menikah" type="radio" name="status" />
            <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
          <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah Anak"/>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary" data-bs-toggle="modal" name="proses" data-bs-target="#exampleModal">
            Simpan
          </button>
        </div>
      </form>
    </div>
</div>


<?php
error_reporting(0);
// tangkap request
$nama = $_POST['namaPegawai'];
$agama = $_POST['agama'];
$jabatan = $_POST['jabatan'];
$statusMenikah = $_POST['status'];
$jumlahAnak = $_POST['jumlahAnak'];
$submit = $_POST['proses'];

// gaji pokok - switch case
switch ($jabatan) {
    case 'Manager': $gajiPokok = 20000000; break;
    case 'Asisten Manager': $gajiPokok = 15000000; break;
    case 'Kabag': $gajiPokok = 10000000; break;
    case 'Staff': $gajiPokok = 4000000; break;
    default: $gajiPokok = 0;
}

// tunjangan jabatan
$tunjJabatan = $gajiPokok * 20/100;

// if multikondisi - tunjangan keluarga
if ($statusMenikah == 'Menikah' && $jumlahAnak <= 2) $tunjKeluarga = $gajiPokok * 5/100;
else if ($statusMenikah == 'Menikah' && $jumlahAnak >=3 && $jumlahAnak <= 5) $tunjKeluarga = $gajiPokok * 10/100;
else if ($statusMenikah == 'Menikah' && $jumlahAnak > 5) $tunjKeluarga = $gajiPokok * 15/100;
else $tunjKeluarga = 0;

// gaji kotor
$gajiKotor = $gajiPokok + $tunjJabatan + $tunjKeluarga;

// ternary - zakat profesi
$zakatProfesi = ($agama == 'Islam' && $gajiKotor >= 6000000)? $gajiKotor * 2.5/100 : 0;

// take home pay
$takeHomePay = $gajiKotor - $zakatProfesi;

// pake table harus pake isset
// if(isset($submit)){ ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pegawai</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Nama pegawai : <?= $nama ?>
        <br/>Agama : <?=$agama ?>
        <br/>Jabatan : <?=$jabatan?>
        <br/>Status : <?= $statusMenikah ?>
        <br/>Jumlah Anak : <?=$jumlahAnak?>
        <br/>Gaji Pokok : <?=$gajiPokok?>
        <br/>Tunjangan Jabatan : <?=$tunjJabatan?>
        <br/>Tunjangan Keluarga : <?=$tunjKeluarga?>
        <br/>Gaji Kotor : <?=$gajiKotor?>
        <br/>Zakat Profesi : <?=$zakatProfesi?>
        <br/>Take Home Pay : <?=$takeHomePay?>
        <br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php //} ?>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>





