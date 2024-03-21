<?php
require 'function.php';

if(isset($_POST["submit"])) {

  if(tambah($_POST) > 0 ) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'index.php';
    </script>
    ";
  }else {
    echo "
    <script>
      alert('data berhasil gagal ditambahkan!');
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
  <title>Tambah Data Pasien</title>
</head>
<body>
  <h1>Tambah Data Pasien</h1>
  <a href="index.php">Kembali</a>

  <form action="" method="post">
    <ul>
      <li>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="name" required>
      </li>
      <li>
        <label for="jenis_kelamin">Jenis Kelamin: </label>
        <select id="jenis_kelamin" name="jenis_kelamin">
          <option value="L">Laki - Laki</option>
          <option value="P">Perempuan</option>
        </select>
      </li>
      <li>
        <label for="tgl_lahir">Tanggal Lahir: </label>
        <input type="date" name="tgl_lahir" id="tgl_lahir">
      </li>
      <li>
        <label for="alamat">Alamat: </label>
        <input type="text" name="alamat" id="alamat">
      </li>
      <li><button type="submit" name="submit">Tambah Data</button></li>
    </ul>
  </form>
</body>
</html>