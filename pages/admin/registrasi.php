<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Regitrasi
      <small>Form Registrasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="#">Form Registrasi</a></li>
    </ol>
  </section>
  <!-- <script src="jquery.min.js"></script> -->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <h3 class="box-title">Form Registrasi</h3> -->
            <div class="box-header pull-right">
              <!-- <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Persyaratan</span></button> -->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- START -->
            <form role="form" action="" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">Form Registrasi</div>
                    <div class="panel-body">
                      <div class="col-md-6">
                        <br>
                        <h5 align="center"><b>I. DATA MAKAM</b></h5>
                        <br>
                        <div class="form-group">
                          <label>1. Jenis Makam</label>
                          <select name="id_jenis_makam"  onchange="changeValue1(this.value)" required class="form-control" id="select1">
                            <option value="0">Pilih Jenis Makam</option>
                            <?php
                            $result = mysql_query("SELECT * FROM jenis_makam");
                            $jsArray = "var prdName = new Array();\n";

                            while ($row = mysql_fetch_array($result)) {
                              echo '<option value="' . $row['id_jenis_makam'] . '">'.$row['nama_jenis_makam'].'</option>';
                              $jsArray .= "prdName['" . $row['id_jenis_makam'] . "'] =
                              {nama_jenis_makam:'" . addslashes($row['nama_jenis_makam']) . "',
                              harga:'" . addslashes($row['harga']) . "'};\n";
                            }
                            ?>
                            <script>
                              function changeValue1(id){
                                <?php echo $jsArray; ?>
                                document.getElementById('nama_jenis_makam').value = prdName[id].nama_jenis_makam;
                                document.getElementById('harga').value = prdName[id].harga;
                              };
                            </script>

                          </select>
                        </div>

                        <div class="form-group">
                          <label>2. Nama Jenis Makam</label><br>
                          <input type="text" name="nama_jenis_makam" id="nama_jenis_makam" readonly class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>3. Harga</label><br>
                          <input type="text" name="harga" id="harga" readonly class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <br>
                        <h5 align="center"><b>II. DATA AHLI WARIS</b></h5>
                        <br>
                        <div class="form-group">
                          <label>1. Nama Ahli Waris</label>
                          <select name="id_ahli_waris"  onchange="changeValue(this.value)" required class="form-control" id="select2">
                            <option value="0">Pilih Pewaris</option>
                            <?php
                            $result = mysql_query("SELECT * FROM ahli_waris");
                            $jsArray = "var prdName = new Array();\n";

                            while ($row = mysql_fetch_array($result)) {
                              echo '<option value="' . $row['id_ahli_waris'] . '">'.$row['nama_pewaris'].'</option>';
                              $jsArray .= "prdName['" . $row['id_ahli_waris'] . "'] =
                              {nama_pewaris:'" . addslashes($row['nama_pewaris']) . "',
                              no_hp_pewaris:'" . addslashes($row['no_hp_pewaris']) . "'};\n";
                            }
                            ?>
                            <script>
                              function changeValue(id){
                                <?php echo $jsArray; ?>
                                document.getElementById('nama_pewaris').value = prdName[id].nama_pewaris;
                                document.getElementById('no_hp_pewaris').value = prdName[id].no_hp_pewaris;
                              };
                            </script>

                          </select>
                        </div>

                        <div class="form-group">
                          <label>2. Nama Ahli Waris</label><br>
                          <input type="text" name="nama_pewaris" id="nama_pewaris" readonly class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>3. No Hp Ahli Waris</label><br>
                          <input type="text" name="no_hp_pewaris" id="no_hp_pewaris" readonly class="form-control" required>
                        </div>
                      </div>
                      <?php
                      $carikode = mysql_query("select max(id_jenazah) from jenazah") or die (mysql_error());
                      $datakode = mysql_fetch_array($carikode);
                      if ($datakode) {
                       $nilaikode = substr($datakode[0], 2);
                       $kode = (int) $nilaikode;
                       $kode = $kode + 1;
                       $id_jenazah = "JN".str_pad($kode, 3, "0", STR_PAD_LEFT);
                     } else {
                       $id_jenazah = "JN001";
                     }
                     ?>
                     <div class="col-md-6">
                      <br>
                      <h5 align="center"><b>III. DATA JENAZAH</b></h5>
                      <br>
                      <div class="form-group">
                        <label>1. No Registrasi</label><br>
                        <input type="text" name="id_jenazah" class="form-control"  value="<?php echo $id_jenazah; ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label>2. Nama</label><br>
                        <input type="text" name="nama_jenazah" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>3. Bin/Binti</label><br>
                        <input type="text" name="bin_binti" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>4. Jenis Kelamin</label><br>
                        <select name="jk_jenazah" class="form-control" required>
                          <option></option>
                          <option value="Pria">Pria</option>
                          <option value="Wanita">Wanita</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>5. Tempat Lahir</label><br>
                        <input type="text" name="tempat_lahir"  class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>6. Tanggal Lahir</label><br>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>7. Tanggal Meninggal</label><br>
                        <input type="date" name="tgl_meninggal" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>8. Tanggal Pemakaman</label><br>
                        <input type="date" name="tgl_pemakaman" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>9. Alamat</label><br>
                        <textarea name="alamat_jenazah" class="form-control" placeholder="Jl/Gg , RT , RW , Desa" required></textarea>

                      </div>


                      <script type="text/javascript" src="jquery.js"></script>
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
                            <div class="form-group">                                     
                             <label>9. Provinsi</label><br>                                     
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
                           <div class="form-group">
                            <label>10. Kota/Kabupaten</label><br>   
                            <select name="id_kota" id="kota" required class="form-control select2">
                              <option>Pilih Kota/Kabupaten</option>
                            </select></div>
                            <div class="form-group">                           
                             <label>11. Kecamatan</label><br> 
                             <select name="id_kecamatan" id="kec" required class="form-control select2">
                              <option>Pilih Kecamatan</option>
                            </select> </div> 

                          </div>
                          <div class="col-md-6">
                            <br>
                            <h5 align="center"><b>IV. PERSYARATAN</b></h5>
                            <br>
                            <?php
                            $no = 1;
                            $sql = mysql_query("SELECT * FROM jenis_makam");
                            while($row = mysql_fetch_array($sql)){
                              $id_jenis_makam = $row['id_jenis_makam'];
                              ?>
                              <div class="form-group">
                                <input type="radio" name="persyaratan[]" value="<?php echo $row['id_jenis_makam'] ?>">
                                <label><?php echo $no; ?>. <?php echo $row['nama_jenis_makam']; ?></label>
                                <br>
                                <?php
                                $sql_syarat = mysql_query("SELECT * FROM persyaratan WHERE id_jenis_makam = '$id_jenis_makam'")or die(mysql_error());
                                while($row_syarat = mysql_fetch_array($sql_syarat)){ ?>
                                <input type="checkbox" name="detail_persyaratan[]" value="<?php echo $row_syarat['id_persyaratan']; ?>"><?php echo $row_syarat['nama_persyaratan']; ?></br>
                                <?php } ?>
                              </div>
                              <?php 
                              $no++;
                            } 
                            ?>
                            <hr>
                            <div class="form-group">
                              <code>Pastikan Persyaratan Lengkap Dan Sesuai Dengan Jenis Makam Yang Dipilih, Checklis Kotak Untuk Melanjutkan Proses</code><br><br>
                            </div>
                            <div class="form-group pull-left">
                              <button type="submit" name="simpan" class="btn btn-primary btn-flat btn-md">SIMPAN</button>
                              <a href="kelola_registrasi.php"><button type="button" class="btn btn-flat btn-danger btn-md">BATAL</button></a>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- END -->
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


    <?php include('footer.php'); ?>

    <?php
    if(isset($_POST['simpan'])){
     /* echo "<pre>";
      print_r($_POST);
      echo "</pre>";*/

      $konter_persyaratan = 0;
      foreach (@$_POST['detail_persyaratan'] as $key => $value) {
       $konter_persyaratan++;
     }

     @$id_jenis_makam = $_POST['persyaratan'][0];

     if(empty($id_jenis_makam)){
      die("<script> swal('Pesan','Belum Pilih Makam','error');  
        setTimeout(function(){ history.back(); }, 1000);
        </script>");
    }

    $sql_cek_max = mysql_query("SELECT * FROM persyaratan WHERE id_jenis_makam = '$id_jenis_makam'");
    $cek_max = mysql_num_rows($sql_cek_max);

    if($konter_persyaratan < $cek_max){
      die("<script> swal('Pesan','Persyaratan Belum Lengkap','error');  
      setTimeout(function(){ history.back(); }, 1000);
      </script>");
   }


   $id_jenazah = $_POST['id_jenazah'];
   $tgl_registrasi = date('Y-m-d');
   $id_jenis_makam = $_POST['id_jenis_makam'];
   $id_ahli_waris = $_POST['id_ahli_waris'];
   $nama_jenazah = $_POST['nama_jenazah'];
   $bin_binti = $_POST['bin_binti'];
   $jk_jenazah = $_POST['jk_jenazah'];
   $tempat_lahir = $_POST['tempat_lahir'];
   $tgl_lahir = $_POST['tgl_lahir'];
   $tgl_meninggal = $_POST['tgl_meninggal'];
   $tgl_pemakaman = $_POST['tgl_pemakaman'];
   $alamat_jenazah = $_POST['alamat_jenazah'];
   $id_provinsi  = $_POST['id_provinsi'];
   $id_kota = $_POST['id_kota'];
   $id_kecamatan = $_POST['id_kecamatan'];
   $status = '0';

   $sql = mysql_query("INSERT INTO jenazah VALUES('$id_jenazah','$tgl_registrasi','$id_jenis_makam','$id_ahli_waris','$nama_jenazah',
    '$bin_binti','$jk_jenazah','$tempat_lahir','$tgl_lahir','$tgl_meninggal','$tgl_pemakaman',
    '$alamat_jenazah','$id_provinsi','$id_kota','$id_kecamatan','$status','0')")or die(mysql_error());

   echo("<script> swal('Pesan', 'Insert Berhasil', 'success');
     setTimeout(function(){ location.replace('kelola_registrasi.php'); }, 1000);
     </script>");

 }
 ?>