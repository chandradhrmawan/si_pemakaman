<?php
include('../../config.php');
include('swal.php');
$id_blok= $_GET['id_blok'];
$hapus  = mysql_query("DELETE FROM blok WHERE id_blok = '$id_blok'")or die(mysql_error());
if($hapus == TRUE){
	echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_blok.php') </script>";
}
?>
