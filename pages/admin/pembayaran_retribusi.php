<?php
session_start();
include('../../config.php');
?>
<?php
$id_jenazah=$_GET['id_jenazah'];
$pembayaran_ke = $_GET['pembayaran_ke'];

$year = date('Y');

if($pembayaran_ke == 1){
  $text = "Pembayaran Pertama Untuk Bulan Januari - Maret Tahun : ".$year."";
}else if($pembayaran_ke == 2){
  $text = "Pembayaran Kedua Untuk Bulan April - Juni Tahun : ".$year."";
}else if($pembayaran_ke == 3){
  $text = "Pembayaran Ketiga Untuk Bulan Juli - September Tahun : ".$year."";
}else if($pembayaran_ke == 4){
  $text = "Pembayaran Keempat Untuk Bulan Oktober - Desember Tahun : ".$year."";
}else if($pembayaran_ke == 5){
  $text = "Pelunasan Pembayaran Untuk Tahun : ".$year."";
}

$modal=mysql_query("SELECT * FROM jenazah,jenis_makam WHERE jenazah.id_jenazah = '$id_jenazah'
  AND jenazah.id_jenis_makam = jenis_makam.id_jenis_makam")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Pembayaran Retibusi</h4>
  </div>
  <div class="modal-body">
    <?php if($pembayaran_ke == 5){ ?>
    <?php
    $cek_bayar = mysql_query("SELECT * FROM retribusi WHERE id_jenazah = '$id_jenazah' 
      AND YEAR(tgl_pembayaran) = '$year'");
    $jml_bayar = mysql_query("SELECT SUM(JUMLAH_BAYAR) as total_bayar 
      FROM retribusi 
      WHERE id_jenazah = '$id_jenazah'
      AND YEAR(tgl_pembayaran) = '$year'");
    $row_cek_bayar = mysql_num_rows($cek_bayar);
    $jml_bayar = mysql_fetch_array($jml_bayar);
    $total_pembayaran = 4;
    $total_pembayaran = $total_pembayaran - $row_cek_bayar


    ?>
    <form action="kelola_pembayaran.php" name="modal_popup" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="id_jenazah" value="<?php echo $id_jenazah; ?>">
      <input type="hidden" name="pembayaran_ke" value="<?php echo $pembayaran_ke; ?>">
      <input type="hidden" name="tgl_pembayaran" value="<?php echo date('Y-m-d'); ?>">
      <input type="hidden" name="tahun" value="<?php echo $year; ?>">
      <input type="hidden" name="status_bayar" value="<?php echo $pembayaran_ke; ?>">
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Kode Registrasi</label>
        <input type="text" readonly name="id_jenazah" class="form-control" value="<?php echo $id_jenazah; ?>"  required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Pembayaran Ke</label>
        <input type="text" readonly name="keterangan" class="form-control" value="<?php echo $text; ?>"  required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Nama Jenis Makam</label>
        <input type="text" name="nama_jenis_makam" class="form-control" placeholder="Persyaratan" value="<?php echo $r['nama_jenis_makam']; ?>" disabled required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Harga Per Periode</label>
        <input type="number" readonly id="harga_periode" name="harga_periode" class="form-control" value="<?php echo $r['harga']; ?>" required> 
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Sisa Pembayaran</label>
        <input type="number" readonly id="harga_total" name="harga_total" class="form-control" value="<?php echo $r['harga'] * $total_pembayaran; ?>" required> 
      </div>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>` -->
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Jumlah Bayar</label>
        <input type="text" id="jumlah_bayar" name="jumlah_bayar" class="form-control" value="" required> 
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Kembali</label>
        <input type="number" readonly id="kembali" name="kembali" class="form-control" value="" required> 
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-flat" type="submit" name="pembayaran_lunas">
          Confirm
        </button>
        <button type="reset" class="btn btn-danger btn-flat"  data-dismiss="modal" aria-hidden="true">
          Cancel
        </button>
      </div>
    </form>
    <?php }else{ ?>
    <form action="kelola_pembayaran.php" name="modal_popup" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="id_jenazah" value="<?php echo $id_jenazah; ?>">
      <input type="hidden" name="pembayaran_ke" value="<?php echo $pembayaran_ke; ?>">
      <input type="hidden" name="tgl_pembayaran" value="<?php echo date('Y-m-d'); ?>">
      <input type="hidden" name="tahun" value="<?php echo $year; ?>">
      <input type="hidden" name="status_bayar" value="<?php echo $pembayaran_ke; ?>">
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Kode Registrasi</label>
        <input type="text" readonly name="id_jenazah" class="form-control" value="<?php echo $id_jenazah; ?>"  required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Pembayaran Ke</label>
        <input type="text" readonly name="keterangan" class="form-control" value="<?php echo $text; ?>"  required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Nama Jenis Makam</label>
        <input type="text" name="nama_jenis_makam" class="form-control" placeholder="Persyaratan" value="<?php echo $r['nama_jenis_makam']; ?>" disabled required>
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Harga</label>
        <input type="number" readonly id="harga" name="harga" class="form-control" value="<?php echo $r['harga']; ?>" required> 
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Jumlah Bayar</label>
        <input type="text" id="jumlah_bayar1" name="jumlah_bayar" class="form-control" value="" required> 
      </div>
      <div class="form-group" style="padding-bottom: 5px;">
        <label>Kembali</label>
        <input type="number" readonly id="kembali" name="kembali" class="form-control" value="" required> 
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-flat" type="submit" name="pembayaran_cicilan">
          Confirm
        </button>
        <button type="reset" class="btn btn-danger btn-flat"  data-dismiss="modal" aria-hidden="true">
          Cancel
        </button>
      </div>
      <?php } ?>
    </form>
  </div>
</div>
</div>
<!-- <script type="text/javascript" src="jquery.js"></script> -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#jumlah_bayar1').keyup(function(){
      var jumlah_bayar=parseInt($('#jumlah_bayar1').val());
      var harga=parseInt($('#harga').val());
      var total=jumlah_bayar-harga;
      $('#kembali').val(total);
    });

    $('#jumlah_bayar').keyup(function(){
      var jumlah_bayar=parseInt($('#jumlah_bayar').val());
      var harga_total=parseInt($('#harga_total').val());
      var total=jumlah_bayar-harga_total;
      $('#kembali').val(total);
    });
  });
</script>