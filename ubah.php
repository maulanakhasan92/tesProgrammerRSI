<?php
require 'function.php';

$id = $_GET["id"];

$data = query("SELECT * FROM tbl_pasien WHERE id_pasien = '$id'")[0];

if(isset($_POST["submit"])) {

  if(ubah($_POST) > 0 ) {
    echo "
    <script>
      alert('data berhasil diubah!');
      document.location.href = 'index.php';
    </script>
    ";
  }else {
    echo "
    <script>
      alert('data berhasil gagal diubah!');
      document.location.href = 'index.php';
    </script>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Pasien</title>
</head>
<body>
  <h1>Ubah Data Pasien</h1>
  <a href="index.php">Kembali</a>

  <form action="" method="post">
  <input type="hidden" name="id" id="id" value="<?= $data["id_pasien"]?>">
    <ul>
      <li>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="name" value="<?= $data["nama_pasien"]?>">
      </li>
      <li>
        <label for="jenis_kelamin">Jenis Kelamin: </label>
        <select id="jenis_kelamin" name="jenis_kelamin">
        <?php $jenis_kelamin = ($data["jenis_kelamin_pasien"] === "L") ? "Laki - laki" : "Perempuan"; ?>
          <option value="<?= $data["jenis_kelamin_pasien"]?>"><?= $jenis_kelamin?></option>
          <option value="L">Laki - Laki</option>
          <option value="P">Perempuan</option>
        </select>
      </li>
      <li>
        <label for="tgl_lahir">Tanggal Lahir: </label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $data["tgl_lahir_pasien"]?>" >
      </li>
      <li>
        <label for="alamat">Alamat: </label>
        <input type="text" name="alamat" id="alamat" value="<?= $data["alamat_pasien"]?>" >
      </li>
      <li><button type="submit" name="submit">Ubah Data</button></li>
    </ul>
  </form>
</body>
</html>