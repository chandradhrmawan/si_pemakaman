<?php
include('../../config.php');
include('swal.php');
$id_persyaratan= $_GET['id_persyaratan'];
$hapus  = mysql_query("DELETE FROM persyaratan WHERE id_persyaratan = '$id_persyaratan'")or die(mysql_error());
if($hapus == TRUE){
  echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_persyaratan.php') </script>";
}
?>
