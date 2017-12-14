  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> <i class="fa fa-user"></i> User Profile </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">My profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-6">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if ($_SESSION['role'] == 1): ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/user2-160x160.jpg') ?>" alt="User profile picture">
              <?php else: ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/user8-128x128.jpg') ?>" alt="User profile picture">
              <?php endif ?>
              <h3 class="profile-username text-center"><?php echo $_SESSION['name']; ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION['unit']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo $_SESSION['username']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>E-mail</b> <a class="pull-right"><?php echo $_SESSION['email']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Bagian</b> <a class="pull-right"><?php echo $_SESSION['bagian']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Unit</b> <a class="pull-right"><?php echo $_SESSION['unit']; ?></a>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>