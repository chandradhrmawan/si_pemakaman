<?php
session_start();
include('../../config.php');
?>
<?php
$id_tpu=$_GET['id_tpu'];
$modal=mysql_query("SELECT * FROM tpu WHERE id_tpu = '$id_tpu'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit  Jenis Makam</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_tpu.php" name="modal_popup" enctype="multipart/form-data" method="POST">
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Kode Makam</label>
      <input type="text" readonly name="id_tpu" class="form-control" value="<?php echo $id_tpu; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Nama Wilayah TPU</label>
      <input type="text" name="wilayah_tpu" class="form-control" placeholder="Wilayah TPU" value="<?php echo $r['wilayah_tpu']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Alamat TPU</label>
      <textarea name="alamat_tpu" class="form-control" placeholder="Alamat TPU" cols="5" rows="5" required><?php echo $r['alamat_tpu']; ?> </textarea>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Tahun Berdiri</label>
      <input type="text" name="tahun_berdiri" class="form-control" placeholder="Tahun Berdiri"  required value="<?php echo $r['tahun_berdiri'] ?>">
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Luas Lahan</label>
      <input type="text" name="luas_lahan" class="form-control" placeholder="Luas Lahan" value="<?php echo $r['luas_lahan'] ?>"  required>
    </div>
    <div class="modal-footer">
      <button class="btn btn-success btn-flat" type="submit" name="edit_tpu">
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
