<?php
include('../../config.php');
include('swal.php');
$id_tpu= $_GET['id_tpu'];
$hapus  = mysql_query("DELETE FROM tpu WHERE id_tpu = '$id_tpu'")or die(mysql_error());
if($hapus == TRUE){
  echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_tpu.php') </script>";
}
?>
