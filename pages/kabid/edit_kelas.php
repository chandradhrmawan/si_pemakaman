<?php
session_start();
include('../../config.php');
?>
<?php
$id_kelas=$_GET['id_kelas'];
$modal=mysql_query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit kelas</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_kelas.php" name="modal_popup" enctype="multipart/form-data" method="POST">
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Id kelas</label>
      <input type="text" readonly name="id_kelas" class="form-control" value="<?php echo $r['id_kelas']; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Nama kelas</label>
      <input type="text" name="nama_kelas" class="form-control" placeholder="kelas" value="<?php echo $r['nama_kelas']; ?>" required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Harga Kelas</label>
      <input type="number" name="harga" class="form-control" placeholder="kelas" value="<?php echo $r['harga']; ?>" required>
    </div>
    <div class="modal-footer">
      <button class="btn btn-success btn-flat" type="submit" name="edit_kelas">
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
