<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>Persyaratan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">Persyaratan</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data Persyaratan</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Persyaratan</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Persyaratan</th>
                    <th>Nama Persyaratan</th>
                    <th>Jumlah</th>
                    <th>Jenis Makam</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT * FROM persyaratan,jenis_makam WHERE persyaratan.id_jenis_makam  = jenis_makam.id_jenis_makam")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_persyaratan']; ?></td>
                        <td><?php echo $row['nama_persyaratan'] ?></td>
                        <td><?php echo $row['jml_persyaratan'] ?> Rangkap</td>
                        <td><?php echo $row['nama_jenis_makam'] ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_persyaratan']; ?>'>
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_persyaratan.php?&id_persyaratan=<?php echo $row['id_persyaratan']; ?>" class="delete-link">
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
              url: "edit_persyaratan.php",
              type: "GET",
              data : {id_persyaratan: m,},
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
       <?php
       $carikode = mysql_query("select max(id_persyaratan) from persyaratan") or die (mysql_error());
       $datakode = mysql_fetch_array($carikode);
       if ($datakode) {
         $nilaikode = substr($datakode[0], 2);
         $kode = (int) $nilaikode;
         $kode = $kode + 1;
         $id_persyaratan = "PM".str_pad($kode, 3, "0", STR_PAD_LEFT);
       } else {
         $id_persyaratan = "PM001";
       }
       ?>
       <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Jenis Persyaratan</h4>
            </div>
            <div class="modal-body">
              <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Kode Persyaratan</label>
                  <input type="text" readonly name="id_persyaratan" class="form-control" value="<?php echo $id_persyaratan; ?>"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Persyaratan</label>
                  <input type="text" name="nama_persyaratan" class="form-control" placeholder="Persyaratan"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Jumlah</label>
                 <input type="number" name="jml_persyaratan" class="form-control" required> 
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
                <div class="modal-footer">
                  <button class="btn btn-success btn-flat" type="submit" name="tambah_persyaratan">
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
      if(isset($_POST['tambah_persyaratan'])){
        $id_persyaratan = $_POST['id_persyaratan'];
        $nama_persyaratan = $_POST['nama_persyaratan'];
        $jml_persyaratan = $_POST['jml_persyaratan'];
        $id_jenis_makam = $_POST['id_jenis_makam'];

        if(empty($nama_persyaratan OR $jml_persyaratan OR $id_jenis_makam )){
          die("<script> swal('Pesan', 'Data Belum Lengkap', 'error');</script>");
        }
        $sql = mysql_query("INSERT INTO persyaratan VALUES('$id_persyaratan','$nama_persyaratan','$jml_persyaratan','$id_jenis_makam')")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Tambah Persyaratan', 'success'); location.replace('kelola_persyaratan.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Tambah Persyaratan', 'error');</script>");
        }
      }
          //EDIT
      if(isset($_POST['edit_persyaratan'])){
        $id_persyaratan = $_POST['id_persyaratan'];
        $nama_persyaratan = $_POST['nama_persyaratan'];
        $jml_persyaratan = $_POST['jml_persyaratan'];
        $id_jenis_makam = $_POST['id_jenis_makam'];

        $sql = mysql_query("UPDATE persyaratan SET nama_persyaratan = '$nama_persyaratan',
          jml_persyaratan = '$jml_persyaratan',
          id_jenis_makam = '$id_jenis_makam',
          WHERE id_persyaratan = '$id_persyaratan'")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Edit Persyaratan', 'success'); location.replace('kelola_persyaratan.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Edit Jenis Persyaratan', 'error');</script>");
        }
      }

      ?>