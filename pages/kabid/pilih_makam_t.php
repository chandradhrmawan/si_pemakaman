<?php
session_start();
include('../../config.php');
?>
<?php
$id_jenazah_t=$_GET['id_jenazah_t'];
$id_jenis_makam = $_GET['id_jenis_makam'];
$modal=mysql_query("SELECT jenazah_tidak_dikenal.*,jenis_makam.nama_jenis_makam 
  FROM jenazah_tidak_dikenal
  INNER JOIN jenis_makam ON jenis_makam.id_jenis_makam = jenazah_tidak_dikenal.id_jenis_makam
  AND jenazah_tidak_dikenal.id_jenazah_t = '$id_jenazah_t'
  ")or die(mysql_error());
$r=mysql_fetch_array($modal);
?>
<div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Pembayaran Registrasi</h4>
  </div>
  <div class="modal-body">

    <div class="form-group" style="padding-bottom: 5px;">
      <label>Kode Registrasi</label>
      <input type="text" readonly name="id_jenazah_t" class="form-control" value="<?php echo $id_jenazah_t; ?>"  required>
    </div>
    <div class="form-group" style="padding-bottom: 5px;">
      <label>Jenis Makam</label>
      <input type="text" readonly name="id_jenis_makam" class="form-control" value="<?php echo $r['nama_jenis_makam']; ?>"  required>
    </div>
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <div class="table-responsive">
      <form action="kelola_registrasi_tidak_dikenal.php" method="POST">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>No Makam</th>
              <th>Blok</th>
              <th>Kelas</th>
              <th>Nama Jenis Makam</th>
              <th>Lokasi TPU</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1; 
            $sql = mysql_query("SELECT * FROM detail_makam,jenis_makam,kelas,blok,tpu 
              WHERE detail_makam.id_blok  = blok.id_blok
              AND detail_makam.id_kelas = kelas.id_kelas
              AND detail_makam.id_jenis_makam = jenis_makam.id_jenis_makam
              AND detail_makam.id_tpu = tpu.id_tpu
              AND jenis_makam.id_jenis_makam = '$id_jenis_makam'")or die(mysql_error()); 
            while($row = mysql_fetch_array($sql)){
              if($row['status_makam']==0){
                $dis = '';
                $ket = '<span class="label label-success">Kosong</span>';
              }else{
                $dis = 'disabled';
                $ket = '<span class="label label-danger">Isi</span>';
              }
              ?>
              <tr>
                <form method="POST" action="kelola_registrasi.php">
                  <input type="hidden" name="id_detail_makam" value="<?php echo $row['id_detail_makam']; ?>">
                  <input type="hidden" name="id_jenazah_t" value="<?php echo $id_jenazah_t; ?>">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['no_makam'] ?></td>
                  <td><?php echo $row['nama_blok'] ?> Rangkap</td>
                  <td><?php echo $row['nama_kelas'] ?></td>
                  <td><?php echo $row['nama_jenis_makam'] ?></td>
                  <td><?php echo $row['wilayah_tpu'] ?></td>
                  <td><?php echo $ket ?></td>
                  <td align="center"> 
                    <a href="#" class="delete-link">
                      <button type="submit" <?php echo $dis; ?> class="btn btn-primary btn-flat btn-sm" name="pilih_lahan">
                        <i class="fa fa-check"></i> Pilih</button></a>
                      </td>
                    </form>
                  </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
              
            </div>
            
          </form>
        </div>
      </div>
    </div>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
     jQuery(document).ready(function($){
       $('.delete-link').on('click',function(){
         var getLink = $(this).attr('href');
         swal({
           title: 'Pesan',
           text: 'Yakin Anda Ingin Hapus Data ?',
           html: true,
           confirmButtonColor: '#d9534f',
           showCancelButton: true,
         },function(){
           window.location.href = getLink
         });
         return false;
       });
     });
   </script>