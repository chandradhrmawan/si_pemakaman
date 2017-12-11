<?php
session_start();
include('../../config.php');
?>
<?php
$id_admin=$_GET['id_admin'];
$modal=mysql_query("SELECT * FROM admin WHERE id_admin = '$id_admin'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit  Admin</h4>
        </div>
        <div class="modal-body">
        	<form action="kelola_admin.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Nama Admin</label>
                  <input type="text" name="nama_admin" class="form-control" value="<?php echo $r['nama_admin']; ?>"  required>
              </div>
              <div class="form-group" style="padding-bottom: 5px;">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $r['username']; ?>" required >
              </div>
              <div class="form-group" style="padding-bottom: 5px;">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?php echo $r['password']; ?>" required >
              </div>
              <div class="form-group" style="padding-bottom: 5px;">
                  <label>Level</label>
                  <select name="level" class="form-control select2" required >
                    <option value="1" <?php if($r['level']==1){ echo "selected"; } ?>>Administrator</option>
                    <option value="2" <?php if($r['level']==2){ echo "selected"; } ?>>Staff</option>
                  </select>
                </div>
              <div class="modal-footer">
                  <button class="btn btn-success btn-flat" type="submit" name="edit_admin">
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
