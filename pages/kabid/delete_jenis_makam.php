<?php
include('../../config.php');
include('swal.php');
$id_jenis_makam= $_GET['id_jenis_makam'];
$hapus  = mysql_query("DELETE FROM jenis_makam WHERE id_jenis_makam = '$id_jenis_makam'")or die(mysql_error());
if($hapus == TRUE){
  echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_jenis_makam.php') </script>";
}
?>
