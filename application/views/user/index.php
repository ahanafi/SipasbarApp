<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
      <li class="active">User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12">
      <?php if (isset($_SESSION['notif'])): ?>
        <div class="alert alert-<?= $_SESSION['notif']['level'] ?> alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo substr($_SESSION['notif']['message'], 0,5); ?></strong>
          <?php echo substr($_SESSION['notif']['message'], 6); ?>
        </div>
      <?php endif; ?>
        <!-- Custom tabs (Charts with tabs)-->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-users"></i>
            <h3 class="box-title">Data User</h3>
            <div class="box-tools pull-right">
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('dashboard/user/create'); ?>"><i class="fa fa-plus-circle"></i> Tambah</a>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover table-responsive" id="data">
              <thead>
                <tr>
                  <th class="ctr">No.</th>
                  <th class="ctr">Sub Unit</th>
                  <th class="ctr">Username</th>
                  <th class="ctr">Password</th>
                  <th>E-mail</th>
                  <th>Bagian</th>
                  <th>Telp</th>
                  <?php if ($role == 1): ?>
                    <th class="ctr">Action</th>
                  <?php endif ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $usr): ?>
                  <tr>
                    <td class="ctr"><?php echo $no++; ?></td>
                    <td class="ctr"><?php echo $usr->nama_unit; ?></td>
                    <td class="ctr"><?php echo $usr->username; ?></td>
                    <td class="ctr">******</td>
                    <td><?php echo $usr->email; ?></td>
                    <td><?php echo $usr->bagian; ?></td>
                    <td><?php echo $usr->telp; ?></td>
                    <?php if ($role == 1): ?>
                    <td class="ctr">
                      <a href="<?php echo base_url('dashboard/user/edit/'.$usr->uid); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                      <a href="#" data-id="<?php echo $usr->uid ?>" data-type="user" class="btn btn-delete btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                    <?php endif ?>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.nav-tabs-custom -->
      </section>
      <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>