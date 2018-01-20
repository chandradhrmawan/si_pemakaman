<?php
include('../../mpdf57/mpdf.php');
include('../../config.php');
$mpdf = new mPDF('c','A4',15,48,25,10,10);
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("DINAS PENATAAN RUANG DAN PEMAKAMAN KOTA BANDUNG");
$mpdf->SetAuthor("DINAS PENATAAN RUANG DAN PEMAKAMAN KOTA BANDUNG.");
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  	<!-- Select2 -->
  	<link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  	<!-- Sweet Alert -->
  	<script src="../../dist/sweetalert.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
  </head>
  <?php
  $id_jenazah = $_GET['id_jenazah'];
  $sql_jenazah = mysql_query("SELECT * FROM jenazah WHERE id_jenazah = '$id_jenazah'");
  $row_jenazah = mysql_fetch_array($sql_jenazah);
  ?>
  <table border="1" align="center">
    <tr>
      <td>
        <table width="799" height="1220" border="0" align="center">
          <tr>
            <td colspan="6" align="center"><img src="kop_surat.JPG" align="top" /></td>
          </tr>
          <tr>
            <td colspan="6" align="center"><b><hr /></b></td>
          </tr>
          <tr>
            <td width="57">&nbsp;</td>
            <td width="8">&nbsp;</td>
            <td width="223">&nbsp;</td>
            <td width="195">&nbsp;</td>
            <td colspan="2">Bandung,<?php echo date('d-F-Y'); ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td width="117">&nbsp;</td>
            <td width="159">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Kepada :</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center">Perihal :</td>
            <td>&nbsp;</td>
            <td>Permohonan Pelayanan Penggunaan Tanah Makam (Pemakamanan)</td>
            <td align="right">Yth.</td>
            <td colspan="2">Walikota Bandung </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Melalui Kepala Dinas Penataan Ruang dan Pemakaman Kota Bandung</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>di</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Bandung</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Dengan Hormat.</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="4">Bersama ini perkenankanlah saya mengajukan permohonan pelayanan penggunaan tanah makam (Pemakaman) Jenazah, Dan bersama ini pula saya lampirkan persyaratan yang di perlukan:</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>I. DATA YANG MENINGGAL DUNIA</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>1</td>
            <td>Nama</td>
            <td>: <?php echo $row_jenazah['nama_jenazah']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>2</td>
            <td>Bin/Binti</td>
            <td>: <?php echo $row_jenazah['bin_binti']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>3</td>
            <td>Jenis Kelamin</td>
            <td>: <?php echo $row_jenazah['jk_jenazah']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>4</td>
            <td>Tempat,Tgl Lahir</td>
            <td>: <?php echo $row_jenazah['tempat_lahir']; ?>,<?php echo $row_jenazah['tgl_lahir']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>5</td>
            <td>Alamat</td>
            <td colspan="3">: <?php echo $row_jenazah['alamat_jenazah']; ?></td>
          </tr>
          <?php
          $sql_kecamatan = mysql_query("SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan = '$row_jenazah[id_kecamatan]'");
          $row_kecamatan = mysql_fetch_array($sql_kecamatan);
          $sql_provinsi = mysql_query("SELECT nama_provinsi FROM provinsi WHERE id_provinsi = '$row_jenazah[id_provinsi]'");
          $row_provinsi = mysql_fetch_array($sql_provinsi);
          $sql_kota = mysql_query("SELECT nama_kota FROM kota WHERE id_kota = '$row_jenazah[id_kota]'");
          $row_kota = mysql_fetch_array($sql_kota);
          ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Kecamatan : <?php echo $row_kecamatan['nama_kecamatan']; ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Kabupaten/Kota : <?php echo $row_kota['nama_kota']; ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Provinsi : <?php echo $row_provinsi['nama_provinsi']; ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <?php
          $sql_jenis_makam = mysql_query("SELECT * FROM jenis_makam WHERE id_jenis_makam = '$row_jenazah[id_jenis_makam]'");
          $row_jenis_makam = mysql_fetch_array($sql_jenis_makam);
          ?>
          <tr>
            <td>&nbsp;</td>
            <td>6</td>
            <td>Lokasi yang dipesan di</td>
            <td colspan="2">: <?php echo $row_jenis_makam['nama_jenis_makam'] ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Blok A</td>
            <td>Kelas 1</td>
            <td>No.45</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php
          $sql_pewaris = mysql_query("SELECT * FROM ahli_waris WHERE id_ahli_waris = '$row_jenazah[id_ahli_waris]'");
          $row_pewaris = mysql_fetch_array($sql_pewaris);
          ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">II. DATA PEMOHON/PENANGGUNG JAWAB/AHLI WARIS:</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>1</td>
            <td>Nama</td>
            <td>: <?php echo $row_pewaris['nama_pewaris'] ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>2</td>
            <td>Umur</td>
            <td>: <?php echo $row_pewaris['umur_pewaris'] ?> Tahun</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>3</td>
            <td>Pekerjaan</td>
            <td>: <?php echo $row_pewaris['perkerjaan_pewaris'] ?></td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>4</td>
            <td>Alamat</td>
            <td colspan="3">: <?php echo $row_pewaris['alamat_pewaris'] ?></td></td>
          </tr>
          <?php
          $sql_kecamatan = mysql_query("SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan = '$row_jenazah[id_kecamatan]'");
          $row_kecamatan = mysql_fetch_array($sql_kecamatan);
          $sql_provinsi = mysql_query("SELECT nama_provinsi FROM provinsi WHERE id_provinsi = '$row_jenazah[id_provinsi]'");
          $row_provinsi = mysql_fetch_array($sql_provinsi);
          $sql_kota = mysql_query("SELECT nama_kota FROM kota WHERE id_kota = '$row_jenazah[id_kota]'");
          $row_kota = mysql_fetch_array($sql_kota);
          ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Kecamatan : <?php echo $row_kecamatan['nama_kecamatan']; ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Kabupaten/Kota : <?php echo $row_kota['nama_kota']; ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Provinsi : <?php echo $row_provinsi['nama_provinsi']; ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>5</td>
            <td>Nomor Telepon/HP</td>
            <td>: <?php echo $row_pewaris['no_hp_pewaris']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">III. LAMPIRAN PERSYARATAN</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Fotocopy KTP, Pemohon/Penanggung jawab(Ada), Kartu Data Makam Pusara(Ada),</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="4">Demikian permohonan ini disampaikan dan untuk itu saya bersedia mengikuti aturan yang ada yang telah ditetapkan</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2" align="center">Yang Membuat Permohonan</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2" align="center">(......... <?php echo $row_pewaris['nama_pewaris']; ?> .........)</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Catatan :</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="4">Dibuat Rangkap 2, 1 Untuk Arsip TPU, 1 Dilampirkan pada berkas penyetor</td>
          </tr>
          <tr>
            <td height="21">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>


  <!-- jQuery 2.2.3 -->
  <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- SlimScroll -->
  <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- Select2 -->
  <script src="../../plugins/select2/select2.full.min.js"></script>
  <!-- FastClick -->
  <script src="../../plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  </html>

  <?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');

$mpdf->Output(); exit;
exit;

?>
