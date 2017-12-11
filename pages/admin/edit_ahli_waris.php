<?php
session_start();
include('../../config.php');
?>
<?php
$id_ahli_waris=$_GET['id_ahli_waris'];
$modal=mysql_query("SELECT * FROM ahli_waris WHERE id_ahli_waris = '$id_ahli_waris'")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit Ahli Waris</h4>
  </div>
  <div class="modal-body">
    <form action="kelola_ahli_waris.php" name="modal_popup" enctype="multipart/form-data" method="POST">
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Nomor Identitas</label>
        <input type="text" name="id_ahli_waris" class="form-control" value="<?php echo $r['id_ahli_waris']; ?>" readonly required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Nama Pewaris</label>
        <input type="text" name="nama_pewaris" class="form-control" placeholder="Nama Pewaris" value="<?php echo $r['nama_pewaris'] ?>"  required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>No Hp Pewaris</label>
        <input type="number" name="no_hp_pewaris" class="form-control" value="<?php echo $r['no_hp_pewaris'] ?>" required> 
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Umur Pewaris</label>
        <input type="number" name="umur_pewaris" class="form-control" value="<?php echo $r['umur_pewaris'] ?>" required> 
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Perkerjaan Pewaris</label>
        <input type="text" name="perkerjaan_pewaris" class="form-control" value="<?php echo $r['perkerjaan_pewaris'] ?>" required> 
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label for="Modal Name">Provinsi</label>
        <select name="id_provinsi" id="propinsi"  required class="form-control select2">
         <option>Pilih Provinsi</option>
         <?php
         $propinsi=mysql_query("SELECT DISTINCT  * FROM provinsi ORDER BY nama_provinsi");
         while($p=mysql_fetch_array($propinsi)){
          if($p['id_provinsi']==$r['id_provinsi']){
          ?>
         <option value="<?php echo $p['id_provinsi'] ?>" selected><?php echo $p['nama_provinsi'] ?></option>;
         <?php }else{ ?>
          <option value="<?php echo $p['id_provinsi'] ?>"><?php echo $p['nama_provinsi'] ?></option>;
         <?php } ?>
         <?php } ?>

       </select>
     </div>
     <div class="form-group" style="padding-bottom: 5px;">
      <label for="Modal Name">Kota</label>
      <select name="id_kota" id="kota" required class="form-control select2">
        <option value="<?php echo $r['id_kota'] ?>">Pilih Kota/Kabupaten</option>
      </select>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label for="Modal Name">Kecamatan</label>
      <select name="id_kecamatan" id="kec" required class="form-control select2">
        <option value="<?php echo $r['id_kecamatan'] ?>">Pilih Kecamatan</option>
      </select>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label for="Modal Name">Alamat Pewaris</label>
      <textarea name="alamat_pewaris" required class="form-control" cols="5" rows="5" placeholder="Alamat Lengkap Pewaris"> <?php echo $r['alamat_pewaris']; ?> </textarea>
    </div>
    <div class="modal-footer">
      <button class="btn btn-success btn-flat" type="submit" name="edit_ahli_waris">
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
