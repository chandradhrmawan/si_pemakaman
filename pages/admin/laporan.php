<?php include('header.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('nav.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan
      <small>Laporan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
      <li><a href="#">Laporan</a></li>
    </ol>
  </section>
  <script src="jquery.min.js"></script>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Laporan</h3>
            <div class="box-header pull-right">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"> Tambah Blok</span></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- LAPORAN PENDAFTARAN -->
            <form class="form-horizontal" action="laporan_pendaftaran.php" method="post" enctype="multipart/form-data">
              <div class="row">
               <div class="col-md-6">
                <div class="box-body">
                  <div class="panel panel-default">
                   <div class="panel-heading">Laporan Pendaftaran</div>
                   <div class="box-body">
                    <div class="form-group">
                      <div class="col-md-3">
                        <label for="dari">Dari</label>
                        <input type="date" name="dari" class="form-control"/>
                      </div>
                      <div class="col-md-3">
                        <label for="sampai">Sampai</label>
                        <input type="date" name="sampai" class="form-control"/>
                      </div>
                      <br>
                      <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-flat" ><i class="fa fa-search"> Submit </i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- LAPORAN PEMESANAN -->
          <form class="form-horizontal" action="laporan_pembayaran.php" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
              <div class="box-body">
                <div class="panel panel-default">
                 <div class="panel-heading">Laporan Pembayaran Retribusi</div>
                 <div class="box-body">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label for="dari">Dari</label>
                      <input type="date" name="dari" class="form-control"/>
                    </div>
                    <div class="col-md-3">
                      <label for="sampai">Sampai</label>
                      <input type="date" name="sampai" class="form-control"/>
                    </div>
                    <br>
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-primary btn-flat" ><i class="fa fa-search"> Submit </i></button>        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <form class="form-horizontal" action="laporan_bongkar.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="box-body">
              <div class="panel panel-default">
               <div class="panel-heading">Laporan Pindah Bongkar</div>
               <div class="box-body">
                <div class="form-group">
                  <div class="col-md-3">
                    <label for="dari">Dari</label>
                    <input type="date" name="dari" class="form-control"/>
                  </div>
                  <div class="col-md-3">
                    <label for="sampai">Sampai</label>
                    <input type="date" name="sampai" class="form-control"/>
                  </div>
                  <br>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-flat" ><i class="fa fa-search"> Submit </i></button>        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('footer.php'); ?>

