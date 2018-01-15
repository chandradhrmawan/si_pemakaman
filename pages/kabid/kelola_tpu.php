<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>TPU (Tempat Pemakaman Umum)</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">TPU (Tempat Pemakaman Umum)</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data TPU (Tempat Pemakaman Umum)</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah TPU</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode TPU</th>
                    <th>Wilayah TPU</th>
                    <th>Alamat TPU</th>
                    <th>Tahun Berdiri</th>
                    <th>Luas Lahan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT * FROM tpu")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_tpu']; ?></td>
                        <td><?php echo $row['wilayah_tpu'] ?></td>
                        <td><?php echo $row['alamat_tpu'] ?></td>
                        <td><?php echo $row['tahun_berdiri'] ?></td>
                        <td><?php echo $row['luas_lahan'] ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_tpu']; ?>'>
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_tpu.php?&id_tpu=<?php echo $row['id_tpu']; ?>" class="delete-link">
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
              url: "edit_tpu.php",
              type: "GET",
              data : {id_tpu: m,},
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
       $carikode = mysql_query("select max(id_tpu) from tpu") or die (mysql_error());
       $datakode = mysql_fetch_array($carikode);
       if ($datakode) {
         $nilaikode = substr($datakode[0], 2);
         $kode = (int) $nilaikode;
         $kode = $kode + 1;
         $id_tpu = "TP".str_pad($kode, 3, "0", STR_PAD_LEFT);
       } else {
         $id_tpu = "TP001";
       }
       ?>
       <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Jenis TPU</h4>
            </div>
            <div class="modal-body">
              <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Kode Makam</label>
                  <input type="text" readonly name="id_tpu" class="form-control" value="<?php echo $id_tpu; ?>"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Nama Wilayah TPU</label>
                  <input type="text" name="wilayah_tpu" class="form-control" placeholder="Wilayah TPU"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Alamat TPU</label>
                  <textarea name="alamat_tpu" class="form-control" placeholder="Alamat TPU" cols="5" rows="5" required> </textarea>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Tahun Berdiri</label>
                  <input type="text" name="tahun_berdiri" class="form-control" placeholder="Tahun Berdiri"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Luas Lahan</label>
                  <input type="text" name="luas_lahan" class="form-control" placeholder="Luas Lahan"  required>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success btn-flat" type="submit" name="tambah_tpu">
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
      if(isset($_POST['tambah_tpu'])){
        $id_tpu = $_POST['id_tpu'];
        $wilayah_tpu = $_POST['wilayah_tpu'];
        $alamat_tpu = $_POST['alamat_tpu'];
        $tahun_berdiri = $_POST['tahun_berdiri'];
        $luas_lahan = $_POST['luas_lahan'];

        if(empty($wilayah_tpu OR $alamat_tpu OR $tahun_berdiri OR $luas_lahan )){
          die("<script> swal('Pesan', 'Data Belum Lengkap', 'error');</script>");
        }
        $sql = mysql_query("INSERT INTO tpu VALUES('$id_tpu','$wilayah_tpu','$alamat_tpu','$tahun_berdiri','$luas_lahan')")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Tambah TPU', 'success'); location.replace('kelola_tpu.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Tambah TPU', 'error');</script>");
        }
      }
          //EDIT
      if(isset($_POST['edit_tpu'])){
        $id_tpu = $_POST['id_tpu'];
        $wilayah_tpu = $_POST['wilayah_tpu'];
        $alamat_tpu = $_POST['alamat_tpu'];
        $tahun_berdiri = $_POST['tahun_berdiri'];
        $luas_lahan = $_POST['luas_lahan'];

        $sql = mysql_query("UPDATE tpu SET wilayah_tpu = '$wilayah_tpu',
          alamat_tpu = '$alamat_tpu',
          tahun_berdiri = '$tahun_berdiri',
          luas_lahan = '$luas_lahan'
          WHERE id_tpu = '$id_tpu'")or die(mysql_error());
        if($sql){
          echo("<script> swal('Pesan', 'Berhhasil Edit TPU', 'success'); location.replace('kelola_tpu.php')</script>");
        }else{
          die("<script> swal('Pesan', 'Gagal Edit Jenis TPU', 'error');</script>");
        }
      }

      ?>