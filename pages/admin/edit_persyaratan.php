<?php
session_start();
include('../../config.php');
?>
<?php
$id_persyaratan=$_GET['id_persyaratan'];
$modal=mysql_query("SELECT * FROM persyaratan WHERE id_persyaratan = '$id_persyaratan'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit Persyaratan</h4>
  </div>
  <div class="modal-body">
   <form action="kelola_persyaratan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Kode Persyaratan</label>
                  <input type="text" readonly name="id_persyaratan" class="form-control" value="<?php echo $id_persyaratan; ?>"  required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Persyaratan</label>
                  <input type="text" name="nama_persyaratan" class="form-control" placeholder="Persyaratan" value="<?php echo $r['nama_persyaratan']; ?>" required>
                </div>
                <div class="form-group" style="padding-bottom: 5px;">
                  <label>Jumlah</label>
                 <input type="number" name="jml_persyaratan" class="form-control" value="<?php echo $r['jml_persyaratan']; ?>" required> 
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
                <div class="modal-footer">
                  <button class="btn btn-success btn-flat" type="submit" name="edit_persyaratan">
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
