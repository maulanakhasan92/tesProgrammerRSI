<?php

$conn = mysqli_connect("localhost", "root", "", "db_rsi" );

function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];

  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data) {
  global $conn;

  $nama = $data["nama"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $tgl_lahir = $data["tgl_lahir"];
  $alamat = $data["alamat"];


  $query = "INSERT INTO tbl_pasien VALUES ('','$nama','$jenis_kelamin','$tgl_lahir','$alamat')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM tbl_pasien WHERE id_pasien = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data){
  global $conn;
  
  $id =   $id = $data["id"];
  $nama = $data["nama"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $tgl_lahir = $data["tgl_lahir"];
  $alamat = $data["alamat"];

  $query = "UPDATE tbl_pasien SET 
  nama_pasien = '$nama',
  jenis_kelamin_pasien = '$jenis_kelamin',
  tgl_lahir_pasien = '$tgl_lahir',
  alamat_pasien = '$alamat'
  WHERE id_pasien = $id
  ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
