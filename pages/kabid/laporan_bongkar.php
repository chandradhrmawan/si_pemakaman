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
  <title>Laporan Pindah Bongkar</title>
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
 $sql = mysql_query("SELECT jenazah.*,
  jenis_makam.id_jenis_makam, 
  jenis_makam.nama_jenis_makam, 
  ahli_waris.nama_pewaris,
  bongkar.*
  FROM jenazah
  INNER JOIN  jenis_makam ON jenis_makam.id_jenis_makam = jenazah.id_jenis_makam
  INNER JOIN ahli_waris ON ahli_waris.id_ahli_waris = jenazah.id_ahli_waris
  INNER JOIN bongkar ON bongkar.id_jenazah = jenazah.id_jenazah
  AND jenazah.tgl_registrasi BETWEEN '$dari' AND '$sampai'")or die(mysql_error());
  ?>
  <table class="table" align="center" border="1">
    <thead>
      <tr>
        <th colspan="13" align="center">
         <center><img src="kop_surat.JPG" width="900"> </center>
       </th>
     </tr>
   </thead>

   <thead>
    <tr>
      <th colspan="13" align="center">
        <h3 align="center"> Laporan Data Pindah Bongkar Periode <?php echo $dari; ?> s/d <?php echo $sampai; ?></h3>
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th colspan="13" align="center">
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th style="background-color: gray  !important; border-color: white !important;">No</th>
      <th style="background-color: gray  !important; border-color: white !important;">Tgl Pindah</th>
      <th style="background-color: gray  !important; border-color: white !important;">Nama Jenazah</th>
      <th style="background-color: gray  !important; border-color: white !important;">Nama Jenis Makam Lama</th>
      <th style="background-color: gray  !important; border-color: white !important;">Nama Jenis Makam Baru</th>
      <th style="background-color: gray  !important; border-color: white !important;">No Makam lama</th>
      <th style="background-color: gray  !important; border-color: white !important;">No Makam Baru</th>
      
      <th style="background-color: gray  !important; border-color: white !important;">Kelas Makam Lama</th>
      <th style="background-color: gray  !important; border-color: white !important;">Kelas Makam Baru</th>

      <th style="background-color: gray  !important; border-color: white !important;">Blok Makam Lama</th>
      <th style="background-color: gray  !important; border-color: white !important;">Blok Makam Baru</th>

      <th style="background-color: gray  !important; border-color: white !important;">TPU Makam Lama</th>
      <th style="background-color: gray  !important; border-color: white !important;">TPU Makam Baru</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $no=1;
    while($row = mysql_fetch_array($sql)){
      $sql_jenis_makam_lama = mysql_query("SELECT * FROM jenis_makam WHERE id_jenis_makam = '$row[id_jenis_makam_lama]'");
      $row_sql_makam_lama = mysql_fetch_array($sql_jenis_makam_lama);
      
      $sql_jenis_makam_baru = mysql_query("SELECT * FROM jenis_makam WHERE id_jenis_makam = '$row[id_jenis_makam_baru]'");
      $row_sql_makam_baru = mysql_fetch_array($sql_jenis_makam_baru);
      
      $sql_detail_makam_lama = mysql_query("SELECT * FROM detail_makam WHERE id_detail_makam = '$row[id_detail_makam_lama]'");
      $row_detail_makam_lama = mysql_fetch_array($sql_detail_makam_lama);
      
      $sql_detail_makam_baru = mysql_query("SELECT * FROM detail_makam WHERE id_detail_makam = '$row[id_detail_makam_baru]'");
      $row_detail_makam_baru = mysql_fetch_array($sql_detail_makam_baru);

      $sql_kelas_lama = mysql_query("SELECT detail_makam.id_kelas,
        kelas.nama_kelas 
        FROM detail_makam
        INNER JOIN kelas ON detail_makam.id_kelas = kelas.id_kelas
        WHERE detail_makam.id_detail_makam = '$row[id_detail_makam_lama]'")or die(mysql_error());
      $row_kelas_lama = mysql_fetch_array($sql_kelas_lama);
      $sql_kelas_baru = mysql_query("SELECT detail_makam.id_kelas,
        kelas.nama_kelas 
        FROM detail_makam
        INNER JOIN kelas ON detail_makam.id_kelas = kelas.id_kelas
        WHERE detail_makam.id_detail_makam = '$row[id_detail_makam_baru]'")or die(mysql_error());
      $row_kelas_baru = mysql_fetch_array($sql_kelas_baru);

      $sql_blok_lama = mysql_query("SELECT detail_makam.id_blok,
        blok.nama_blok 
        FROM detail_makam
        INNER JOIN blok ON detail_makam.id_blok = blok.id_blok
        WHERE detail_makam.id_detail_makam = '$row[id_detail_makam_lama]'")or die(mysql_error());
      $row_blok_lama = mysql_fetch_array($sql_blok_lama);
      $sql_blok_baru = mysql_query("SELECT detail_makam.id_blok,
        blok.nama_blok 
        FROM detail_makam
        INNER JOIN blok ON detail_makam.id_blok = blok.id_blok
        WHERE detail_makam.id_detail_makam = '$row[id_detail_makam_baru]'")or die(mysql_error());
      $row_blok_baru = mysql_fetch_array($sql_blok_baru);

      $sql_tpu_lama = mysql_query("SELECT detail_makam.id_blok,
        tpu.wilayah_tpu 
        FROM detail_makam
        INNER JOIN tpu ON tpu.id_tpu = tpu.id_tpu
        WHERE detail_makam.id_detail_makam = '$row[id_detail_makam_lama]'")or die(mysql_error());
      $row_tpu_lama = mysql_fetch_array($sql_tpu_lama);
      $sql_tpu_baru = mysql_query("SELECT detail_makam.id_blok,
        tpu.wilayah_tpu 
        FROM detail_makam
        INNER JOIN tpu ON tpu.id_tpu = tpu.id_tpu
        WHERE detail_makam.id_detail_makam = '$row[id_detail_makam_baru]'")or die(mysql_error());
      $row_tpu_baru = mysql_fetch_array($sql_tpu_baru);

      ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row['tgl_pindah'] ?></td>
        <td><?php echo $row['nama_jenazah'] ?></td>
        <td><?php echo $row_sql_makam_lama['nama_jenis_makam'] ?></td>
        <td><?php echo $row_sql_makam_baru['nama_jenis_makam'] ?></td>
        <td><?php echo $row_detail_makam_lama['no_makam'] ?></td>
        <td><?php echo $row_detail_makam_baru['no_makam'] ?></td>
        <td><?php echo $row_kelas_lama['nama_kelas'] ?></td>
        <td><?php echo $row_kelas_baru['nama_kelas'] ?></td>
        <td><?php echo $row_blok_lama['nama_blok'] ?></td>
        <td><?php echo $row_blok_baru['nama_blok'] ?></td>
        <td><?php echo $row_tpu_lama['wilayah_tpu'] ?></td>
        <td><?php echo $row_tpu_baru['wilayah_tpu'] ?></td>
      </tr>
      <?php $no++; } ?>
    </tbody>

    <tr>


      <td colspan="13" align="center">

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