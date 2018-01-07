<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Registrasi Jenazah Tidak Teridentifikasi
      <small>Data Registrasi Jenazah Tidak Teridentifikasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Registrasi Jenazah Tidak Teridentifikasi</a></li>
      <li><a href="#">Data Registrasi Jenazah Tidak Teridentifikasi</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Registrasi Jenazah Tidak Teridentifikasi</h3>
            <div class="box-header pull-right">
              <a href="registrasi_tidak_dikenal.php"><button type="button" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Tambah Registrasi Baru Jenazah Tidak Teridentifikasi</span></button></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Jenazah Tidak Dikenal</th>
                    <th>Tgl Registrasi</th>
                    <th>Nama Jenis Makam</th>
                    <th>Asal</th>
                    <th>Status</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $dis_pilih = '';
                  $dis_bayar = '';
                  $dis_print = '';
                  $no=1; 
                  $sql = mysql_query("SELECT jenazah_tidak_dikenal.*,jenis_makam.nama_jenis_makam 
                    FROM jenazah_tidak_dikenal
                    INNER JOIN jenis_makam ON jenis_makam.id_jenis_makam = jenazah_tidak_dikenal.id_jenis_makam")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    if($row['status']==0){
                      $ket = '<span class="label label-warning">Belum Pilih Makam</span>';
                      $dis_pilih = '';
                      $dis_bayar = '';
                      $dis_print = 'disabled';
                    }
                   
                    if($row['status']==2){
                      $dis_pilih = 'disabled';
                      $dis_bayar = 'disabled';
                      $dis_print = '';
                      $ket = '<span class="label label-success">Registrasi Selesai</span>';
                    }
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_jenazah_t']; ?></td>
                        <td><?php echo $row['tgl_registrasi_t'] ?></td>
                        <td><?php echo $row['nama_jenis_makam'] ?></td>
                        <td><?php echo $row['asal'] ?></td>
                        <td><?php echo $ket; ?></td>
                        <td align="center"> 
                              <a href="pilih_makam_t.php?id_jenazah_t=<?php echo $row['id_jenazah_t']; ?>&&id_jenis_makam=<?php echo $row['id_jenis_makam']; ?>">
                                <button type="button" <?php echo $dis_pilih; ?> class="btn btn-primary btn-flat btn-sm">
                                  <i class="fa fa-pencil"></i> Pilihkan Makam</button></a>
                                  <a href="cek_detail_jenazah.php?id_jenazah_t=<?php echo $row['id_jenazah_t']; ?>">
                                    <button type="button" <?php echo $dis_print ?> class="btn btn-info btn-flat btn-sm">
                                      <i class="fa fa-print"></i> Cetak Bukti Registrasi</button></a>
                                      <a href="cek_detail_jenazah.php?id_jenazah_t=<?php echo $row['id_jenazah_t']; ?>">
                                        <button type="button" <?php echo $dis_print ?> class="btn btn-default btn-flat btn-sm">
                                          <i class="fa fa-eye"></i> Cek Detail</button></a>   
                                        </td>
                                      </form>
                                    </tr>
                                    <?php $no++; } ?>
                                  </tbody>
                                </table>
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
                        url: "pembayaran_registrasi.php",
                        type: "GET",
                        data : {id_jenazah_t: m,},
                        success: function (ajaxData){
                         $("#ModalEdit").html(ajaxData);
                         $("#ModalEdit").modal('show',{backdrop: 'true'});
                       }
                     });
                    });
               /*$(".open_modal_detail").click(function(e) {
                var m = $(this).attr("id");
                $.ajax({
                  url: "pilih_makam.php",
                  type: "GET",
                  data : {id_jenazah_t: m,},
                  success: function (ajaxData){
                   $("#ModalDetail").html(ajaxData);
                   $("#ModalDetail").modal('show',{backdrop: 'true'});
                 }
               });
             });*/
           });
         </script>

         <?php include('footer.php'); ?>

         <!-- Modal Popup untuk Edit-->
         <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         </div>
         <!-- Modal Popup untuk Edit-->

         <!-- Modal Popup untuk Detail-->
         <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         </div>
         <!-- Modal Popup untuk Detail-->



         <?php
         if(isset($_POST['pembayaran_registrasi'])){
          $id_jenazah_t = $_POST['id_jenazah_t'];

          if($_POST['kembali']<0){
            echo("<script> swal('Pesan', 'Pembayaran Registrasi Gagal', 'error'); 
              setTimeout(function(){ location.replace('kelola_registrasi.php'); }, 1000);
              </script>");
          }else{

            $update  = mysql_query("UPDATE jenazah SET status = '1' WHERE id_jenazah_t = '$id_jenazah_t'")or die(mysql_error());
            echo("<script> swal('Pesan', 'Pembayaran Registrasi Berhasil', 'success');
             setTimeout(function(){ location.replace('kelola_registrasi.php'); }, 1000);
             </script>");
          }
        }

        if(isset($_POST['pilih_lahan'])){

          $tgl_isi = date('Y-m-d');
          $id_jenazah_t = $_POST['id_jenazah_t'];
          $id_detail_makam = $_POST['id_detail_makam'];

          $insert = mysql_query("INSERT INTO isi_lahan VALUES('','$tgl_isi','$id_jenazah_t','$id_detail_makam','1')")or die(mysql_error());

          $isi = mysql_query("UPDATE detail_makam SET status_makam = '1' WHERE id_detail_makam = '$id_detail_makam'")or die(mysql_error());

          $update = mysql_query("UPDATE jenazah_tidak_dikenal SET status = '2' WHERE id_jenazah_t = '$id_jenazah_t' ")or die(mysql_error());

          echo("<script> swal('Pesan', 'Pilih Makam Dan Update Status Makam Berhasil', 'success');
           setTimeout(function(){ location.replace('kelola_registrasi_tidak_dikenal.php'); }, 1000);
           </script>");

        }
        ?>