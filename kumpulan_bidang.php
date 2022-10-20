<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <!-- php start -->
    <?php
    require_once 'Lingkaran.php';
    require_once 'PersegiPanjang.php';
    require_once 'Segitiga.php';

    // data
    $l1 = new Lingkaran(8);
    $p1 = new PersegiPanjang(8,9);
    $s1 = new Segitiga(4,5,6,6);

    // call nama bidang
    function nama($arg){
      $arg->namaBidang();
    }
    // call keterangan
    function ket($arg){
      $arg->keterangan();
    }
    // call luas bidang
    function luas($arg){
      $arg->luasBidang();
    }
    // call keliling bidang
    function keliling($arg){
      $arg->kelilingBidang();
    }
    ?>
    <!-- php end -->
    <h1 class="text-center">Data Bidang 2 Dimensi</h1>
    <table class="table container px-4 my-3">
      <thead>
        <tr>
          <?php 
          $nomor = 1;
          $judul_tabel = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Bidang'];
          foreach ($judul_tabel as $judul) {
          ?>
          <th scope="col"><?= $judul ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><?= $nomor++ ?></th>
          <td><?= nama($l1) ?></td>
          <td><?= ket($l1) ?></td>
          <td><?= luas($l1) ?></td>
          <td><?= keliling($l1) ?></td>
        </tr>
        <tr>
          <th scope="row"><?= $nomor++ ?></th>
          <td><?= nama($p1) ?></td>
          <td><?= ket($p1) ?></td>
          <td><?= luas($p1) ?></td>
          <td><?= keliling($p1) ?></td>
        </tr>
        <tr>
          <th scope="row"><?= $nomor++ ?></th>
          <td><?= nama($s1) ?></td>
          <td><?= ket($s1) ?></td>
          <td><?= luas($s1) ?></td>
          <td><?= keliling($s1) ?></td>
        </tr>
      </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>