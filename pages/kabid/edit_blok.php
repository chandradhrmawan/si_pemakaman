<?php
session_start();
include('../../config.php');
?>
<?php
$id_blok=$_GET['id_blok'];
$modal=mysql_query("SELECT * FROM blok WHERE id_blok = '$id_blok'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit Blok</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_blok.php" name="modal_popup" enctype="multipart/form-data" method="POST">
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Id Blok</label>
      <input type="text" readonly name="id_blok" class="form-control" value="<?php echo $r['id_blok']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Nama Blok</label>
      <input type="text" name="nama_blok" class="form-control" placeholder="blok" value="<?php echo $r['nama_blok']; ?>" required>
    </div>
    <div class="modal-footer">
      <button class="btn btn-success btn-flat" type="submit" name="edit_blok">
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
