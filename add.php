<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGS Inventory System</title>
    
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
            Add Inventory
            <small>Inventory</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li>Property Accountability</a></li>
            <li><a href="add-inventory.php">Add Inventory</a></li>
            <li class="active">Success</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php 
          $db = pg_connect('host=localhost port=5432 dbname=postgres user=postgres password=paulrevelo'); 

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

          $query = "INSERT INTO GradLab VALUES('" . $quantity . "', '" . $unit . "', '" . $description . "', '" . $property_number . "', '" . $unit_price . "', null, '" . $reference_note . "', '" . $location . "', '" . $date_acquired . "', '" . $status . "', '" . $recipient . "', '" . $position . "', '" . $date_received . "')";
          
          $result = pg_query($query); 
          if (!$result) { 
              $errormessage = pg_last_error(); 
              echo "Error with query: " . $errormessage; 
              exit(); 
          } 
          else {
              printf("You have successfully added an inventory item!");
          }
          pg_close(); 
          ?>
          <br>
          <ul>
            <li><a href="overview.php">Go to Inventory List</a> </li>
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