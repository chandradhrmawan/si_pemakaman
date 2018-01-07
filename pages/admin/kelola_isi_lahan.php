<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Lahan
      <small>Detail Isi Lahan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Lahan</a></li>
      <li><a href="#">Detail Isi Lahan</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data Lahan Pemakaman</h3>
            <div class="box-header pull-right">
              <!-- <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Lahan Pemakaman</span></button> -->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Makam</th>
                    <th>Blok</th>
                    <th>Kelas</th>
                    <th>Nama Jenis Makam</th>
                    <th>Lokasi TPU</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  $dis_view = ''; 
                  $sql = mysql_query("SELECT * FROM detail_makam,jenis_makam,kelas,blok,tpu 
                    WHERE detail_makam.id_blok  = blok.id_blok
                    AND detail_makam.id_kelas = kelas.id_kelas
                    AND detail_makam.id_jenis_makam = jenis_makam.id_jenis_makam
                    AND detail_makam.id_tpu = tpu.id_tpu")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    if($row['status_makam']==0){
                      $dis_view = 'disabled';
                      $ket = '<span class="label label-success">Kosong</span>';
                    }else{
                      $dis_view = '';
                      $ket = '<span class="label label-danger">Isi</span>';
                    }
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['no_makam'] ?></td>
                        <td><?php echo $row['nama_blok'] ?> Rangkap</td>
                        <td><?php echo $row['nama_kelas'] ?></td>
                        <td><?php echo $row['nama_jenis_makam'] ?></td>
                        <td><?php echo $row['wilayah_tpu'] ?></td>
                        <td><?php echo $ket ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_detail_makam']; ?>'>
                           <button <?php echo $dis_view; ?> type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-eye"></i> View</button></a>
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
          url: "view_isi_lahan.php",
          type: "GET",
          data : {id_detail_makam: m,},
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
    