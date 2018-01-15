<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>
<script src="jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Master Data
      <small>Ahli Waris</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
      <li><a href="#">Ahli Waris</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Master Data Ahli Waris</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Ahli Waris</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No Identitas</th>
                    <th>Nama Pewaris</th>
                    <th>No Telp</th>
                    <th>Umur</th>
                    <th>Perkerjaan</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1; 
                  $sql = mysql_query("SELECT * FROM ahli_waris")or die(mysql_error()); 
                  while($row = mysql_fetch_array($sql)){
                    ?>
                    <tr>
                      <form method="POST" action="">
                        <td><?php echo $row['id_ahli_waris']; ?></td>
                        <td><?php echo $row['nama_pewaris'] ?></td>
                        <td><?php echo $row['no_hp_pewaris'] ?></td>
                        <td><?php echo $row['umur_pewaris'] ?> </td>
                        <td><?php echo $row['perkerjaan_pewaris'] ?></td>
                        <td><?php echo $row['alamat_pewaris'] ?></td>
                        <td align="center"> 
                          <a href="#" class='open_modal' id='<?php echo $row['id_ahli_waris']; ?>'>
                           <button type="button" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-edit"></i> Edit</button></a>
                            <a href="delete_ahli_waris.php?&id_ahli_waris=<?php echo $row['id_ahli_waris']; ?>" class="delete-link">
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
              url: "edit_ahli_waris.php",
              type: "GET",
              data : {id_ahli_waris: m,},
              success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
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
        <h4 class="modal-title" id="myModalLabel">Tambah Ahli Waris</h4>
      </div>
      <div class="modal-body">
        <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
          <div class="form-group" style="padding-bottom: 5px;">
            <label>Nomor Identitas</label>
            <input type="text" name="id_ahli_waris" class="form-control" value="" required>
          </div>
          <div class="form-group" style="padding-bottom: 5px;">
            <label>Nama Pewaris</label>
            <input type="text" name="nama_pewaris" class="form-control" placeholder="Nama Pewaris"  required>
          </div>
          <div class="form-group" style="padding-bottom: 5px;">
            <label>No Hp Pewaris</label>
            <input type="number" name="no_hp_pewaris" class="form-control" required> 
          </div>
          <div class="form-group" style="padding-bottom: 5px;">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control"  required> 
          </div>
          <div class="form-group" style="padding-bottom: 5px;">
            <label>Perkerjaan Pewaris</label>
            <input type="text" name="perkerjaan_pewaris" class="form-control" required> 
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
          <label for="Modal Name">Alamat Pewaris</label>
          <textarea name="alamat_pewaris" required class="form-control" cols="5" rows="5" placeholder="Alamat Lengkap Pewaris"> </textarea>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success btn-flat" type="submit" name="tambah_ahli_waris">
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
if(isset($_POST['tambah_ahli_waris'])){
  $id_ahli_waris = $_POST['id_ahli_waris'];
  $nama_pewaris = $_POST['nama_pewaris'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $perkerjaan_pewaris = $_POST['perkerjaan_pewaris'];
  $alamat_pewaris = $_POST['alamat_pewaris'];
  $id_provinsi = $_POST['id_provinsi'];
  $id_kota = $_POST['id_kota'];
  $id_kecamatan = $_POST['id_kecamatan'];
  $no_hp_pewaris = $_POST['no_hp_pewaris'];


  $tahun_lahir = substr($tgl_lahir,0,4);
  $tahun_now = date('Y');

  $umur_pewaris = $tahun_now - $tahun_lahir;


if(empty($id_ahli_waris OR $nama_pewaris OR $umur_pewaris OR $perkerjaan_pewaris OR $alamat_pewaris OR $id_provinsi OR $id_kota OR $id_kecamatan OR $no_hp_pewaris )){
  die("<script> swal('Pesan', 'Data Belum Lengkap', 'error');</script>");
}
$sql = mysql_query("INSERT INTO ahli_waris VALUES('$id_ahli_waris','$nama_pewaris','$umur_pewaris','$perkerjaan_pewaris','$alamat_pewaris','$id_provinsi','$id_kota','$id_kecamatan','$no_hp_pewaris')")or die(mysql_error());
if($sql){
  echo("<script> swal('Pesan', 'Berhhasil Tambah Ahli Waris', 'success'); location.replace('kelola_ahli_waris.php')</script>");
}else{
  die("<script> swal('Pesan', 'Gagal Tambah Ahli Waris', 'error');</script>");
}
}
          //EDIT
if(isset($_POST['edit_ahli_waris'])){
  $id_ahli_waris = $_POST['id_ahli_waris'];
  $nama_pewaris = $_POST['nama_pewaris'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $perkerjaan_pewaris = $_POST['perkerjaan_pewaris'];
  $alamat_pewaris = $_POST['alamat_pewaris'];
  $id_provinsi = $_POST['id_provinsi'];
  $id_kota = $_POST['id_kota'];
  $id_kecamatan = $_POST['id_kecamatan'];
  $no_hp_pewaris = $_POST['no_hp_pewaris'];

  $tahun_lahir = substr($tgl_lahir,0,4);
  $tahun_now = date('Y');

  $umur_pewaris = $tahun_now - $tahun_lahir;

  $sql = mysql_query("UPDATE ahli_waris SET nama_pewaris = '$nama_pewaris',
    perkerjaan_pewaris = '$perkerjaan_pewaris',
    alamat_pewaris = '$alamat_pewaris',
    perkerjaan_pewaris = '$perkerjaan_pewaris',
    id_provinsi = '$id_provinsi',
    id_kota = '$id_kota',
    id_kecamatan = '$id_kecamatan',
    no_hp_pewaris = '$no_hp_pewaris'
    WHERE id_ahli_waris = '$id_ahli_waris'")or die(mysql_error());
  if($sql){
    echo("<script> swal('Pesan', 'Berhhasil Edit Ahli Waruis', 'success'); location.replace('kelola_ahli_waris.php')</script>");
  }else{
    die("<script> swal('Pesan', 'Gagal Edit Jenis Ahli Waris', 'error');</script>");
  }
}

?>