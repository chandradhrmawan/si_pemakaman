<?php
include('swal.php');
	unset($_SESSION['admin']);
	echo "<script> swal('Pesan','Anda Telah Logout','success'); location.replace('../../index.php') </script>";
?>
