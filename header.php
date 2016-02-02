      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="home.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Sch</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Schedular</b></span>
        </a>

        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li <?php if($current_page=="home" ){ ?>class="active" <?php }?>>
              <a href="home.php">
                <i class="fa fa-home fa-fw"></i> 
                <span>Home</span>
              </a>
            </li>
            <li class="treeview" <?php if($current_page=="overview" or $current_page=="add-inventory" or $current_page=="edit-inventory" or $current_page=="remove-inventory"){ ?>class="active" <?php }?>>
              <a href="#"><i class="fa fa-list fa-fw"></i> 
                <span>Rooms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!--<li <?php if($current_page=="overview" ){ ?>class="active" <?php }?>><a href="overview.php"><i class="fa fa-table fa-fw"></i> Overview</a></li> -->
                <li <?php if($current_page=="add-inventory" ){ ?>class="active" <?php }?>><a href="add-inventory.php"><i class="fa fa-plus fa-fw"></i>  Add Inventory</a></li>
                <li <?php if($current_page=="edit-inventory" ){ ?>class="active" <?php }?>><a href="edit-inventory.php"><i class="fa fa-pencil fa-fw"></i> Edit Inventory</a></li>
                <li <?php if($current_page=="remove-inventory" ){ ?>class="active" <?php }?>><a href="remove-inventory.php"><i class="fa fa-remove fa-fw"></i>  Remove Inventory</a></li>
              </ul>              
            </li>

             <li class="treeview" <?php if($current_page=="report-date-acquired" or $current_page=="report-date-received" or $current_page=="report-item-status" or $current_page=="report-location" or $current_page=="report-recipient"){ ?>class="active" <?php }?>>
              <a href="reports.php"><i class="fa fa-table fa-fw"></i> 
                <span>Schedules</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($current_page=="report-date-acquired" ){ ?>class="active" <?php }?>><a href="report-date-acquired.php"><i class="fa fa-calendar fa-fw"></i> By Date Acquired</a></li>
                <li <?php if($current_page=="report-date-received" ){ ?>class="active" <?php }?>><a href="report-date-received.php"><i class="fa fa-calendar fa-fw"></i>  By Date Received</a></li>
                <li <?php if($current_page=="report-item-status" ){ ?>class="active" <?php }?>><a href="report-item-status.php"><i class="fa fa-desktop fa-fw"></i> By Item Status</a></li>
                <li <?php if($current_page=="report-location" ){ ?>class="active" <?php }?>><a href="report-location.php"><i class="fa fa-building fa-fw"></i> By Room Assignment</a></li>
                <li <?php if($current_page=="report-recipient" ){ ?>class="active" <?php }?>><a href="report-recipient.php"><i class="fa fa-user fa-fw"></i> By Recipient</a></li>              
              </ul>              
            </li> 

            <li>
              <a href="index.php">
                <i class="fa fa-sign-out fa-fw"></i> 
                <span>Sign out</span>
              </a>
            </li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>