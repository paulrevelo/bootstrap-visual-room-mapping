<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGS Inventory System » Edit Single Item</title>

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
    
    ob_start();
    include 'edit-inventory.php';
    ob_end_clean();
    $edit_item = $property_number;

    $query = "SELECT \"Quantity\", \"Unit\", \"Description\", \"Property Number\", \"Unit Price\", \"Reference Note\", \"Location\", \"Date Acquired\", \"Status\", \"Recipient\", \"Position\", \"Date Received\" FROM GradLab WHERE \"Property Number\"='$edit_item' ";
    $result = pg_query($query); 
    if (!$result) { 
      $errormessage = pg_last_error(); 
      echo "Error with query: " . $errormessage; 
      exit(); 
    }
    $arr = pg_fetch_all($result);
  ?>

  <body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <?php 
        $current_page = "";
        include("header.php"); 
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Single Item
            <small>Inventory</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li><i class="fa fa-list"></i> Property Accountability</li>
            <li><a href="edit-inventory.php"><i class="fa fa-pencil"></i> Edit Inventory</a></li>
            <li class="active">Edit Single Item</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Edit</h3>
            </div>
            <!-- form start -->
            <form action="update.php" method="post">
              <?php
                foreach($arr as $array) {
                    echo '
                    <div class="box-body">
                        <div class="form- col-sm-2">
                          <label for="quantity">Quantity</label>
                          <input type="text" class="form-control" name="quantity" placeholder="Enter quantity" value="'.$array['Quantity'].'">
                        </div>
                        <div class="form-group col-sm-2">
                          <label for="unit">Unit</label>
                          <input type="text" class="form-control" name="unit" placeholder="Enter unit" value="'.$array['Unit'].'">
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="description">Description</label>
                          <input type="text" class="form-control" name="description" placeholder="Enter description" value="'.$array['Description'].'">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="property-number">Property Number</label>
                          <input type="text" class="form-control" name="property_number" placeholder="Enter property number" value="'.$array['Property Number'].'">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="unit-price">Unit Price</label>
                          <input type="text" class="form-control" name="unit_price" placeholder="No commas" value="'.$array['Unit Price'].'">
                        </div>   
                        <div class="form-group col-sm-12">
                          <label for="total-price">Reference Note</label>
                          <input type="text" class="form-control" name="reference_note" value="'.$array['Reference Note'].'">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="location">Location</label>
                          <input type="text" class="form-control" name="location" value="'.$array['Location'].'">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="date-acquired">Date Acquired</label>
                          <input type="date" class="form-control" name="date_acquired" value="'.$array['Date Acquired'].'">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" name="status" value="'.$array['Status'].'">
                        </div>
                        <div class="form-group col-sm-12">
                          <h4><b>Received by:</b></h4>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="recipient">Recipient</label>
                          <input type="text" class="form-control" name="recipient" value="'.$array['Recipient'].'">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="position">Position</label>
                          <input type="text" class="form-control" name="position" value="'.$array['Position'].'">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="date-received">Date Received</label>
                          <input type="date" class="form-control" name="date_received" value="'.$array['Date Received'].'">
                        </div> 
                      </div>
                    ';
                }
              ?>
              <!-- /.box-body -->
              <div class="box-footer">
                <input class="btn btn-success btn-flat" type="submit" name="submit" value="Submit"> 
                <input class="btn btn-primary btn-flat" type="reset" name="reset" value="Reset"> 
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
