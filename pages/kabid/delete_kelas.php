<?php
include('../../config.php');
include('swal.php');
$id_kelas= $_GET['id_kelas'];
$hapus  = mysql_query("DELETE FROM kelas WHERE id_kelas = '$id_kelas'")or die(mysql_error());
if($hapus == TRUE){
	echo "<script> swal('Pesan', 'Data Berhasil Dihapus', 'success'); location.replace('kelola_kelas.php') </script>";
}
?>
