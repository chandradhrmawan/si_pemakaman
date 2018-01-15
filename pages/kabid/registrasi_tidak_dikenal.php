<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Regitrasi
      <small>Persyaratan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">Form Registrasi</a></li>
    </ol>
  </section>
  <!-- <script src="jquery.min.js"></script> -->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <h3 class="box-title">Form Registrasi</h3> -->
            <div class="box-header pull-right">
              <!-- <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Persyaratan</span></button> -->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- START -->
            <form role="form" action="" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">Form Registrasi</div>
                    <div class="panel-body">

                      <?php
                      $carikode = mysql_query("select max(id_jenazah_t) from jenazah_tidak_dikenal") or die (mysql_error());
                      $datakode = mysql_fetch_array($carikode);
                      if ($datakode) {
                       $nilaikode = substr($datakode[0], 2);
                       $kode = (int) $nilaikode;
                       $kode = $kode + 1;
                       $id_jenazah_t = "JT".str_pad($kode, 3, "0", STR_PAD_LEFT);
                     } else {
                       $id_jenazah_t = "JT001";
                     }
                     ?>
                     <div class="col-md-12">
                      <br>
                      <h5 align="center"><b>I. DATA JENAZAH TIDAK TERIDENTIFIKASI</b></h5>
                      <br>
                      <div class="form-group">
                        <label>1. No Registrasi</label><br>
                        <input type="text" name="id_jenazah_t" class="form-control"  value="<?php echo $id_jenazah_t; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>2. Tanggal Registrasi</label><br>
                        <input type="text" name="tgl_registrasi_t" class="form-control"  value="<?php echo date('Y-m-d'); ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label>3. Jenis Makam</label><br>
                        <select name="id_jenis_makam" required class="form-control">
                          <?php
                          $result = mysql_query("SELECT * FROM jenis_makam");
                          while ($row = mysql_fetch_array($result)) {
                            echo "<option value=\"$row[id_jenis_makam]\">$row[nama_jenis_makam]</option>\n";
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>4. Jenis Kelamin</label><br>
                        <select name="jk_jenazah" class="form-control" required>
                          <option value="Pria">Pria</option>
                          <option value="Wanita">Wanita</option>
                        </select>
                      </div>
                      


                      <div class="form-group">
                        <label>5. Asal</label><br>
                        <textarea name="asal" class="form-control" placeholder="" required></textarea>
                      </div>

                      <div class="form-group">
                        <label>6. Tanggal Meninggal</label><br>
                        <input type="date" name="tgl_meninggal" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>7. Tanggal Pemakaman</label><br>
                        <input type="date" name="tgl_pemakaman" class="form-control" required>
                      </div>

                      <div class="form-group pull-left">
                        <button type="submit" name="simpan" class="btn btn-primary btn-md">SIMPAN</button>
                        <a href="kelola_registrasi_tidak_dikenal.php">
                          <button type="button" class="btn btn-danger btn-md">BATAL
                          </button></a>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- END -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include('footer.php'); ?>

<?php
if(isset($_POST['simpan'])){
  /*echo "<pre>";
  print_r($_POST);
  echo "</pre>";
  die();*/

  $id_jenazah_t = $_POST['id_jenazah_t'];
  $tgl_registrasi_t = $_POST['tgl_registrasi_t'];
  $id_jenis_makam = $_POST['id_jenis_makam'];
  $jk_jenazah = $_POST['jk_jenazah'];
  $asal = $_POST['asal'];
  $tgl_meninggal = $_POST['tgl_meninggal'];
  $tgl_pemakaman = $_POST['tgl_pemakaman'];
  $status = '0';

  $sql = mysql_query("INSERT INTO jenazah_tidak_dikenal VALUES('$id_jenazah_t','$tgl_registrasi_t','$id_jenis_makam',
    '$jk_jenazah','$asal','$tgl_meninggal','$tgl_pemakaman','$status')")or die(mysql_error());

  echo("<script> swal('Pesan', 'Insert Berhasil', 'success');
   setTimeout(function(){ location.replace('kelola_registrasi_tidak_dikenal.php'); }, 1000);
   </script>");

}
?>