<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php if ($_SESSION['role'] == 1): ?>
          <img src="<?php echo base_url('assets/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        <?php else: ?>
          <img src="<?php echo base_url('assets/img/user8-128x128.jpg'); ?>" class="img-circle" alt="User Image">
        <?php endif ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['name']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['unit']; ?></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="<?php echo base_url('dashboard'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span>Master Data</span>
          <span class="pull-right-container">
            <span class="fa fa-angle-left pull-right"></span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('dashboard/vendor'); ?>"><i class="fa fa-circle-o"></i> Data Vendor</a></li>
          <?php if ($role == 1): ?>
          <li><a href="<?php echo base_url('dashboard/users'); ?>"><i class="fa fa-circle-o"></i> Data User</a></li>
          <?php endif ?>
          <li><a href="<?php echo base_url('dashboard/barang'); ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Data PPB</span>
          <span class="pull-right-container">
            <span class="fa fa-angle-left pull-right"></span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('dashboard/ppb/create'); ?>"><i class="fa fa-circle-o"></i> Input PPB</a></li>
          <li><a href="<?php echo base_url('dashboard/ppb/open'); ?>"><i class="fa fa-circle-o"></i> Open</a></li>
          <li><a href="<?php echo base_url('dashboard/ppb/in-progress'); ?>"><i class="fa fa-circle-o"></i> In Progress</a></li>
          <li><a href="<?php echo base_url('dashboard/ppb/complete'); ?>"><i class="fa fa-circle-o"></i> Complete</a></li>
        </ul>
      </li>
      <?php if($_SESSION['unit'] == "Approval 1" || $_SESSION['unit'] == "Approval 2" || $_SESSION['unit'] == "Approval 3" || $_SESSION['unit'] == "Security"): ?>
      <li>
        <a href="<?php echo base_url('dashboard/req/approval'); ?>">
          <i class="fa fa-refresh"></i>
          <span>Request Approval</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-blue">
              <?php
                if($_SESSION['unit'] == "Approval 1") {
                  echo $firstStatus;
                } elseif($_SESSION['unit'] == "Approval 2") {
                  echo $secondStatus;
                } elseif($_SESSION['unit'] == "Approval 3") {
                  echo $thirdStatus;
                } else {
                  echo $fourthStatus;
                }


              ?>
            </small>
          </span>
        </a>
      </li>
    <?php endif; ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
            <span class="fa fa-angle-left pull-right"></span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('report'); ?>"><i class="fa fa-circle-o"></i> Data PPB</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>