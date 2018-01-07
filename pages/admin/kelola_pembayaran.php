<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pembayaran
      <small>Data Pembayaran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Pembayaran</a></li>
      <li><a href="#">Data Pembayaran</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pembayaran</h3>
            <div class="box-header pull-right">
              <!-- <a href="registrasi.php"><button type="button" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Tambah Registrasi Baru</span></button></a> -->
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
                    <th>Nama Jenis Makam</th>
                    <th>Nama Ahli Waris</th>
                    <th>Jenis Makam</th>
                    <th>Status Pembayaran Tahun Ini</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $dis_pilih = '';
                  $dis_bayar1 = '';
                  $dis_bayar2 = '';
                  $dis_bayar3 = '';
                  $no=1; 
                  $sql = mysql_query("SELECT jenazah.*,
                    jenis_makam.id_jenis_makam, 
                    jenis_makam.nama_jenis_makam, 
                    ahli_waris.nama_pewaris
                    FROM jenazah
                    INNER JOIN  jenis_makam ON jenis_makam.id_jenis_makam = jenazah.id_jenis_makam
                    INNER JOIN ahli_waris ON ahli_waris.id_ahli_waris = jenazah.id_ahli_waris
                    WHERE status > '1'")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){

                    // echo "<pre>";

                    $tahun  = substr($row['tgl_registrasi'],0,4);

                    if($tahun == date('Y')){
                      // echo "Masih Tahun Yang Sama<br>";
                      $ket = '<span class="label label-success">Aman</span>';
                    }else{
                      if($row['status_bayar']<=2){
                      // echo "Tidak Aman<br>";
                        $ket = '<span class="label label-warning">Tidak Aman</span>';
                      }else{
                      // echo "Aman<br>";
                        $ket = '<span class="label label-success">Aman</span>';
                      }
                    }



                  // print_r($tahun);
                  // echo "</pre>";


                    if($row['status_bayar']==0){
                      $dis_bayar1 = '';
                      $dis_bayar2 = 'disabled';
                      $dis_bayar3 = 'disabled';
                      $dis_bayar4 = 'disabled';
                    }
                    if($row['status_bayar']==1){
                      $dis_bayar1 = 'disabled';
                      $dis_bayar2 = '';
                      $dis_bayar3 = 'disabled';
                      $dis_bayar4 = 'disabled';
                    }
                    if($row['status_bayar']==2){
                      $dis_bayar1 = 'disabled';
                      $dis_bayar2 = 'disabled';
                      $dis_bayar3 = '';
                      $dis_bayar4 = 'disabled';
                    }
                    if($row['status_bayar']==3){
                      $dis_bayar1 = 'disabled';
                      $dis_bayar2 = 'disabled';
                      $dis_bayar3 = 'disabled';
                      $dis_bayar4 = '';
                    }
                    if($row['status_bayar']==4){
                      $dis_bayar1 = 'disabled';
                      $dis_bayar2 = 'disabled';
                      $dis_bayar3 = 'disabled';
                      $dis_bayar4 = 'disabled';
                      $ket = '<span class="label label-primary">Pembayaran Tahun Ini Lunas</span>';
                    }

                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_jenazah']; ?></td>
                        <td><?php echo date('d-F-Y', strtotime( $row['tgl_registrasi'] )); ?></td>
                        <td><?php echo $row['nama_jenis_makam'] ?> Rangkap</td>
                        <td><?php echo $row['nama_pewaris'] ?></td>
                        <td><?php echo $row['nama_jenis_makam'] ?></td>
                        <td><?php echo $ket; ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal1' id='<?php echo $row['id_jenazah']; ?>'>
                            <button type="button" <?php echo $dis_bayar1; ?> class="btn btn-success btn-flat btn-sm">
                              <i class="fa fa-money"></i> Pembayaran 1</button></a>
                              <a href="#" class='open_modal2' id='<?php echo $row['id_jenazah']; ?>'>
                                <button type="button" <?php echo $dis_bayar2; ?> class="btn btn-primary btn-flat btn-sm">
                                  <i class="fa fa-money"></i> Pembayaran 2</button></a>
                                  <a href="#" class='open_modal3' id='<?php echo $row['id_jenazah']; ?>'>
                                   <button type="button" <?php echo $dis_bayar3; ?> class="btn btn-info btn-flat btn-sm">
                                    <i class="fa fa-money"></i> Pembayaran 3</button></a>
                                    <a href="#" class='open_modal4' id='<?php echo $row['id_jenazah']; ?>'>
                                      <button type="button" <?php echo $dis_bayar4; ?> class="btn btn-warning btn-flat btn-sm">
                                        <i class="fa fa-money"></i> Pembayaran 4</button></a>
                                        <a href="#">
                                          <button type="button" class="btn btn-default btn-flat btn-sm">
                                            <i class="fa fa-money"></i> Cek Detail</button></a>
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
                       $(".open_modal1").click(function(e) {
                        var m = $(this).attr("id");
                        var d = '1';
                        $.ajax({
                          url: "pembayaran_retribusi.php",
                          type: "GET",
                          data : {id_jenazah: m,pembayaran_ke: d},
                          success: function (ajaxData){
                           $("#ModalEdit1").html(ajaxData);
                           $("#ModalEdit1").modal('show',{backdrop: 'true'});
                         }
                       });
                      });
                       $(".open_modal2").click(function(e) {
                        var m = $(this).attr("id");
                        var d = '2';
                        $.ajax({
                          url: "pembayaran_retribusi.php",
                          type: "GET",
                          data : {id_jenazah: m,pembayaran_ke: d},
                          success: function (ajaxData){
                           $("#ModalEdit1").html(ajaxData);
                           $("#ModalEdit1").modal('show',{backdrop: 'true'});
                         }
                       });
                      });
                       $(".open_modal3").click(function(e) {
                        var m = $(this).attr("id");
                        var d = '3';
                        $.ajax({
                          url: "pembayaran_retribusi.php",
                          type: "GET",
                          data : {id_jenazah: m,pembayaran_ke: d},
                          success: function (ajaxData){
                           $("#ModalEdit1").html(ajaxData);
                           $("#ModalEdit1").modal('show',{backdrop: 'true'});
                         }
                       });
                      });
                       $(".open_modal4").click(function(e) {
                        var m = $(this).attr("id");
                        var d = '4';
                        $.ajax({
                          url: "pembayaran_retribusi.php",
                          type: "GET",
                          data : {id_jenazah: m,pembayaran_ke: d},
                          success: function (ajaxData){
                           $("#ModalEdit1").html(ajaxData);
                           $("#ModalEdit1").modal('show',{backdrop: 'true'});
                         }
                       });
                      });
                     });
                   </script>

                   <?php include('footer.php'); ?>

                   <!-- Modal Popup untuk Bayar 1-->
                   <div id="ModalEdit1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   </div>
                   <!-- Modal Popup untuk Bayar 1-->
                   <!-- Modal Popup untuk Bayar 2-->
                   <div id="ModalEdit2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   </div>
                   <!-- Modal Popup untuk Bayar 2-->
                   <!-- Modal Popup untuk Bayar 3-->
                   <div id="ModalEdit3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   </div>
                   <!-- Modal Popup untuk Bayar 3-->
                   <!-- Modal Popup untuk Bayar 4-->
                   <div id="ModalEdit4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   </div>
                   <!-- Modal Popup untuk Bayar 4-->


                   <?php
                   if(isset($_POST['pembayaran_retribusi'])){

                    $tgl_pembayaran = $_POST['tgl_pembayaran'];
                    $tahun = $_POST['tahun'];
                    $id_jenazah = $_POST['id_jenazah'];
                    $jumlah_bayar = $_POST['jumlah_bayar'];
                    $status_bayar = $_POST['status_bayar'];

                    if($_POST['kembali']<0){
                      echo("<script> swal('Pesan', 'Pembayaran Retribusi Gagal', 'error'); 
                        setTimeout(function(){ location.replace('kelola_pembayaran.php'); }, 1000);
                        </script>");
                    }else{

                      $insert = mysql_query("INSERT INTO retribusi VALUES('','$tgl_pembayaran','$tahun','$id_jenazah','$jumlah_bayar','$status_bayar')")or die(mysql_error());

                      $update  = mysql_query("UPDATE jenazah SET status_bayar = '$status_bayar' WHERE id_jenazah = '$id_jenazah'")or die(mysql_error());

                      echo("<script> swal('Pesan', 'Pembayaran Retribusi Berhasil', 'success');
                        setTimeout(function(){ location.replace('kelola_pembayaran.php'); }, 1000);
                        </script>");
                    }

                  }

                  ?>