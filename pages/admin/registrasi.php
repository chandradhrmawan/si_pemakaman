<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Regitrasi
      <small>Persyaratan</small>
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
                          <label>3. Nama Jenis Makam</label><br>
                          <input type="text" name="harga" id="harga" readonly class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <br>
                        <h5 align="center"><b>II. DATA AHLI WARIS</b></h5>
                        <br>
                        <div class="form-group">
                          <label>1. Jenis Makam</label>
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
                      <div class="col-md-6">
                        <br>
                        <h5 align="center"><b>III. DATA JENAZAH</b></h5>
                        <br>
                        <div class="form-group">
                          <label>1. No Registrasi</label><br>
                          <input type="text" name="id_detail_pemakaman" class="form-control"  value="<?php echo $cetak_noreg; ?>" readonly>
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
                          $(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
      url: "ambilkota.php",
      data: "propinsi="+propinsi,
      cache: false,
      success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
          }
        });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
      url: "ambilkecamatan.php",
      data: "kota="+kota,
      cache: false,
      success: function(msg){
        $("#kec").html(msg);
      }
    });
  });
});

</script>  



<div class="form-group">                                     
  Provinsi<br>                                      
  <select name="provinsi" class="form-control"  id="propinsi" required>
    <option> </option>
    <?php
//mengambil nama-nama propinsi yang ada di database
    $propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
    while($p=mysql_fetch_array($propinsi)){
      echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
    }
    ?> 
  </select></div>


  <div class="form-group">

    Kota / Kabupaten<br>
    <select name="kota" class="form-control"  id="kota" required>
      <option> </option>
      <?php
//mengambil nama-nama propinsi yang ada di database
      $kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
      while($p=mysql_fetch_array($propinsi)){
        echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
      }
      ?>
    </select></div>
    
    <div class="form-group">                           

      Kecamatan<br>
      <select name="kecamatan" class="form-control"  id="kec" required>
        <option> </option>
      </select> </div> 


      <div class="form-group">
        <label>10. Lokasi Pemakaman di TPU</label><br>
        <input type="hidden" name="id_tpu" value="<?php echo $t_tpu['id_tpu']; ?>">
        <input type="text" name="" value="<?php echo $t_tpu['wilayah_tpu']; ?>" class="form-control" readonly>
      </div>

      <div class="form-group">
        <label>11. Jenis Makam</label><br>
        <input type="hidden" name="id_jenis_makam" value="<?php echo $t_jm['id_jenis_makam']; ?>">
        <input type="text" name="" value="<?php echo $t_jm['nama_jenis_makam']; ?>" class="form-control" readonly>
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