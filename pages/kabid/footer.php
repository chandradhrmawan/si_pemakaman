<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.5
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="#">Dinas Pertamanan Dan Pemakaman Kota Bandung</a>.</strong> All rights
  reserved.
</footer>

  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 2.2.3 -->
 <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="../../bootstrap/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
 <!-- date-range-picker -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
 <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
 <!-- bootstrap datepicker -->
 <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
 <!-- SlimScroll -->
 <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- Select2 -->
 <script src="../../plugins/select2/select2.full.min.js"></script>
 <!-- FastClick -->
 <script src="../../plugins/fastclick/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="../../dist/js/app.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../../dist/js/demo.js"></script>
 <!-- page script -->
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
     $('.pindah-link').on('click',function(){
       var getLink = $(this).attr('href');
       swal({
         title: 'Pesan',
         text: 'Yakin Anda Ingin Pindah Makam ?',
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
    //Initialize Select2 Elements
    $("#select2").select2();
    $("#select1").select2();
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      locale:'id',
      format:'dd/mm/yyyy'
    });
    $('#datepicker1').datepicker({
      autoclose: true,
      locale:'id',
      format:'dd/mm/yyyy'
    });
    //Datemask dd/mm/yyyy
    //$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  });
</script>
<script>
 jQuery(document).ready(function($){
   $('.edit-link').on('click',function(){
    var getLink = $(this).attr('href');
    swal({
     title: ' Pesan',
     text: 'Edit Data ?',
     html: true,
     confirmButtonColor: '#2b41d4',
     showCancelButton: true,
   },function(){
     window.location.href = getLink
   });
    return false;
  });
 });
</script>
</body>
</html>
