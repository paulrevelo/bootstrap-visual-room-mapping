<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGS Inventory System » Reports</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  </head>

  <!-- <?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=paulrevelo");

    if(!$dbconn) {
      echo "An error occured at connection.\n";
      exit;
    }

    $result = pg_query($dbconn, "select * from gradlab");
    if (!$result) {
      echo "An error occured at sql.\n";
      exit;
    }

    $arr = pg_fetch_all($result);
    $rows = pg_num_rows($result);
  ?> -->
  


  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php 
        $current_page = "reports";
        include("header.php"); 
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Table Reports
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-table"></i> Table Reports</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-5">

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Date</h3>
                </div>
                <div class="box-body">
                  <a class="btn btn-app" href="report-date-acquired.php">
                    <i class="fa fa-calendar"></i> Date Acquired
                  </a>
                  <a class="btn btn-app" href="report-date-received.php">
                    <i class="fa fa-calendar"></i> Date Received
                  </a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Recipient</h3>
                </div>
                <div class="box-body">
                  <a class="btn btn-app" href="report-recipient.php">
                    <i class="fa fa-user"></i> Recipient
                  </a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

            <div class="col-md-5">

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Location</h3>
                </div>
                <div class="box-body">
                  <a class="btn btn-app" href="report-location.php">
                    <i class="fa fa-map"></i> Room Assignment
                  </a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Status</h3>
                </div>
                <div class="box-body">
                  <a class="btn btn-app" href="report-item-status.php">
                    <i class="fa fa-desktop"></i> Item Status
                  </a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php 
        include("footer.php"); 
      ?>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/chartjs/Chart.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/app.min.js"></script>
  </body>
</html>
