<?php
session_start();
include('../../config.php');
?>
<?php
$id_detail_makam=$_GET['id_detail_makam'];
$modal=mysql_query("SELECT
  detail_makam.id_detail_makam,
  detail_makam.no_makam,
  detail_makam.status_makam,
  blok.nama_blok,
  kelas.nama_kelas,
  jenis_makam.nama_jenis_makam,
  jenis_makam.harga,
  isi_lahan.id_jenazah,
  isi_lahan.tgl_isi,
  jenazah.nama_jenazah,
  tpu.wilayah_tpu
  FROM
  detail_makam
  INNER JOIN blok ON detail_makam.id_blok = blok.id_blok
  INNER JOIN kelas ON detail_makam.id_kelas = kelas.id_kelas
  INNER JOIN jenis_makam ON detail_makam.id_jenis_makam = jenis_makam.id_jenis_makam
  INNER JOIN tpu ON detail_makam.id_tpu = tpu.id_tpu
  INNER JOIN isi_lahan ON detail_makam.id_detail_makam = isi_lahan.id_detail_makam
  INNER JOIN jenazah ON isi_lahan.id_jenazah = jenazah.id_jenazah
  WHERE detail_makam.id_detail_makam = '$id_detail_makam'
  ")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Detail Isi Lahan Makam</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_lahan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="id_detail_makam" class="form-control" value="<?php echo $id_detail_makam; ?>"  required>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>No Makam</label>
      <input type="text" disabled name="no_makam" class="form-control" value="<?php echo $r['no_makam']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Nama Jenazah</label>
      <input type="text" disabled name="nama_jenazah" class="form-control" value="<?php echo $r['nama_jenazah']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Tanggal Isi Lahan</label>
      <input type="text" disabled name="nama_jenazah" class="form-control" value="<?php echo $r['tgl_isi']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Blok</label>
      <select name="id_blok" disabled class="form-control select2" required >
        <?php
        $sql = mysql_query("SELECT * FROM blok");
        while($row=mysql_fetch_array($sql)){
          if($row['id_blok']==$r['id_blok']){ ?>
          <option value="<?php echo $row['id_blok'] ?>" selected><?php echo $row['nama_blok']; ?></option>
          <?php }else{ ?>  
          <option value="<?php echo $row['id_blok'] ?>"><?php echo $row['nama_blok']; ?></option>
          <?php } ?>
          <?php } ?>
        </select>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Kelas</label>
        <select name="id_kelas" disabled class="form-control select2" required >
          <?php
          $sql = mysql_query("SELECT * FROM kelas");
          while($row=mysql_fetch_array($sql)){
            if($row['id_kelas']==$r['id_kelas']){ ?>
            <option value="<?php echo $row['id_kelas'] ?>" selected><?php echo $row['nama_kelas']; ?></option>
            <?php }else{ ?>  
            <option value="<?php echo $row['id_kelas'] ?>"><?php echo $row['nama_kelas']; ?></option>
            <?php } ?>
            <?php } ?>
          </select> 
        </div>
        <div class="form-group" style="padding-bottom: 5px;">
          <label>Jenis Makam</label>
          <select name="id_jenis_makam" disabled class="form-control select2" required >
            <?php
            $sql = mysql_query("SELECT * FROM jenis_makam");
            while($row=mysql_fetch_array($sql)){
              if($row['id_jenis_makam']==$r['id_jenis_makam']){ ?>
              <option value="<?php echo $row['id_jenis_makam'] ?>" selected><?php echo $row['nama_jenis_makam']; ?></option>
              <?php }else{ ?>  
              <option value="<?php echo $row['id_jenis_makam'] ?>"><?php echo $row['nama_jenis_makam']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
          </div>
          <div class="form-group" style="padding-bottom: 5px;">
            <label>Wilayah TPU</label>
            <select name="id_tpu" disabled class="form-control select2" required >
              <?php
              $sql = mysql_query("SELECT * FROM tpu");
              while($row=mysql_fetch_array($sql)){
                if($row['id_tpu']==$r['id_tpu']){ ?>
                <option value="<?php echo $row['id_tpu'] ?>" selected><?php echo $row['wilayah_tpu']; ?></option>
                <?php }else{ ?>  
                <option value="<?php echo $row['id_tpu'] ?>"><?php echo $row['wilayah_tpu']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
            <div class="form-group" style="padding-bottom: 5px;">
              <label>Status</label>
              <select name="status_makam" disabled class="form-control select2" required >
                <option value="0"<?php if($r['status_makam']=='0'){ echo "selected"; }else{ echo ""; } ?> >Kosong</option>
                <option value="1"<?php if($r['status_makam']=='1'){ echo "selected"; }else{ echo ""; } ?> >Isi</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger btn-flat"  data-dismiss="modal" aria-hidden="true">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
