<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGS Inventory System » Update Success</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  </head>

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
            Update Inventory
            <small>Inventory</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li><i class="fa fa-list"></i> Property Accountability</li>
            <li><a href="edit-inventory.php"><i class="fa fa-pencil"></i> Edit Inventory</a></li>
            <li><a href="edit-single.php"><i class="fa fa-pencil"></i> Edit Single Item</a></li>
            <li class="active"> Update Success</li>
          </ol>
        </section>

        <!-- Maincontent -->
        <section class="content">
          <?php 
          $db = pg_connect('host=localhost port=5432 dbname=postgres user=postgres password=paulrevelo'); 
          
          ob_start();
          include 'edit-inventory.php';
          ob_end_clean();
          $edit_item = $property_number;

          $quantity = pg_escape_string($_POST['quantity']); 
          $unit = pg_escape_string($_POST['unit']); 
          $description = pg_escape_string($_POST['description']); 
          $property_number = pg_escape_string($_POST['property_number']); 
          $unit_price = pg_escape_string($_POST['unit_price']); 
          $reference_note = pg_escape_string($_POST['reference_note']);
          $location = pg_escape_string($_POST['location']);
          $date_acquired = pg_escape_string($_POST['date_acquired']);
          $status = pg_escape_string($_POST['status']);
          $recipient = pg_escape_string($_POST['recipient']);
          $position = pg_escape_string($_POST['position']);
          $date_received = pg_escape_string($_POST['date_received']);


          $query = "UPDATE Gradlab SET \"Quantity\"=".$quantity.", \"Unit\"='".$unit."', \"Description\"='".$description."', \"Property Number\"='".$property_number."', \"Unit Price\"=".$unit_price.", \"Reference Note\"='".$reference_note."', \"Location\"='".$location."', \"Date Acquired\"='".$date_acquired."', \"Status\"='".$status."', \"Recipient\"='".$recipient."', \"Position\"='".$position."', \"Date Received\"='".$date_received."' where \"Property Number\"='".$edit_item."'
";
          $result = pg_query($query); 
          if (!$result) {
              $errormessage = pg_last_error(); 
              echo "Error with query: " . $errormessage; 
              exit(); 
          } 
          else {
              printf("You have successfully updated an inventory item!");
          }
          $arr = pg_fetch_all($result);
          pg_close(); 
          ?>
          <br>
          <ul>
            <li><a href="reports.php">Go to Table Reports</a> </li>
            <li><a href="add-inventory.php">Add inventory items</a> </li>
            <li><a href="edit-inventory.php">Edit inventory items</a> </li>
            <li><a href="remove-inventory.php">Remove more inventory items</a> </li>
          </ul>   
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