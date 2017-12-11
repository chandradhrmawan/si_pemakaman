<?php session_start(); include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simkes | Sistem Informasi Kesehatan (v0.1)</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
     <!-- Sweet Alert -->
     <script src="dist/sweetalert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>SIPM (v0.1)</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"><img src=""><b>Sistem Informasi Pengelolaan Makam (v0.1)</b></p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4 pull-right">
            <button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
      if(isset($_POST['submit'])){
       $username = $_POST['username'];
       $password = $_POST['password'];

       $sql = mysql_query("SELECT * FROM admin WHERE username like '$username'")or die(mysql_error());
       $hitung = mysql_num_rows($sql);
       if($hitung == 0){
         echo "<script> swal('Pesan','User Belum Terdaftar','warning'); </script>";
       }
       $cek = mysql_fetch_array($sql)or die(mysql_error());
       $pas = $cek['password'];
       $id_admin = $cek['id_admin'];


       if($password != $pas) {
         echo "<script> swal('Pesan','Password Salah','warning'); </script>";
       }else{
         $level = $cek['level'];
         if($level == '1'){
           $_SESSION['admin'] = $id_admin;
           echo "<script> swal('Pesan', 'Login Berhasil', 'success'); </script>";
           echo "<script> location.replace('pages/admin/index.php') </script>";
         }else if($level == '2'){
           $_SESSION['admin'] = $id_admin;
           echo "<script> swal('Pesan', 'Login Berhasil', 'success'); </script>";
           echo "<script> location.replace('pages/admin/index.php') </script>";
         }
       }
     }
     ?>
   </div>
   <!-- /.login-box-body -->
 </div>
 <!-- /.login-box -->

 <!-- jQuery 2.2.3 -->
 <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="../../bootstrap/js/bootstrap.min.js"></script>
 <!-- iCheck -->
 <script src="../../plugins/iCheck/icheck.min.js"></script>
 <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
