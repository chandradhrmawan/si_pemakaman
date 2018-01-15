<?php
session_start();
include('../../config.php');
?>
<?php
$id_waktu=$_GET['id_waktu'];
$modal=mysql_query("SELECT * FROM waktu WHERE id_waktu = '$id_waktu'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit waktu</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_waktu.php" name="modal_popup" enctype="multipart/form-data" method="POST">
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Id waktu</label>
      <input type="text" readonly name="id_waktu" class="form-control" value="<?php echo $r['id_waktu']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Nama waktu</label>
      <input type="text" name="nama_waktu" class="form-control" placeholder="waktu" value="<?php echo $r['nama_waktu']; ?>" required>
    </div>
    <div class="modal-footer">
      <button class="btn btn-success btn-flat" type="submit" name="edit_waktu">
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
