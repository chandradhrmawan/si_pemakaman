<?php
session_start();
include('../../config.php');
?>
<?php
$id_detail_makam=$_GET['id_detail_makam'];
$modal=mysql_query("SELECT * FROM detail_makam WHERE id_detail_makam = '$id_detail_makam'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit Lahan Makam</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_lahan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="id_detail_makam" class="form-control" value="<?php echo $id_detail_makam; ?>"  required>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>No Makam</label>
      <input type="text" name="no_makam" class="form-control" value="<?php echo $r['no_makam']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Blok</label>
      <select name="id_blok" class="form-control select2" required >
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
        <select name="id_kelas" class="form-control select2" required >
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
          <select name="id_jenis_makam" class="form-control select2" required >
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
            <select name="id_tpu" class="form-control select2" required >
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
              <select name="status_makam" class="form-control select2" required >
                <option value="0"<?php if($r['status_makam']=='0'){ echo "selected"; }else{ echo ""; } ?> >Kosong</option>
                <option value="1"<?php if($r['status_makam']=='1'){ echo "selected"; }else{ echo ""; } ?> >Isi</option>
              </select>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success btn-flat" type="submit" name="edit_lahan">
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
