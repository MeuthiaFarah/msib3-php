<h2 align="center">Data Siswa</h2>
<table align="center" width="50%" cellpadding="5">
  <thead>
    <tr bgcolor="cyan">
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
    </tr>
    <tbody>
      <!-- php looping start -->
      <?php   
      for ($nomor=1; $nomor<=100; $nomor++){
        // warna sesuai nomor
        $warna = ($nomor % 2 == 0) ? 'violet' : 'lightblue';
      ?>
        <tr bgcolor="<?= $warna ?>">
          <td><?= $nomor ?></td>
          <td>Siswa <?= $nomor ?></td>
          <td>Jl. Mawar no. <?= $nomor ?></td>
        </tr>
      <?php } ?>
      <!-- php looping end -->
    </tbody>
  </thead>
</table>