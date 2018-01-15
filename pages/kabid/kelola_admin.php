<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">Admin</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data Admin</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Admin</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Admin</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT * FROM admin")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    if($row['status']==1){
                      $status = '<span class="label label-success">Aktif</span>';
                    }else{
                      $status = '<span class="label label-warning">Tidak</span>';
                    }

                    if($row['level']==1){
                      $level = '<span class="label label-primary">Administrator</span>';
                    }else{
                      $level = '<span class="label label-warning">Staff</span>';
                    }

                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['nama_admin'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $level; ?></td>
                        <td><?php echo $status; ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_admin']; ?>'>
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_admin.php?&id_admin=<?php echo $row['id_admin']; ?>" class="delete-link">
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
              url: "edit_admin.php",
             type: "GET",
             data : {id_admin: m,},
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
              <h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
            </div>
            <div class="modal-body">
              <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Nama Admin</label>
                  <input type="text" name="nama_admin" class="form-control"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required >
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Password</label>
                  <input type="password" name="password1" class="form-control" required >
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="password2" class="form-control" required >
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Level</label>
                  <select name="level" class="form-control select2" required >
                    <option value="1">Administrator</option>
                    <option value="2">Staff</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success btn-flat" type="submit" name="tambah_admin">
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
      if(isset($_POST['tambah_admin'])){
        $nama_admin = $_POST['nama_admin'];
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $level = $_POST['level'];

        if($password1 != $password2){
         die("<script> swal('Pesan', 'Password Tidak Sama', 'error');</script>");
       }

       if(empty($nama_admin OR $username OR $password1 OR $password2)){
        die("<script> swal('Pesan', 'Data Belum Lengkap', 'error');</script>");
      }
      $sql = mysql_query("INSERT INTO admin VALUES('','$nama_admin','$username','$password1','1','$level')")or die(mysql_error());
      if($sql){
        echo("<script> swal('Pesan', 'Berhhasil Tambah Admin', 'success'); location.replace('kelola_admin.php')</script>");
      }else{
        die("<script> swal('Pesan', 'Gagal Tambah admin', 'error');</script>");
      }
    }
          //EDIT
    if(isset($_POST['edit_admin'])){
      $id_admin = $_POST['id_admin'];
      $nama_admin = $_POST['nama_admin'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $level = $_POST['level'];

      $sql = mysql_query("UPDATE admin SET nama_admin = '$nama_admin',
                                           username = '$username',
                                           password = '$password',
                                           level = '$level'
                                          WHERE id_admin = '$id_admin'")or die(mysql_error());
      if($sql){
        echo("<script> swal('Pesan', 'Berhhasil Edit admin', 'success'); location.replace('kelola_admin.php')</script>");
      }else{
        die("<script> swal('Pesan', 'Gagal Edit admin', 'error');</script>");
      }
    }

    ?>