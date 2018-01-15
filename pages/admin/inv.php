<?php
include('../../mpdf57/mpdf.php');
include('../../config.php');
$mpdf = new mPDF('c','A4',15,48,25,10,10);
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("DINAS PERTAMANA DAN PEMAKAMAN KOTA BANDUNG");
$mpdf->SetAuthor("DINAS PERTAMANA DAN PEMAKAMAN KOTA BANDUNG.");
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0083)http://103.53.76.218/produk/phpcjkwitansi/index.php/reports/invoicekwi/1001~IV~2017 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>DINAS PERTAMANA DAN PEMAKAMAN KOTA BANDUNG - Kwitansi Pembayaran</title>

	<meta http-equiv="imagetoolbar" content="no">
	<!-- Reset all CSS rule -->
	<link rel="stylesheet" type="text/css" href="./ci3Kwitansi 1.2.0 - Aplikasi Cetak Kwitansi_files/reset.css">

	<!-- Main stylesheed  (EDIT THIS ONE) -->
	<link rel="stylesheet" href="report.css" type="text/css">
	<link rel="shortcut icon" href="images/avatar.png">

	<?php
	function Terbilang($x)
	{
		$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		if ($x < 12)
			return " " . $abil[$x];
		elseif ($x < 20)
			return Terbilang($x - 10) . "belas";
		elseif ($x < 100)
			return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
		elseif ($x < 200)
			return " seratus" . Terbilang($x - 100);
		elseif ($x < 1000)
			return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
		elseif ($x < 2000)
			return " seribu" . Terbilang($x - 1000);
		elseif ($x < 1000000)
			return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
		elseif ($x < 1000000000)
			return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);


	}

	?>
	<?php
	/*$id_detail = $_GET['id_detail'];
	$sql = mysql_query("SELECT * FROM detail_bayar WHERE id_detail = '$id_detail'")or die(mysql_error());
	$row = mysql_fetch_array($sql);

	$id_pemesanan = $row['id_pemesanan'];

	$sql1 = mysql_query("SELECT * FROM detail_bayar WHERE id_pemesanan = '$id_pemesanan'")or  die(mysql_error());
	$cicil = mysql_num_rows($sql1);*/

	?>
</head>
<body>
	<div id="content-box">
		<div id="box-header">
			<div class="left">
				<h4 style="margin-top:5px;"><u>DINAS PEMAKAMAN DAN PERTAMANAN KOTA BANDUNG</u></h4>
				<h6 style="margin-top:10px;">Jalan Pandu No 788 Kota Bandung
				</h6>
				<h6>Tlp. 081220568388 - 085222888208</h6>
				<h6></h6>
			</div>
			<div class="center">
				<!-- <h4>KWITANSI</h4> -->
			</div>
			<div class="right">
				<h4><u>NOTA PEMBAYARAN</u></h4>
				<h5 style="margin-top:5px;">No. /<?php echo date('m') ?>/<?php echo date('Y') ?></h5>
			</div>
		</div> <!-- end id box-header -->

		<div id="box-body">
			<div class="content">
				<table>
					<tbody>
						<tr>
							<th width="19%"><u>Telah Terima Dari</u></th>
							<th width="1%">:</th>
							<td class="end" style="border-left:0; border-right:0; border-bottom:1px dashed #999999">
								TERIMA DARI
							</td>
						</tr>
						<tr>
							<th><em>Received From</em></th>
							<th>&nbsp;</th>
							<td class="end" style="border-left:0; border-right:0; border-bottom:1px dashed #999999"></td>
						</tr>
						<tr>
							<th><u>Uang Sejumlah</u></th>
							<th>:</th>
							<td class="end" style="border-left:0; border-right:0; border-bottom:1px dashed #999999;font-style:italic;"> 
								<?php echo ucwords(''.Terbilang('100000'.''));  ?> </td>
						</tr>
						<tr>
							<th><em>Amaount Received</em></th>
							<th>&nbsp;</th>
							<td class="end" style="border-left:0; border-right:0; border-bottom:1px dashed #999999">&nbsp;</td>
						</tr>
						<tr>
							<th><u>Untuk Pembayaran</u></th>
							<th>:</th>
							<td class="end" style="border-left:0; border-right:0; border-bottom:1px dashed #999999">Pembayaran Ke <?php echo ucwords(''.Terbilang("1").'');  ?></td>
						</tr>
						<tr>
							<th><em>In Payment of</em></th>
							<th>&nbsp;</th>
							<td class="end" style="border-left:0; border-right:0; border-bottom:1px dashed #999999"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div> <!-- end id box-body -->
	</div> <!-- end id content-box -->
	<br class="clear">
	<div id="footer-wrapper">
		<div id="footer-box">
			<div class="left">
				<h3><u><b>Rp. <?php echo number_format("100000") ?></b></u></h3>
			</div>
			<div class="right">
				Bandung, <?php echo date('d-F-Y'); ?><br>
				<label>Penerima,</label><br><br><br><br>
				( <?php echo "Ahli Waris"; ?> )
			</div>
			<br class="clear">
		</div>
		<br class="clear">
	</div> <!-- end id footer -->
</body></html>

<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');

$mpdf->Output(); exit;
exit;

?>
