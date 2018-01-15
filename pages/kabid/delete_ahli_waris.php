<?php
include('../../config.php');
include('swal.php');
$id_ahli_waris= $_GET['id_ahli_waris'];
$hapus  = mysql_query("DELETE FROM ahli_waris WHERE id_ahli_waris = '$id_ahli_waris'")or die(mysql_error());
if($hapus == TRUE){
  echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_ahli_waris.php') </script>";
}
?>
