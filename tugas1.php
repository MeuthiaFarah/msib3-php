<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</head>
<body class="container px-2 my-3">
<h2 class="text-center">Data Pegawai</h2>
<div class="d-flex justify-content-center">
<div class="d-flex flex-row mb-2">
<div class="container px-5 my-5 p-2">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST" action="#">
        <div class="form-floating mb-3">
            <input class="form-control" id="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" name="namaPegawai" />
            <label for="namaPegawai">Nama Pegawai</label>
            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="agama" aria-label="Agama" name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            <label for="agama">Agama</label>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="manager" type="radio" name="jabatan" value="Manager" data-sb-validations="" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="asistenManager" type="radio" name="jabatan" value="Asisten Manager" data-sb-validations="" />
                <label class="form-check-label" for="asistenManager">Asisten Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="kabag" type="radio" name="jabatan" value="Kabag" data-sb-validations="" />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="staff" type="radio" name="jabatan" value="Staff" data-sb-validations="" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="menikah" type="radio" name="status" value="Menikah" data-sb-validations=""  />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="Belum Menikah" data-sb-validations=""  />
                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" name="jumlahAnak" />
            <label for="jumlahAnak">Jumlah Anak</label>
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
        <div class="d-grid">
        <input name="proses" value="simpan" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" />
        </div>
        <!-- Button trigger modal -->

    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

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

?>

  <div class="container px-5 my-5 p-2">
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

</div>
</div>
<!-- Modal
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        isi
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->


</body>
</html>





