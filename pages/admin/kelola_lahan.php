<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>Lahan Pemakaman</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">Lahan Pemakaman</a></li>
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
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Lahan Pemakaman</span></button>
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
                  $sql = mysql_query("SELECT * FROM detail_makam,jenis_makam,kelas,blok,tpu 
                    WHERE detail_makam.id_blok  = blok.id_blok
                    AND detail_makam.id_kelas = kelas.id_kelas
                    AND detail_makam.id_jenis_makam = jenis_makam.id_jenis_makam
                    AND detail_makam.id_tpu = tpu.id_tpu")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    if($row['status_makam']==0){
                      $ket = '<span class="label label-success">Kosong</span>';
                    }else{
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
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_detail_makam.php?&id_detail_makam=<?php echo $row['id_detail_makam']; ?>" class="delete-link">
                              <button type="submit" class="btn btn-danger btn-flat btn-sm">
                                <i class="fa fa-trash"></i> Hapus</button></a>
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
              url: "edit_lahan.php",
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

       <!-- Modal Popup untuk Detail-->
       <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       </div>
       <!-- Modal Popup untuk Detail-->
       
       <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Lahan Makam</h4>
            </div>
            <div class="modal-body">
              <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>No Makam</label>
                  <input type="text" name="no_makam" class="form-control" value=""  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Blok</label>
                  <select name="id_blok" class="form-control select2" required >
                    <?php
                    $sql = mysql_query("SELECT * FROM blok");
                    while($row=mysql_fetch_array($sql)){
                      ?>
                      <option value="<?php echo $row['id_blok'] ?>"><?php echo $row['nama_blok']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group" style="padding-bottom: 5px;">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control select2" required >
                      <?php
                      $sql = mysql_query("SELECT * FROM kelas");
                      while($row=mysql_fetch_array($sql)){
                        ?>
                        <option value="<?php echo $row['id_kelas'] ?>"><?php echo $row['nama_kelas']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group" style="padding-bottom: 5px;">
                      <label>Jenis Makam</label>
                      <select name="id_jenis_makam" class="form-control select2" required >
                        <?php
                        $sql = mysql_query("SELECT * FROM jenis_makam");
                        while($row=mysql_fetch_array($sql)){
                          ?>
                          <option value="<?php echo $row['id_jenis_makam'] ?>"><?php echo $row['nama_jenis_makam']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group" style="padding-bottom: 5px;">
                        <label>Wilayah TPU</label>
                        <select name="id_tpu" class="form-control select2" required >
                          <?php
                          $sql = mysql_query("SELECT * FROM tpu");
                          while($row=mysql_fetch_array($sql)){
                            ?>
                            <option value="<?php echo $row['id_tpu'] ?>"><?php echo $row['wilayah_tpu']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group" style="padding-bottom: 5px;">
                          <label>Status</label>
                          <select name="status" class="form-control select2" required >
                            <option value="0">Kosong</option>
                            <option value="1">Isi</option>
                          </div>
                        </select>
                        <div class="modal-footer">
                          <button class="btn btn-success btn-flat" type="submit" name="tambah_lahan">
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
              if(isset($_POST['tambah_lahan'])){
                $no_makam = $_POST['no_makam'];
                $id_blok = $_POST['id_blok'];
                $id_kelas = $_POST['id_kelas'];
                $id_jenis_makam = $_POST['id_jenis_makam'];
                $id_tpu  = $_POST['id_tpu'];
                $status = $_POST['status'];


                $sql = mysql_query("INSERT INTO detail_makam VALUES('','$no_makam','$id_blok','$id_kelas','$id_jenis_makam','$id_tpu','$status')")or die(mysql_error());
                if($sql){
                  echo("<script> swal('Pesan', 'Berhasil Tambah Lahan Makam', 'success'); 
                    setTimeout(function(){ location.replace('kelola_lahan.php'); }, 1000);
                    </script>");
                }else{
                  die("<script> swal('Pesan', 'Gagal Tambah Lahan Makam', 'error');</script>");
                }
              }

              //EDIT
              if(isset($_POST['edit_lahan'])){
                
               $id_detail_makam = $_POST['id_detail_makam'];
               $no_makam = $_POST['no_makam'];
               $id_blok = $_POST['id_blok'];
               $id_kelas = $_POST['id_kelas'];
               $id_jenis_makam = $_POST['id_jenis_makam'];
               $id_tpu  = $_POST['id_tpu'];
               $status = $_POST['status_makam'];

               $sql = mysql_query("UPDATE detail_makam SET no_makam = '$no_makam',
                id_blok = '$id_blok',
                id_kelas = '$id_kelas',
                id_jenis_makam = '$id_jenis_makam',
                id_tpu = '$id_tpu',
                status_makam = '$status'
                WHERE id_detail_makam = '$id_detail_makam'")or die(mysql_error());

               if($sql){
                echo("<script> swal('Pesan', 'Berhasil Edit Lahan Makam', 'success'); 
                  setTimeout(function(){ location.replace('kelola_lahan.php'); }, 1000);
                  </script>");
              }else{
                die("<script> swal('Pesan', 'Gagal Edit Jenis Lahan Makam', 'error');</script>");
              }
            }

            ?>