<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>Jenis Makam</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">Jenis Makam</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data Jenis Makam</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Jenis Makam</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Makam</th>
                    <th>Nama Jenis Makam</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT * FROM jenis_makam")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_jenis_makam']; ?></td>
                        <td><?php echo $row['nama_jenis_makam'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_jenis_makam']; ?>'>
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_jenis_makam.php?&id_jenis_makam=<?php echo $row['id_jenis_makam']; ?>" class="delete-link">
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
              url: "edit_jenis_makam.php",
              type: "GET",
              data : {id_jenis_makam: m,},
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
       $carikode = mysql_query("select max(id_jenis_makam) from jenis_makam") or die (mysql_error());
       $datakode = mysql_fetch_array($carikode);
       if ($datakode) {
         $nilaikode = substr($datakode[0], 2);
         $kode = (int) $nilaikode;
         $kode = $kode + 1;
         $id_jenis_makam = "JM".str_pad($kode, 3, "0", STR_PAD_LEFT);
       } else {
         $id_jenis_makam = "JM001";
       }
       ?>
       <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Jenis Makam</h4>
            </div>
            <div class="modal-body">
              <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Kode Makam</label>
                  <input type="text" readonly name="id_jenis_makam" class="form-control" value="<?php echo $id_jenis_makam; ?>"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Nama Jenis Makam</label>
                  <input type="text" name="nama_jenis_makam" class="form-control"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Harga</label>
                  <input type="number" name="harga" class="form-control" required >
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success btn-flat" type="submit" name="tambah_jenis_makam">
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
      if(isset($_POST['tambah_jenis_makam'])){
        $id_jenis_makam = $_POST['id_jenis_makam'];
        $nama_jenis_makam = $_POST['nama_jenis_makam'];
        $harga = $_POST['harga'];

        if(empty($nama_jenis_makam OR $harga )){
          die("<script> swal('Pesan', 'Data Belum Lengkap', 'error');</script>");
        }
        $sql = mysql_query("INSERT INTO jenis_makam VALUES('$id_jenis_makam','$nama_jenis_makam','$harga')")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Tambah Jenis Makam', 'success'); location.replace('kelola_jenis_makam.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Tambah Jenis Makam', 'error');</script>");
        }
      }
          //EDIT
      if(isset($_POST['edit_jenis_makam'])){
        $id_jenis_makam = $_POST['id_jenis_makam'];
        $nama_jenis_makam = $_POST['nama_jenis_makam'];
        $harga = $_POST['harga'];

        $sql = mysql_query("UPDATE jenis_makam SET nama_jenis_makam = '$nama_jenis_makam',
          harga = '$harga'
          WHERE id_jenis_makam = '$id_jenis_makam'")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Edit Jenis Makam', 'success'); location.replace('kelola_jenis_makam.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Edit Jenis Makam', 'error');</script>");
        }
      }

      ?>