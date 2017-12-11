<?php
session_start();
include('../../config.php');
?>
<?php
$id_jenis_makam=$_GET['id_jenis_makam'];
$modal=mysql_query("SELECT * FROM jenis_makam WHERE id_jenis_makam = '$id_jenis_makam'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit  Jenis Makam</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_jenis_makam.php" name="modal_popup" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="id_jenis_makam" value="<?php echo $id_jenis_makam; ?>">
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Kode Jenis Makam</label>
      <input type="text" readonly name="id_jenis_makam" class="form-control" value="<?php echo $r['id_jenis_makam']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Nama Jenis Makam</label>
      <input type="text" name="nama_jenis_makam" class="form-control" value="<?php echo $r['nama_jenis_makam']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Harga</label>
      <input type="text" name="harga" class="form-control" value="<?php echo $r['harga']; ?>" required >
    </div>
    <div class="modal-footer">
      <button class="btn btn-success btn-flat" type="submit" name="edit_jenis_makam">
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
