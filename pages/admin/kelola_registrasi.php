<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Registrasi
      <small>Data Registrasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Registrasi</a></li>
      <li><a href="#">Data Registrasi</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Registrasi</h3>
            <div class="box-header pull-right">
              <a href="registrasi.php"><button type="button" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Tambah Registrasi Baru</span></button></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Registrasi</th>
                    <th>Tgl Registrasi</th>
                    <th>Nama Jenazah</th>
                    <th>Nama Jenis Makam</th>
                    <th>Nama Ahli Waris</th>
                    <th>Nama Jenazah</th>
                    <th>Jenis Makam</th>
                    <th>Status Pembayaran Registrasi</th>
                    <th>Status</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $dis_pilih = '';
                  $dis_bayar = '';
                  $dis_print = '';
                  $ket_bayar = '';
                  $no=1; 
                  $sql = mysql_query("SELECT jenazah.*,
                    jenis_makam.id_jenis_makam, 
                    jenis_makam.nama_jenis_makam, 
                    ahli_waris.nama_pewaris
                    FROM jenazah
                    INNER JOIN  jenis_makam ON jenis_makam.id_jenis_makam = jenazah.id_jenis_makam
                    INNER JOIN ahli_waris ON ahli_waris.id_ahli_waris = jenazah.id_ahli_waris")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    if($row['status']==0){
                      $ket = '<span class="label label-warning">Belum Bayar Registrasi</span>';
                      $ket_bayar = '<span class="label label-danger">Belum Bayar Registrasi</span>';
                      $dis_pilih = 'disabled';
                      $dis_bayar = '';
                      $dis_print = 'disabled';
                    }
                    if($row['status']==1){
                      $dis_pilih = '';
                      $dis_bayar = 'disabled';
                      $dis_print = 'disabled';
                      $ket = '<span class="label label-primary">Sudah Bayar Registrasi</span>';
                      $ket_bayar = '<span class="label label-success">Suda Bayar Registrasi</span>';
                    }
                    if($row['status']==2){
                      $dis_pilih = 'disabled';
                      $dis_bayar = 'disabled';
                      $dis_print = '';
                      $ket = '<span class="label label-success">Registrasi Selesai</span>';
                      $ket_bayar = '<span class="label label-success">Suda Bayar Registrasi</span>';
                    }
                    if($row['status']==7){
                      $dis_pilih = 'disabled';
                      $dis_bayar = 'disabled';
                      $dis_print = '';
                      $ket = '<span class="label label-warning">Pindah Bongkar</span>';
                      $ket_bayar = '<span class="label label-success">Suda Bayar Registrasi</span>';
                    }
                    
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_jenazah']; ?></td>
                        <td><?php echo $row['tgl_registrasi'] ?></td>
                        <td><?php echo $row['nama_jenazah'] ?></td>
                        <td><?php echo $row['nama_jenis_makam'] ?></td>
                        <td><?php echo $row['nama_pewaris'] ?></td>
                        <td><?php echo $row['nama_jenazah'] ?></td>
                        <td><?php echo $row['nama_jenis_makam'] ?></td>
                        <td><?php echo $ket_bayar; ?></td>
                        <td><?php echo $ket; ?></td>
                        <td align="center"> 
                         <a href="#" class='open_modal' id='<?php echo $row['id_jenazah']; ?>'>
                           <button type="button" <?php echo $dis_bayar; ?> class="btn btn-success btn-flat btn-sm">
                            <i class="fa fa-pencil"></i> Pembayaran Registrasi</button></a>
                            <a href="pilih_makam.php?id_jenazah=<?php echo $row['id_jenazah']; ?>&&id_jenis_makam=<?php echo $row['id_jenis_makam']; ?>">
                              <button type="button" <?php echo $dis_pilih; ?> class="btn btn-primary btn-flat btn-sm">
                                <i class="fa fa-pencil"></i> Pilihkan Makam</button></a>
                                <a href="bukti_pendaftaran.php?id_jenazah=<?php echo $row['id_jenazah']; ?>" target="__blank"> 
                                  <button type="button" <?php echo $dis_print ?> class="btn btn-info btn-flat btn-sm">
                                    <i class="fa fa-print"></i> Cetak Bukti Registrasi</button></a>
                                    <a target="__blank" href="kartu.php?id_jenazah=<?php echo $row['id_jenazah']; ?>">
                                      <button type="button" <?php echo $dis_print ?> class="btn btn-default btn-flat btn-sm">
                                        <i class="fa fa-eye"></i> Kartu Data Makam </button></a> 
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
                      data : {id_jenazah: m,},
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
                  data : {id_jenazah: m,},
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
          $id_jenazah = $_POST['id_jenazah'];

          if($_POST['kembali']<0){
            echo("<script> swal('Pesan', 'Pembayaran Registrasi Gagal', 'error'); 
              setTimeout(function(){ location.replace('kelola_registrasi.php'); }, 1000);
              </script>");
          }else{

            $update  = mysql_query("UPDATE jenazah SET status = '1' WHERE id_jenazah = '$id_jenazah'")or die(mysql_error());
            echo("<script> swal('Pesan', 'Pembayaran Registrasi Berhasil', 'success');
             setTimeout(function(){ location.replace('kelola_registrasi.php'); }, 1000);
             </script>");
          }
        }

        if(isset($_POST['pilih_lahan'])){

          $tgl_isi = date('Y-m-d');
          $id_jenazah = $_POST['id_jenazah'];
          $id_detail_makam = $_POST['id_detail_makam'];

          $insert = mysql_query("INSERT INTO isi_lahan VALUES('','$tgl_isi','$id_jenazah','$id_detail_makam','1')")or die(mysql_error());

          $isi = mysql_query("UPDATE detail_makam SET status_makam = '1' WHERE id_detail_makam = '$id_detail_makam'")or die(mysql_error());

          $update = mysql_query("UPDATE jenazah SET status = '2' WHERE id_jenazah = '$id_jenazah' ")or die(mysql_error());

          echo("<script> swal('Pesan', 'Pilih Makam Dan Update Status Makam Berhasil', 'success');
           setTimeout(function(){ location.replace('kelola_registrasi.php'); }, 1000);
           </script>");

        }
        ?>