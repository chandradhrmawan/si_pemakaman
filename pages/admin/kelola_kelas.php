<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>kelas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">kelas</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data kelas</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah kelas</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode kelas</th>
                    <th>Nama kelas</th>
                    <th>Harga kelas</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT * FROM kelas")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_kelas']; ?></td>
                        <td><?php echo $row['nama_kelas'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_kelas']; ?>'>
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_kelas.php?&id_kelas=<?php echo $row['id_kelas']; ?>" class="delete-link">
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