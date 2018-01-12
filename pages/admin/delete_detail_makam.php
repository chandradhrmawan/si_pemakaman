<?php
include('../../config.php');
include('swal.php');
$id_detail_makam= $_GET['id_detail_makam'];
$hapus  = mysql_query("DELETE FROM detail_makam WHERE id_detail_makam = '$id_detail_makam'")or die(mysql_error());
if($hapus == TRUE){
  echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_lahan.php') </script>";
}
?>
