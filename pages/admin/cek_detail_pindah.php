<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>
<?php
$id_jenazah = $_GET['id_jenazah'];
$sql_bongkar = mysql_query("SELECT
  bongkar.id_bongkar,
  jenazah.nama_jenazah,
  bongkar.tgl_pindah,
  bongkar.id_jenis_makam_lama,
  bongkar.id_jenis_makam_baru,
  bongkar.id_detail_makam_lama,
  bongkar.id_detail_makam_baru
  FROM bongkar
  INNER JOIN jenazah ON bongkar.id_jenazah = jenazah.id_jenazah
  WHERE bongkar.id_jenazah= '$id_jenazah'")or die(mysql_error());
$row_bongkar = mysql_fetch_array($sql_bongkar);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Bongkar
      <small>Cek Detail Pindah Makam</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Kelola Bongkar</a></li>
      <li><a href="#">Cek Detail Pindah Makam</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Cek Detail Pindah Makam</h3>
            <div class="box-header pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <h3>Makam Lama</h3>
                <table class="table table-bordered table-striped" style="width: 100%">
                  <tr>
                    <td style="width: 50%">Id Bongkar</td>
                    <td><?php echo $row_bongkar['id_bongkar']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 50%">Tanggal Pindah Makam</td>
                    <td><?php echo $row_bongkar['tgl_pindah']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 50%">Nama Jenazah</td>
                    <td><?php echo $row_bongkar['nama_jenazah']; ?></td>
                  </tr>
                  <?php
                  $sql_makam_lama = mysql_query("SELECT nama_jenis_makam FROM jenis_makam WHERE id_jenis_makam = '$row_bongkar[id_jenis_makam_lama]'");
                  $row_makam_lama = mysql_fetch_array($sql_makam_lama);
                  ?>
                  <tr>
                    <td style="width: 50%">Nama Jenis Makam Lama</td>
                    <td><?php echo $row_makam_lama['nama_jenis_makam']; ?></td>
                  </tr>
                  <?php
                  $sql_no_makam_lama = mysql_query("SELECT * 
                    FROM detail_makam
                    INNER JOIN kelas ON kelas.id_kelas = detail_makam.id_kelas
                    INNER JOIN tpu ON tpu.id_tpu = detail_makam.id_tpu
                    INNER JOIN blok ON blok.id_blok = detail_makam.id_blok 
                    WHERE id_detail_makam = '$row_bongkar[id_detail_makam_lama]'");
                  $row_no_makam_lama = mysql_fetch_array($sql_no_makam_lama);
                  ?>
                  <tr>
                    <td style="width: 50%">No Makam Lama</td>
                    <td><?php echo $row_no_makam_lama['no_makam']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 50%">Kelas Makam Lama</td>
                    <td><?php echo $row_no_makam_lama['nama_kelas']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 50%">Blok Makam Lama</td>
                    <td><?php echo $row_no_makam_lama['nama_blok']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 50%">TPU Lama</td>
                    <td><?php echo $row_no_makam_lama['wilayah_tpu']; ?></td>
                  </tr>
                </table>
                <a href="kelola_bongkar.php"><button type="button" class="btn btn-danger btn-flat"><i class="fa fa-arrow-left"> Kembali</i></button></a>
              </div>
              <div class="col-md-6">
               <h3>Makam Baru</h3>
               <table class="table table-bordered table-striped" style="width: 100%">
                <tr>
                  <td style="width: 50%">Id Bongkar</td>
                  <td><?php echo $row_bongkar['id_bongkar']; ?></td>
                </tr>
                <tr>
                  <td style="width: 50%">Tanggal Pindah Makam</td>
                  <td><?php echo $row_bongkar['tgl_pindah']; ?></td>
                </tr>
                <tr>
                  <td style="width: 50%">Nama Jenazah</td>
                  <td><?php echo $row_bongkar['nama_jenazah']; ?></td>
                </tr>
                <?php
                $sql_makam_baru = mysql_query("SELECT nama_jenis_makam FROM jenis_makam WHERE id_jenis_makam = '$row_bongkar[id_jenis_makam_baru]'");
                $row_makam_baru = mysql_fetch_array($sql_makam_baru);
                ?>
                <tr>
                  <td style="width: 50%">Nama Jenis Makam Baru</td>
                  <td><?php echo $row_makam_baru['nama_jenis_makam']; ?></td>
                </tr>
              <?php
              $sql_no_makam_baru = mysql_query("SELECT * 
                FROM detail_makam
                INNER JOIN kelas ON kelas.id_kelas = detail_makam.id_kelas
                INNER JOIN tpu ON tpu.id_tpu = detail_makam.id_tpu
                INNER JOIN blok ON blok.id_blok = detail_makam.id_blok 
                WHERE id_detail_makam = '$row_bongkar[id_detail_makam_baru]'");
              $row_no_makam_baru = mysql_fetch_array($sql_no_makam_baru);
              ?>
              <tr>
                <td style="width: 50%">No Makam Baru</td>
                <td><?php echo $row_no_makam_baru['no_makam']; ?></td>
              </tr>
              <tr>
                <td style="width: 50%">Kelas Makam Baru</td>
                <td><?php echo $row_no_makam_baru['nama_kelas']; ?></td>
              </tr>
              <tr>
                <td style="width: 50%">Blok Makam Baru</td>
                <td><?php echo $row_no_makam_baru['nama_blok']; ?></td>
              </tr>
              <tr>
                <td style="width: 50%">TPU Baru</td>
                <td><?php echo $row_no_makam_baru['wilayah_tpu']; ?></td>
              </tr>
            </table>
          </div>
        </div>
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
<script type="text/javascript">
 $(document).ready(function () {
   $(".open_modal").click(function(e) {
    var m = $(this).attr("id");
    $.ajax({
      url: "edit_kelas.php",
      type: "GET",
      data : {id_kelas: m,},
      success: function (ajaxData){
       $("#ModalEdit").html(ajaxData);
       $("#ModalEdit").modal('show',{backdrop: 'true'});
     }
   });
  });
 });
</script>

<?php include('footer.php'); ?>



<!-- Modal Popup untuk Edit-->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<!-- Modal Popup untuk Edit-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Tambah kelas</h4>
      </div>
      <div class="modal-body">
        <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
          <div class="form-group" style="padding-bottom: 5px;">
            <label>Nama kelas</label>
            <input type="text" name="nama_kelas" class="form-control"  required>
          </div>
          <div class="form-group" style="padding-bottom: 5px;">
            <label>Harga kelas</label>
            <input type="number" name="harga" class="form-control"  required>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success btn-flat" type="submit" name="tambah_kelas">
              Confirm
            </button>
            <button type="reset" class="btn btn-danger btn-flat"  data-dismiss="modal" aria-hidden="true">
              Cancel
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php
        //TAMBAH
if(isset($_POST['tambah_kelas'])){

  $nama_kelas = $_POST['nama_kelas'];
  $harga = $_POST['harga'];

  $sql = mysql_query("INSERT INTO kelas VALUES('','$nama_kelas','$harga')")or die(mysql_error());
  if($sql){
    echo("<script> swal('Pesan', 'Berhasil Tambah kelas', 'success'); location.replace('kelola_kelas.php')</script>");
  }else{
    die("<script> swal('Pesan', 'Gagal Tambah kelas', 'error');</script>");
  }
}
          //EDIT
if(isset($_POST['edit_kelas'])){
  $id_kelas = $_POST['id_kelas'];
  $nama_kelas = $_POST['nama_kelas'];
  $harga = $_POST['harga'];

  $sql = mysql_query("UPDATE kelas SET nama_kelas = '$nama_kelas',
    harga = '$harga'
    WHERE id_kelas = '$id_kelas'")or die(mysql_error());
  if($sql){
    echo("<script> swal('Pesan', 'Berhasil Edit kelas', 'success'); location.replace('kelola_kelas.php')</script>");
  }else{
    die("<script> swal('Pesan', 'Gagal Edit Jenis kelas', 'error');</script>");
  }
}

?>