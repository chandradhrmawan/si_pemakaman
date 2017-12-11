<?php include('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
  $page = 'kelola_dokter.php';
  $page2 = 'kelola_dokter1.php';
   ?>
  <?php include('sidebar.php'); ?>
 <script src="jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->



    <section class="content-header">
      <h1>
        Data Dokter
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Dokter</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Dokter</span></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Dokter</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>No Tlp</th>
                  <th>Tgl Lahir</th>
                  <th>Poli</th>
                  <th>Foto</th>
                  <th style="text-align:center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
									$sql = mysql_query('SELECT * FROM dokter,poli WHERE dokter.id_poli = poli.id_poli')or die(mysql_error());
										while($row = mysql_fetch_array($sql)){
											if($row['jk']==1){
												$jk = 'Laki- Laki';
                      }else{
                        $jk = 'Perempuan';
                      }
									?>
                  <tr>
                    <form name="hps" method="post" action="">
                      <td><?php echo $row['id_dokter']; ?></td>
                      <td><?php echo $row['nama_dokter']; ?></td>
                      <td><?php echo $jk; ?></td>
  										<td><?php echo $row['no_tlp']; ?></td>
                      <td><?php echo $row['tgl_lahir']; ?></td>
                      <td><?php echo $row['nama_poli']; ?></td>
                      <td><a href="<?php echo $row['direktori']; ?>" class="sb"><img src="<?php echo $row['direktori']; ?>" height="50" width="50" class="img-circle perbesar"></a></td>
                      <td align="center">
                        <a href="#" class="open_modal_detail" id='<?php echo $row['id_dokter']; ?>'>
                      	   <button type="button" class="btn btn-primary btn-flat btn-md">
                          <i class="fa fa-search"></i> Detail</button></a>
                      <a href="#" class='open_modal' id='<?php echo $row['id_dokter']; ?>'>
                    	<button type="button" class="btn btn-success btn-flat btn-md">
                        <i class="fa fa-edit"></i> Edit</button></a>
                      <a href="delete_dokter.php?&id_dokter=<?php echo $row['id_dokter']; ?>" class="delete-link">
                      <button type="submit" class="btn btn-danger btn-flat btn-md">
                        <i class="fa fa-trash"></i> Hapus</button></a>
                      </a>
                    </td>
                  </form>
                </tr>
               		<?php
						}
					?>
              </tbody>
              </table>
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
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.5
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Modal Popup untuk Edit-->
			<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
  <!-- Modal Popup untuk Edit-->

  <!-- Modal Popup untuk Detail-->
			<div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
  <!-- Modal Popup untuk Detail-->

  <!-- Modal Untuk Tambah Data-->
  <?php
  $carikode = mysql_query("select max(id_dokter) from dokter") or die (mysql_error());
  $datakode = mysql_fetch_array($carikode);
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   $kode = (int) $nilaikode;
   $kode = $kode + 1;
   $hasilkode = "D".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $hasilkode = "D001";
  }
 ?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Dokter</h4>
        </div>
        <div class="modal-body">
        	<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                	<label for="Modal Name">Kode Dokter</label>
                    <input type="text" name="id_dokter" readonly value="<?php echo $hasilkode; ?>" class="form-control" >
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                	<label for="Modal Name">Nama Dokter</label>
                    <input type="text" name="nama" class="form-control" >
                </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                	<label for="Modal Name">Jenis Kelamin</label><br>
                    <label class="radio-inline"><input type="radio" name="jk" value="1" checked>Laki - Laki</label>
                    <label class="radio-inline"><input type="radio" name="jk" value="0">Perempuan</label>
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                 	<label for="Modal Name">No Tlp</label>
                     <input type="number" name="no_tlp" class="form-control" >
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                 	<label for="Modal Name">Tgl Lahir</label>
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                       <input type="text" name="tgl_lahir" class="form-control pull-right" id="datepicker">
                     </div>
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                 	<label for="Modal Name">Poli</label>
                    <select name="id_poli" id="id_poli"  required class="form-control select2">
                                 <option value="0">Pilih Poli</option>
                                 <?php
                                 $poli=mysql_query("SELECT DISTINCT  * FROM poli ORDER BY id_poli");
                                 while($p=mysql_fetch_array($poli)){
                                     echo "<option value=\"$p[id_poli]\">$p[nama_poli]</option>\n";
                                 }
                                 ?>
                    </select>
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                 	<label for="Modal Name">Provinsi</label>
                    <select name="id_provinsi" id="propinsi"  required class="form-control select2">
                                 <option>Pilih Provinsi</option>
                                 <?php
                                 //ambil data provinsi dari databale prov
                                 $propinsi=mysql_query("SELECT DISTINCT  * FROM provinsi ORDER BY nama_provinsi");
                                 while($p=mysql_fetch_array($propinsi)){
                                     echo "<option value=\"$p[id_provinsi]\">$p[nama_provinsi]</option>\n";
                                 }
                                 ?>
                    </select>
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                 	<label for="Modal Name">Kota</label>
                    <select name="id_kota" id="kota" required class="form-control select2">
                      <option>Pilih Kota/Kabupaten</option>
                    </select>
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                 	<label for="Modal Name">Kecamatan</label>
                    <select name="id_kecamatan" id="kec" required class="form-control select2">
                      <option>Pilih Kecamatan</option>
                    </select>
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                 	<label for="Modal Name">Kode Pos</label>
                     <input type="number" name="kode_pos" class="form-control" >
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                   <label for="Modal Name">Alamat Lengkap</label>
                     <textarea name="alamat_lengkap" value="" required class="form-control" placeholder="Alamat Lengkap" cols="5" rows="6"></textarea>
                 </div>
                 <div class="form-group" style="padding-bottom: 5px;">
                	<label for="Modal Name">Foto</label>
                    <input type="file" name="nama_file"  class="form-control" />
                 </div>
	            <div class="modal-footer">
	                <button class="btn btn-success btn-flat" type="submit" name="tambah_dokter">
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

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "edit_dokter.php",
    			   type: "GET",
    			   data : {id_detail: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal_detail").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "detail_dokter.php",
    			   type: "GET",
    			   data : {id_detail: m,},
    			   success: function (ajaxData){
      			   $("#ModalDetail").html(ajaxData);
      			   $("#ModalDetail").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<script type="text/javascript">

		var htmlobjek;
		$(document).ready(function() {
		//apabila terjadi event onchage terhadap objek <select id=pripinsi>
		$("#propinsi").change(function(){
			var propinsi = $("#propinsi").val();
			$.ajax({
				url: "ambilkota.php",
				data: "propinsi="+propinsi,
				cache: false,
				success: function(msg){
					//jika data sukses diambil dari server tampilkan
					//di <select id=kota>
					$("#kota").html(msg);
				}

			});

        });
		$("#kota").change(function(){
			var kota= $("#kota").val();
			$.ajax({
				url:"ambilkecamatan.php",
				data:"kota="+kota,
				cache:false,
				success: function(msg){
					$("#kec").html(msg);
				}
				});
			});
		});

	</script>


<?php include 'footer.php'; ?>

<?php
if(isset($_POST['tambah_dokter'])){
    $id_dokter = $_POST['id_dokter'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_tlp = $_POST['no_tlp'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $id_poli = $_POST['id_poli'];
    $id_provinsi = $_POST['id_provinsi'];
    $id_kota = $_POST['id_kota'];
    $id_kecamatan = $_POST['id_kecamatan'];
    $kode_pos = $_POST['kode_pos'];
    $alamat_lengkap = $_POST['alamat_lengkap'];
    $username = '0';
    $pas1 = '0';
    $pas2 = '0';

    if($pas1 != $pas2){
      die("<script> swal('Pesan', 'Password Tidak Sama', 'warning'); </script>");
    }


      $tipe = $_FILES['nama_file']['type'];
      $nama_file = $_FILES['nama_file']['name'];
      $size = $_FILES['nama_file']['size'];
      $source = $_FILES['nama_file']['tmp_name'];

      $direktori = '../../dist/img/'.$nama_file;

    if(empty($_FILES['nama_file']['name'])){
      $tipe= 'image/png';
      $nama_file='admin.png';
      $direktori='../../dist/img/admin.png';
      $insert = mysql_query("INSERT INTO dokter VALUES ('$id_dokter','$nama','$jk','$no_tlp','$tgl_lahir','$id_poli',
                                                      '$id_provinsi','$id_kota','$id_kecamatan','$kode_pos','$alamat_lengkap','$direktori','$username','$pas1')")or die(mysql_error());
      if($insert){
        echo "<script> swal('Pesan', 'Tambah Berhasil', 'success'); location.replace('kelola_dokter.php')</script>";
      }else{

      }
    }


    if($size >= 400000){
      die("<script> swal('Pesan', 'Ukuran File Terlalu Besar', 'warning'); </script>");
    }

    if(move_uploaded_file($source,$direktori)){

      $insert = mysql_query("INSERT INTO dokter VALUES ('$id_dokter','$nama','$jk','$no_tlp','$tgl_lahir','$id_poli',
                                                      '$id_provinsi','$id_kota','$id_kecamatan','$kode_pos','$alamat_lengkap','$direktori','$username','$pas1')")or die(mysql_error());
    if($insert){
      echo "<script> swal('Pesan', 'Tambah Berhasil', 'success'); location.replace('kelola_dokter.php')</script>";
    }else{

    }
  }
}
?>

<?php
if(isset($_POST['edit_dokter'])){
    $id_admin = $_POST['id_admin'];
    $nama = $_POST['nama'];
    $username = '0';
    $pas1 = '0';
    $pas2 = '0';

    $level = $_POST['level'];

    if($level == 'Pilih Level'){
      die("<script> swal('Pesan', 'Belum Pilih Level', 'warning');</script>");
    }


    if($pas1 != $pas2){
      die("<script> swal('Pesan', 'Password Tidak Sama', 'warning'); </script>");
    }


      $tipe = $_FILES['nama_file']['type'];
      $nama_file = $_FILES['nama_file']['name'];
      $size = $_FILES['nama_file']['size'];
      $source = $_FILES['nama_file']['tmp_name'];

      $direktori = '../../dist/img/'.$nama_file;

    if(empty($_FILES['nama_file']['name'])){
      $tipe= 'image/png';
      $nama_file='admin.png';
      $direktori='../../dist/img/admin.png';
      $update = mysql_query("UPDATE admin SET id_admin = '$id_admin',
                                              nama = '$nama',
                                              username = '$username',
                                              password = '$pas1',
                                              level = '$level',
                                              direktori = '$direktori'
                                              WHERE id_admin = '$id_admin' ")or die(mysql_error());
      if($update){
        echo "<script> swal('Pesan', 'Tambah Berhasil', 'success'); location.replace('kelola_dokter.php')</script>";
      }else{

      }
    }


    if($size >= 400000){
      die("<script> swal('Pesan', 'Ukuran File Terlalu Besar', 'warning'); </script>");
    }

    if(move_uploaded_file($source,$direktori)){

    $update = mysql_query("UPDATE admin set id_admin = '$id_admin',
                                            nama = '$nama',
                                            username = '$username',
                                            password = '$pas1',
                                            level = '$level',
                                            direktori = '$direktori'
                                          WHERE id_admin = '$id_admin' ")or die(mysql_error());
    if($update){
      echo "<script> swal('Pesan', 'Tambah Berhasil', 'success'); location.replace('kelola_admin.php')</script>";
    }else{

    }
  }
}
?>
