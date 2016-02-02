<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGS Inventory System » Inventory Overview</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  </head>

  <?php
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
  ?>

  <body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <?php 
        $current_page = "overview";
        include("header.php"); 
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Overview
            <small>Inventory</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li>Property Accountability</a></li>
            <li class="active">Overview</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Inventory</h3>
                  <div class="box-tools pull-right">
                    <a href="edit-inventory.php" class="btn btn-primary btn-flat"><i class="fa fa-pencil fa-fw"></i>Edit</a>
                    <a href="add-inventory.php" class="btn btn-primary btn-flat"><i class="fa fa-plus fa-fw"></i>Add</a>
                    <a href="remove-inventory.php" class="btn btn-primary btn-flat"><i class="fa fa-times fa-fw"></i>Remove</a>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example" class="table table-bordered table-hover table-condensed">
                    <thead>
                      <tr>
                        <th>Property Number</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Reference Note</th>
                        <th>Location</th>
                        <th>Date Acquired</th>
                        <th>Status</th>
                        <th>Recipient</th>
                        <th>Position</th>
                        <th>Date Received</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($arr as $array) {
                          echo '<tr>
                                <td style="font-size:13px;">'. $array['Property Number'].'</td>
                                <td style="font-size:13px;">'. $array['Quantity'].'</td>
                                <td style="font-size:13px;">'. $array['Unit'].'</td>
                                <td style="font-size:13px;">'. $array['Description'].'</td>
                                <td style="font-size:13px;">'. $array['Unit Price'].'</td>
                                <td style="font-size:13px;">'. $array['Total'].'</td>
                                <td style="font-size:13px;">'. $array['Reference Note'].'</td>
                                <td style="font-size:13px;">'. $array['Location'].'</td>
                                <td style="font-size:13px;">'. $array['Date Acquired'].'</td>
                                <td style="font-size:13px;">'. $array['Status'].'</td>
                                <td style="font-size:13px;">'. $array['Recipient'].'</td>
                                <td style="font-size:13px;">'. $array['Position'].'</td>
                                <td style="font-size:13px;">'. $array['Date Received'].'</td>
                              </tr>';
                        }
                      ?>       
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

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

    <!-- DATA TABLE FILTER -->
    <script type="text/javascript" language="javascript" src="dist/js/tablefilter.js"></script>

    <!-- DATA TABLE -->
    <script type="text/javascript" language="javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/dataTables.buttons.min.js"></script>

    <!-- DATA TABLE - BUTTONS -->
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/buttons.bootstrap.min.js"></script>
    
    <!-- DATA TABLE - FUNCTIONS -->
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/vfs_fonts.js"></script>

    <script>
      $(document).ready(function() {
          var table = $('#example').DataTable( {
              buttons: true,
              paging: true,
              lengthChange: true,
              lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
              searching: false,
              ordering: true,
              info: true,
              autoWidth: false
          });
       
          table.buttons().container()
              .appendTo( '#example_wrapper .col-sm-6:eq(1)' );
      });  
    </script>

  </body>
</html>
