<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Schedular</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="dist/css/styles.css">

</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php 
        $current_page = "home";
        include("header.php"); 
  ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div id="map-canvas"></div>
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>

<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/scripts.js"></script>

</body>
</html>
