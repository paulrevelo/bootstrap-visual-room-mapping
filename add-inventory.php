<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGS Inventory System » Add Inventory</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  </head>

  <?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=paulrevelo");

    if(!$dbconn) {
      echo "An error occured at connection.\n";
      exit;
    }
  ?>

  <body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <?php 
        $current_page = "add-inventory";
        include("header.php"); 
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Inventory
            <small>Inventory</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li>Property Accountability</a></li>
            <li class="active">Add Inventory</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-primary">
            <!-- form start -->
            <form action="add.php" method="post">
              <div class="box-body">
                <div class="form-group col-sm-12">
                  <h4>Item information:</h4>
                </div>
                <div class="form-group col-sm-2">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" required>
                </div>
                <div class="form-group col-sm-2">
                  <label for="unit">Unit</label>
                  <input type="text" class="form-control" name="unit" placeholder="Enter unit" required>
                </div>
                <div class="form-group col-sm-8">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" placeholder="Enter description" required>
                </div>
                <div class="form-group col-sm-4">
                  <label for="property-number">Property Number</label>
                  <input type="text" class="form-control" name="property_number" placeholder="Enter property number" required>
                </div>
                <div class="form-group col-sm-4">
                  <label for="unit-price">Unit Price</label>
                  <input type="number" class="form-control" name="unit_price" placeholder="No commas" required>
                </div>
                <div class="form-group col-sm-12">
                  <label for="reference-note">Reference Note</label>
                  <input type="text" class="form-control" name="reference_note">
                </div>
                <div class="form-group col-sm-4">
                  <label for="location">Location</label>
                  <input type="text" class="form-control" name="location" placeholder="Enter location" required>
                </div>
                <div class="form-group col-sm-4">
                  <label for="date-acquired">Date Acquired</label>
                  <input type="date" class="form-control" name="date_acquired" required>
                </div>
                <div class="form-group col-sm-4">
                  <label for="status">Status</label>
                  <input type="text" class="form-control" name="status" placeholder="Enter status" required>
                </div>
                <div class="form-group col-sm-12">
                  <h4>Received by:</h4>
                </div>
                <div class="form-group col-sm-4">
                  <label for="recipient">Recipient</label>
                  <input type="text" class="form-control" name="recipient" placeholder="Enter recipient" required>
                </div>
                <div class="form-group col-sm-4">
                  <label for="position">Position</label>
                  <input type="text" class="form-control" name="position" placeholder="Enter position of recipient" required>
                </div>
                <div class="form-group col-sm-4">
                  <label for="date-received">Date Received</label>
                  <input type="date" class="form-control" name="date_received" required>
                </div>                                                            
              </div><!-- /.box-body -->
              <div class="box-footer">
                <input class="btn btn-success btn-flat" type="submit" name="submit" value="Submit"> 
                <input class="btn btn-primary btn-flat" type="reset" name="reset" value="Clear"> 
              </div>
            </form>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php 
        include("footer.php"); 
      ?>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <script type="text/javascript" language="javascript" src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" language="javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/fastclick/fastclick.min.js"></script>
    <script type="text/javascript" language="javascript" src="dist/js/app.min.js"></script>
  </body>
</html>
