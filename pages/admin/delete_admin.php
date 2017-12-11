<?php
include('../../config.php');
include('swal.php');
$id_admin= $_GET['id_admin'];
$hapus  = mysql_query("DELETE FROM admin WHERE id_admin = '$id_admin'")or die(mysql_error());
if($hapus == TRUE){
  echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_admin.php') </script>";
}
?>
