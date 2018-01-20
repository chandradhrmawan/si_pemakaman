<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Pembayaran
      <small>Detail Pembayaran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Pembayaran </a></li>
      <li><a href="#">Detail Pembayaran</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <?php
  $id_jenazah = $_GET['id_jenazah'];
  ?>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Kelola Pembayaran</h3>
            <div class="box-header pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <?php
          $no=1; 
          $sql = mysql_query("SELECT
            jenazah.nama_jenazah,
            ahli_waris.nama_pewaris
            FROM
            jenazah
            INNER JOIN ahli_waris ON jenazah.id_ahli_waris = ahli_waris.id_ahli_waris
            WHERE
            jenazah.id_jenazah = '$id_jenazah'")or die(mysql_error()); 
          $row = mysql_fetch_array($sql);
          ?>
          <div class="box-body">
            <h3>DETAIL PEMBAYARAN</h3>
            <div class="row">
              <div class="col-xs-6">
                <div class="content">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Nama Pewaris</th>
                      </tr>
                      <tr>
                        <td><?php echo $row['nama_pewaris']; ?></td>
                      </tr>
                      <tr>
                        <th>Nama Jennazah</th>
                      </tr>
                      <tr>
                        <td><?php echo $row['nama_jenazah']; ?></td>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Nama Jenazah</th>
                    <th>Nama Ahli Waris</th>
                    <th>Pembayaran Ke</th>
                    <th>Print Bukti Pembayaran</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT
                    retribusi.id_pembayaran,
                    retribusi.tgl_pembayaran,
                    jenazah.nama_jenazah,
                    ahli_waris.nama_pewaris,
                    retribusi.status_bayar
                    FROM
                    retribusi
                    INNER JOIN jenazah ON retribusi.id_jenazah = jenazah.id_jenazah
                    INNER JOIN ahli_waris ON jenazah.id_ahli_waris = ahli_waris.id_ahli_waris
                    WHERE
                    jenazah.id_jenazah = '$id_jenazah'")or die(mysql_error()); 

                  while($row = mysql_fetch_array($sql)){
                    if($row['status_bayar']==1){
                      $ket = '<span class="label label-default">Pembayaran Ke-1</span>';
                    }else if($row['status_bayar']==2){
                      $ket = '<span class="label label-info">Pembayaran Ke-2</span>';
                    }else if($row['status_bayar']==3){
                      $ket = '<span class="label label-primary">Pembayaran Ke-3</span>';
                    }else if($row['status_bayar']==4){
                      $ket = '<span class="label label-success">Pembayaran Ke-4</span>';
                    }
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['tgl_pembayaran']; ?></td>
                        <td><?php echo $row['nama_jenazah'] ?></td>
                        <td><?php echo $row['nama_pewaris'] ?></td>
                        <td><?php echo $ket; ?></td>
                        <td align="center">
                          <a href="inv.php?&id_pembayaran=<?php echo $row['id_pembayaran']; ?>" target="__blank">
                            <button type="button" class="btn btn-primary btn-flat btn-sm">
                              <i class="fa fa-print"></i> Cetak</button></a>
                            </td>
                          </form>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <a href="kelola_pembayaran.php">
                      <button type="button" class="btn btn-danger btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali</button></a>
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
                url: "edit_blok.php",
                type: "GET",
                data : {id_blok: m,},
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
                <h4 class="modal-title" id="myModalLabel">Tambah Blok</h4>
              </div>
              <div class="modal-body">
                <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                  <div class="form-group" style="padding-bottom: 5px;">
                    <label>Nama Blok</label>
                    <input type="text" name="nama_blok" class="form-control"  required>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-success btn-flat" type="submit" name="tambah_blok">
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
        if(isset($_POST['tambah_blok'])){

          $nama_blok = $_POST['nama_blok'];

          $sql = mysql_query("INSERT INTO blok VALUES('','$nama_blok')")or die(mysql_error());
          if($sql){
            echo("<script> swal('Pesan', 'Berhhasil Tambah Blok', 'success'); location.replace('kelola_blok.php')</script>");
          }else{
            die("<script> swal('Pesan', 'Gagal Tambah Blok', 'error');</script>");
          }
        }
          //EDIT
        if(isset($_POST['edit_blok'])){
          $id_blok = $_POST['id_blok'];
          $nama_blok = $_POST['nama_blok'];

          $sql = mysql_query("UPDATE blok SET nama_blok = '$nama_blok'
            WHERE id_blok = '$id_blok'")or die(mysql_error());
          if($sql){
            echo("<script> swal('Pesan', 'Berhhasil Edit Blok', 'success'); location.replace('kelola_blok.php')</script>");
          }else{
            die("<script> swal('Pesan', 'Gagal Edit Jenis Blok', 'error');</script>");
          }
        }

        ?>