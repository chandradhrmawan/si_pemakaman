<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>
<?php

$id_jenazah = $_SESSION['id_jenazah'];
$id_jenis_makam_lama = $_SESSION['id_jenis_makam_lama'];
$id_detail_makam_lama = $_SESSION['id_detail_makam_lama'];
$id_tpu_lama = $_SESSION['id_tpu_lama'];

$modal=mysql_query("SELECT * FROM jenazah,jenis_makam WHERE 
 jenis_makam.id_jenis_makam = '$id_jenis_makam_lama'
 AND jenazah.id_jenis_makam = jenis_makam.id_jenis_makam
 AND jenazah.id_jenazah = '$id_jenazah'

 ")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pilih Makam Baru
      <small>Data Pilih Makam Baru</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>  Pilih Makam Baru</a></li>
      <li><a href="#">Pilih Makam Baru</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Pilih Makam Baru</h3>
            <div class="box-header pull-right">
              <!-- <a href="registrasi.php"><button type="button" class="btn btn-primary btn-flat"><span class="fa fa-plus"> Tambah  Pindah Bongkar Baru</span></button></a> -->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="" method="POST">
              <div class="col-sm-6">
               <br>
               <h5 align="center"><b>I. DATA LAMA</b></h5>
               <br>
               <div class="form-group" style="padding-bottom: 5px;">
                <label>Kode Registrasi</label>
                <input type="text" readonly name="id_jenazah" class="form-control" value="<?php echo $id_jenazah; ?>"  required>
              </div>
              <div class="form-group" style="padding-bottom: 5px;">
                <label>Jenis Makam Lama</label>
                <input type="text" readonly name="" class="form-control" value="<?php echo $r['nama_jenis_makam']; ?>"  required>
              </div>
              <div class="form-group">
                <label>Jenis Makam Baru</label>
                <select name="id_jenis_makam_baru"  onchange="changeValue1(this.value)" required class="form-control" id="">
                  <option value="kosong">Pilih Jenis Makam</option>
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
                <label>Nama Jenis Makam</label><br>
                <input type="text" name="nama_jenis_makam" id="nama_jenis_makam" readonly class="form-control" required>
              </div>
              <div class="form-group">
                <label>Harga Makam</label><br>
                <input type="text" name="harga" id="harga" readonly class="form-control" required>
              </div>
              <?php 
              $sql_bongkar = mysql_query("SELECT * FROM jenis_makam WHERE id_jenis_makam = 'JM004'")or die(mysql_error());
              $row_bongkar = mysql_fetch_array($sql_bongkar);
              ?>
              <div class="form-group">
                <label>Harga Bongkar Makam</label><br>
                <input type="text" name="harga_bongkar" id="harga_bongkar" readonly value="<?php echo $row_bongkar['harga'] ?>" class="form-control" required>
              </div>
              <?php 
              $sql_tpu  = mysql_query("SELECT * FROM tpu WHERE id_tpu = '$id_tpu_lama'")or die(mysql_error());
              $row_tpu = mysql_fetch_array($sql_tpu);
              ?>
              <div class="form-group">
                <label>Wilayah TPU Lama</label><br>
                <input type="text" name="wilayah_tpu_lama" readonly class="form-control" value="<?php echo $row_tpu['wilayah_tpu']; ?>" required>
              </div>
              <div class="form-group">
                <label>Wilayah TPU Baru</label><br>
                <select name="id_tpu_baru" class="form-control">
                  <?php 
                  $sql_tpu  = mysql_query("SELECT * FROM tpu")or die(mysql_error()); 
                  while($row_tpu = mysql_fetch_array($sql_tpu)){
                    if($row_tpu['id_tpu'] == $id_tpu_lama ){ ?>
                    <option value="<?php echo $row_tpu['id_tpu'] ?>" selected><?php echo $row_tpu['wilayah_tpu'] ?></option>
                    <?php }else{ ?>
                    <option value="<?php echo $row_tpu['id_tpu'] ?>"s><?php echo $row_tpu['wilayah_tpu'] ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <hr>
                <div class="form-group pull-left">
                  <button type="submit" name="cek_makam" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-search"> CEK ISI MAKAM </i></button>
                  <!-- <button type="button" class="btn btn-danger btn-md btn-flat">BATAL</button> -->
                </div>

              <!-- <div class="form-group">
                <code>Pastikan Persyaratan Lengkap Dan Sesuai Dengan Jenis Makam Yang Dipilih, Checklis Kotak Dibawah Untuk Melanjutkan Proses</code><br><br>
                <input type="checkbox" name="validasi"> <p>Semua Persyaratan Telah Lengkap</p>
              </div>
              <div class="form-group pull-left">
                <button type="submit" name="simpan" class="btn btn-primary btn-md">SIMPAN</button>
                <button type="button" class="btn btn-danger btn-md">BATAL</button>
              </div>  -->

            </div>
            <div class="col-md-6">
              <br>
              <h5 align="center"><b>II. PERSYARATAN</b></h5>
              <br>
              <?php
              $no = 1;
              $sql = mysql_query("SELECT * FROM jenis_makam");
              while($row = mysql_fetch_array($sql)){
                $id_jenis_makam = $row['id_jenis_makam'];
                ?>
                <div class="form-group">
                  <label><?php echo $no; ?>. <?php echo $row['nama_jenis_makam']; ?></label><br>
                  <?php
                  $sql_syarat = mysql_query("SELECT * FROM persyaratan WHERE id_jenis_makam = '$id_jenis_makam'")or die(mysql_error());
                  while($row_syarat = mysql_fetch_array($sql_syarat)){ ?>
                  <li><?php echo $row_syarat['nama_persyaratan']; ?></li>
                  <?php } ?>
                </div>
                <?php 
                $no++;
              } 
              ?>
              <div class="form-group">
                <code>Pastikan Persyaratan Lengkap Dan Sesuai Dengan Jenis Makam Yang Dipilih</code><br><br>
              </div>
            </div>
          </form>
          <?php
          if(isset($_POST['cek_makam'])){

           /* echo "<pre>";
            print_r($_POST);
            echo "</pre>";*/

            $id_jenis_makam_baru  = $_POST['id_jenis_makam_baru'];
            $id_tpu_baru = $_POST['id_tpu_baru'];


            if($id_jenis_makam_baru == 'kosong'){

              echo("<script> swal('Alert !', 'Jenis Makam Belum Dipilih', 'error');
                setTimeout(function(){ location.replace('pilih_makam_b.php'); }, 2000);
                </script>");
            }

          }
          ?>
        </div>

        <?php
        if(empty($id_jenis_makam_baru)){
          $id_jenis_makam_baru = $id_jenis_makam_lama;
        }

        if(empty($id_tpu_baru)){
          $id_tpu_baru = $id_tpu_lama;
        }

        ?>

        <div class="box-body">
          <div class="table-responsive">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Makam</th>
                  <th>Blok</th>
                  <th>Kelas</th>
                  <th>Nama Jenis Makam</th>
                  <th>Lokasi TPU</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1; 
                $sql = mysql_query("SELECT * FROM detail_makam,jenis_makam,kelas,blok,tpu 
                  WHERE detail_makam.id_blok  = blok.id_blok
                  AND detail_makam.id_kelas = kelas.id_kelas
                  AND detail_makam.id_jenis_makam = jenis_makam.id_jenis_makam
                  AND detail_makam.id_tpu = tpu.id_tpu
                  AND jenis_makam.id_jenis_makam = '$id_jenis_makam_baru'
                  AND tpu.id_tpu = '$id_tpu_baru'")or die(mysql_error());  

                while($row = mysql_fetch_array($sql)){
                  if($row['status_makam']==0){
                    $dis = '';
                    $ket = '<span class="label label-success">Kosong</span>';
                  }else{
                    $dis = 'disabled';
                    $ket = '<span class="label label-danger">Isi</span>';
                  }
                  ?>
                  <tr>
                    <form method="POST" action="">
                      <input type="hidden" name="id_detail_makam" value="<?php echo $row['id_detail_makam']; ?>">
                      <input type="hidden" name="id_jenazah" value="<?php echo $id_jenazah; ?>">
                      <input type="hidden" name="id_jenis_makam_baru" value="<?php echo $id_jenis_makam_baru; ?>">
                      <input type="hidden" name="id_tpu_baru" value="<?php echo $id_tpu_baru; ?>">
                      <input type="hidden" name="id_jenis_makam_lama" value="<?php echo $id_jenis_makam_lama; ?>">
                      <input type="hidden" name="id_tpu_lama" value="<?php echo $id_tpu_lama; ?>">
                      <input type="hidden" name="id_detail_makam_lama" value="<?php echo $id_detail_makam_lama; ?>">
                      <input type="hidden" name="id_detail_makam_baru" value="<?php echo $row['id_detail_makam']; ?>">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['no_makam'] ?></td>
                      <td><?php echo $row['nama_blok'] ?> Rangkap</td>
                      <td><?php echo $row['nama_kelas'] ?></td>
                      <td><?php echo $row['nama_jenis_makam'] ?></td>
                      <td><?php echo $row['wilayah_tpu'] ?></td>
                      <td><?php echo $ket ?></td>
                      <td align="center"> 
                        <!-- <a href="#" class="pindah-link"> -->
                          <button type="submit" <?php echo $dis; ?> class="btn btn-primary btn-flat btn-sm" name="pilih_lahan_baru">
                            <i class="fa fa-check"></i> Pindah</button>
                            <!-- </a> -->
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
    <?php include('footer.php'); ?>
    <?php
    if(isset($_POST['pilih_lahan_baru'])){

      $tgl_pindah = date('Y-m-d');
      $id_jenazah = $_POST['id_jenazah'];
      $id_jenis_makam_lama = $_POST['id_jenis_makam_lama'];
      $id_jenis_makam_baru = $_POST['id_jenis_makam_baru'];
      $id_detail_makam_lama = $_POST['id_detail_makam_lama'];
      $id_detail_makam_baru = $_POST['id_detail_makam_baru'];

      $insert = mysql_query("INSERT INTO bongkar VALUES ('','$tgl_pindah','$id_jenazah','$id_jenis_makam_lama','$id_jenis_makam_baru','$id_detail_makam_lama','$id_detail_makam_baru','1')")or die(mysql_error());

      $update1 = mysql_query("UPDATE detail_makam SET status_makam = '0' WHERE id_detail_makam = '$id_detail_makam_lama'")or die(mysql_error());

      $update2 = mysql_query("UPDATE detail_makam SET status_makam = '1' WHERE id_detail_makam = '$id_detail_makam_baru'")or die(mysql_error());

      $update3 = mysql_query("UPDATE isi_lahan SET tgl_isi = '$tgl_pindah',
           id_detail_makam = '$id_detail_makam_baru',
           status_isi_lahan = '1'
           WHERE
           id_jenazah = '$id_jenazah'")or die(mysql_error());

      $update4 = mysql_query("UPDATE jenazah SET status = '7' WHERE id_jenazah = '$id_jenazah'")or die(mysql_error());

      if($update1 AND $update2 AND $update3 AND $update4 == TRUE){
        echo("<script> swal('Pesan', 'Berhasil Pindah Makam', 'success'); 
          setTimeout(function(){ location.replace('kelola_bongkar.php'); }, 1000);
          </script>");
      }




    }
    ?>
