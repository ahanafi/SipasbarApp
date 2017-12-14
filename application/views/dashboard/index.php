<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <?php if ($_SESSION['unit'] == "Administrator" || $_SESSION['unit'] == "Operator"): ?>
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $totalUsers; ?></h3>

            <p>Registered Users</p>
          </div>
          <div class="icon">
            <i class="ion-ios-personadd-outline"></i>
          </div>
          <a href="<?php echo base_url('dashboard/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $totalOpen; ?></h3>

            <p>Open</p>
          </div>
          <div class="icon">
            <i class="ion-ios-circle-outline"></i>
          </div>
          <a href="<?php echo base_url('dashboard/ppb/open'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $totalInProgress; ?></h3>

            <p>In Progress</p>
          </div>
          <div class="icon">
            <i class="ion-ios-clock-outline"></i>
          </div>
          <a href="<?php echo base_url('dashboard/ppb/in-progress'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $totalComplete; ?></h3>

            <p>Complete</p>
          </div>
          <div class="icon">
            <i class="ion-ios-checkmark-outline"></i>
          </div>
          <a href="<?php echo base_url('dashboard/ppb/complete'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <?php endif ?>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <?php if ($firstStatus > 0 || $secondStatus > 0 || $thirdStatus > 0 || $fourthStatus > 0): ?>
        <section class="col-lg-12">
          <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Notice!</strong>
            Anda memiliki
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
            request approval PPB!
          </div>
        </section>
      <?php endif; ?>
      <!-- Left col -->
      <section class="col-lg-8">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-home"></i>
            <h3 class="box-title">Dashboard</h3>
          </div>
          <div class="box-body">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, placeat explicabo. Magnam at, numquam, quos obcaecati hic sed. Officia, impedit. Quibusdam dolore laudantium dolores aperiam corporis ullam, neque rerum magnam.
            </p>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur doloremque ex est modi, consectetur suscipit culpa vel, impedit voluptates, consequuntur error soluta vitae perspiciatis, a tempora ut eligendi accusantium! Reprehenderit!
            </p>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consequuntur fugit, porro, reprehenderit ratione facere laborum eligendi hic temporibus quae vitae voluptas, dolor aut. Hic tempore, ab aspernatur vitae temporibus!
            </p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.nav-tabs-custom -->
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-4">
        <!-- Calendar -->
        <div class="box box-solid bg-blue-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>