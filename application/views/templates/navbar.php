<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url('dashboard'); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>PPB</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>PPB</b>Application</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="<?php echo base_url('dashboard/my-profile'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile">
            <?php if ($_SESSION['role'] == 1): ?>
              <img src="<?php echo base_url('assets/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
            <?php else: ?>
              <img src="<?php echo base_url('assets/img/user8-128x128.jpg'); ?>" class="user-image" alt="User Image">
            <?php endif; ?>
            <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
          </a>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" class="logout" data-toggle="tooltip" title="Logout" data-target="#confirmLogout" data-placement="bottom"><i class="fa fa-power-off"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>