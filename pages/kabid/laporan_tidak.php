<?php
session_start();
include('../../config.php');
if(!isset($_SESSION['admin'])){
  echo "<script> window.alert('Silahkan Login Terlebih Dahulu'); location.replace('../../index.php')  </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Pendaftaran</title>
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
 $dari = $_POST['dari'];
 $sampai = $_POST['sampai'];
 $sql = mysql_query("SELECT jenazah_tidak_dikenal.*,
  jenis_makam.id_jenis_makam, 
  jenis_makam.nama_jenis_makam
  FROM jenazah_tidak_dikenal
  INNER JOIN  jenis_makam ON jenis_makam.id_jenis_makam = jenazah_tidak_dikenal.id_jenis_makam
  AND jenazah_tidak_dikenal.tgl_registrasi_t BETWEEN '$dari' AND '$sampai'")or die(mysql_error());
  ?>
  <table class="table" align="center" border="1">
    <thead>
      <tr>
        <th colspan="9" align="center">
          <center><img src="kop_surat.JPG" width="900"> </center>
        </th>
      </tr>
    </thead>

    <thead>
      <tr>
        <th colspan="9" align="center">
          <h3 align="center"> Laporan Data Pendaftaran Periode <?php echo $dari; ?> s/d <?php echo $sampai; ?></h3>
        </th>
      </tr>
    </thead>
    <thead>
      <tr>
        <th colspan="9" align="center">
        </th>
      </tr>
    </thead>
    <thead>
      <tr>
        <th style="background-color: gray  !important; border-color: white !important;">Kode Jenazah Tidak Teridentifikasi</th>
        <th style="background-color: gray  !important; border-color: white !important;">Tgl Registrasi</th>
        <th style="background-color: gray  !important; border-color: white !important;">Nama Jenis Makam</th>
        <th style="background-color: gray  !important; border-color: white !important;">Asal</th>
        <th style="background-color: gray  !important; border-color: white !important;">Jenis Kelamin Jenazah</th>
        <th style="background-color: gray  !important; border-color: white !important;">Tangal Meninggal</th>
        <th style="background-color: gray  !important; border-color: white !important;">Tanggal Pemakaman</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $no=0;
      while($row = mysql_fetch_array($sql)){

        ?>
        <tr>
          <td><?php echo $row['id_jenazah_t']; ?></td>
          <td><?php echo $row['tgl_registrasi_t']; ?></td>
          <td><?php echo $row['nama_jenis_makam'] ?></td>
          <td><?php echo $row['asal'] ?></td>
          <td><?php echo $row['jk_jenazah'] ?></td>
          <td><?php echo $row['tgl_meninggal'] ?></td>
          <td><?php echo $row['tgl_pemakaman'] ?></td>
        </tr>
        <?php $no++; } ?>
      </tbody>

      <tr>


        <td colspan="9" align="center">

          <script>

            function cetak()
            {
              document.getElementById('hhhh').style.visibility='hidden';

              window.print();

              location.replace('laporan.php');

            }

          </script>
          <a href="javascript:cetak()" id="hhhh"><img src="btn_print2.png" width="20" height="20" /></a>

        </td>
      </tr>


    </tbody>

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