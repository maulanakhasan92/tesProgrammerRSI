<?php
require 'function.php';

$pasien = query("SELECT * FROM tbl_pasien ORDER BY tgl_lahir_pasien ASC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Pasien RSI</title>
</head>
<body>
  <h1>Tabel Pasien</h1>
  <a href="tambah.php">Tambah Data Pasien</a>
  <br><br>
  <table border="1">
    <tr>
      <th>NO.</th>
      <th>Aksi</th>
      <th>Nama Pasien</th>
      <th>Jenis Kelamin</th>
      <th>Tanggal Lahir</th>
      <th>Usia</th>
      <th>Alamat</th>
    </tr>

    <?php $i = 1 ;?>
    <?php foreach($pasien as $row) : ?>
      
    <tr>
      <td><?= $i ;?></td>
      <td>
        <a href="ubah.php?id=<?= $row["id_pasien"]?>">ubah</a> | 
        <a href="hapus.php?id=<?= $row["id_pasien"] ?>" onclick="return confirm('Yakin hapus?')">hapus</a>
      </td>

      <?php 
      $tanggal_lahir = new DateTime($row["tgl_lahir_pasien"]);
      $sekarang = new DateTime("today");
      $usia = $sekarang->diff($tanggal_lahir)->y;
      ?>

      <?php $jenis_kelamin = ($row["jenis_kelamin_pasien"] === "L") ? "Laki - laki" : "Perempuan"; ?>

      <td><?= $row["nama_pasien"] ?></td>
      <td><?= $jenis_kelamin ?></td>
      <td><?= $row["tgl_lahir_pasien"] ?></td>
      <td><?= $usia ?></td>
      <td><?= $row["alamat_pasien"] ?></td>
    </tr>
    <?php $i++ ;?>
    <?php endforeach ?>
  </table>
</body>
</html>