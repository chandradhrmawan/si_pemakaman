<?php
include('../../config.php');
include('swal.php');
$id_waktu= $_GET['id_waktu'];
$hapus  = mysql_query("DELETE FROM waktu WHERE id_waktu = '$id_waktu'")or die(mysql_error());
if($hapus == TRUE){
	echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_waktu.php') </script>";
}
?>
