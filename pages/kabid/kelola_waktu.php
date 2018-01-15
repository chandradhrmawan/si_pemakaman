<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>waktu</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">waktu</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data waktu</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah waktu</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode waktu</th>
                    <th>Nama waktu</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT * FROM waktu")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_waktu']; ?></td>
                        <td><?php echo $row['nama_waktu'] ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_waktu']; ?>'>
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_waktu.php?&id_waktu=<?php echo $row['id_waktu']; ?>" class="delete-link">
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
              url: "edit_waktu.php",
              type: "GET",
              data : {id_waktu: m,},
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
              <h4 class="modal-title" id="myModalLabel">Tambah waktu</h4>
            </div>
            <div class="modal-body">
              <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Nama waktu</label>
                  <input type="text" name="nama_waktu" class="form-control"  required>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success btn-flat" type="submit" name="tambah_waktu">
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
      if(isset($_POST['tambah_waktu'])){

        $nama_waktu = $_POST['nama_waktu'];

        $sql = mysql_query("INSERT INTO waktu VALUES('','$nama_waktu')")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Tambah waktu', 'success'); location.replace('kelola_waktu.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Tambah waktu', 'error');</script>");
        }
      }
          //EDIT
      if(isset($_POST['edit_waktu'])){
        $id_waktu = $_POST['id_waktu'];
        $nama_waktu = $_POST['nama_waktu'];
        
        $sql = mysql_query("UPDATE waktu SET nama_waktu = '$nama_waktu'
          WHERE id_waktu = '$id_waktu'")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Edit waktu', 'success'); location.replace('kelola_waktu.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Edit Jenis waktu', 'error');</script>");
        }
      }

      ?>