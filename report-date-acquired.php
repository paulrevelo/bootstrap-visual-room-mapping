<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SGS Inventory System » Table Reports » Date Acquired</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/select.dataTables.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">

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
        $current_page = "report-date-acquired";
        include("header.php"); 
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Table Reports
            <small>By Date Acquired</small>
          </h1>

          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="reports.php"><i class="fa fa-table"></i> Table Reports</a></li>
            <li class="active"><i class="fa fa-calendar"></i> By Date Acquired</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">

              <!-- DONUT CHART -->
              <!--<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Donut Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div>
              </div> -->

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Date Acquired</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-primary" id="daterange-btn">
                        <i class="fa fa-calendar"></i> Filter Date
                        <i class="fa fa-caret-down"></i>
                      </button>
                      <button class="btn btn-primary" id="default-btn">
                        Reset Filter
                      </button>
                    </div>

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example" class="table table-hover table-condensed">
                    <thead>
                      <tr>
                        <th>Date Acquired</th>
                        <th>Property Number</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Description</th>      
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Reference Note</th>             
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($arr as $array) {
                          echo '<tr class="main">
                                <td style="font-size:13px;">'. $array['Date Acquired'].'</td>
                                <td style="font-size:13px;">'. $array['Property Number'].'</td>
                                <td style="font-size:13px;">'. $array['Quantity'].'</td>
                                <td style="font-size:13px;">'. $array['Unit'].'</td>
                                <td style="font-size:13px;">'. $array['Description'].'</td>  
                                <td style="font-size:13px;">'. $array['Unit Price'].'</td>
                                <td style="font-size:13px;">'. $array['Total'].'</td>
                                <td style="font-size:13px;">'. $array['Reference Note'].'</td>
                              </tr>';
                        }
                      ?>       
                    </tbody>
                  </table>
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
    <script type="text/javascript" language="javascript" src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" language="javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/fastclick/fastclick.min.js"></script>
    <script type="text/javascript" language="javascript" src="dist/js/app.min.js"></script>
    <script type="text/javascript" language="javascript" src="dist/js/moment.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/daterangepicker/daterangepicker.js"></script>

    <!-- DATA TABLE FILTER -->
    <script type="text/javascript" language="javascript" src="dist/js/tablefilter.js"></script>

    <!-- DATA TABLE -->
    <script type="text/javascript" language="javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="plugins/datatables/more/dataTables.select.min.js"></script>

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
              select: true,
              paging: false,
              lengthChange: false,
              lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
              searching: false,
              ordering: true,
              info: true,
              autoWidth: false,
              dom: 'Bfrtip',
              buttons: [
            {
                extend: 'copy',
                text: 'Copy',
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: 'print',
                text: 'Print',
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            }
        ],
        select: true
          } );
       
          table.buttons().container()
              .appendTo( '#example_wrapper .col-sm-6:eq(1)' );
      } );  
    </script>

    <script>
      $(function () {

        var startdate;
        var enddate;        
        var columnTh = $("#example th:contains('Date Acquired')");
        var columnIndex = columnTh.index()+1;          
        
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment(),
              format: 'DD/MM/YYYY'
            },
            function (start, end) {
              startdate = start.format("YYYY-MM-DD");
              enddate = end.format("YYYY-MM-DD");
            }
        );
          
        $('#daterange-btn').on('apply.daterangepicker', function(e) {
            $('#example tr td:nth-child('+columnIndex+')').each(function() {
                if(startdate.replace(/-/g, "") <= $(this).text().replace(/-/g, "") && enddate.replace(/-/g, "") >= $(this).text().replace(/-/g, "")) {
                    console.log($(this).html());
                    $(this).closest('tr').show();
                    e.stopPropagation();
                }
                else{
                    $(this).closest('tr').hide();
                }
            });
        });
          
        $('#default-btn').click(function(){
            $('#example tbody .main').show();
            console.log("default");
        });
          
      });
    </script>

  </body>
</html>
