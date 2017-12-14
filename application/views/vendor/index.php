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
      <li class="active">Vendor</li>
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
            <i class="fa fa-briefcase"></i>
            <h3 class="box-title">Data Vendor</h3>
            <div class="box-tools pull-right">
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('dashboard/vendor/create'); ?>"><i class="fa fa-plus-circle"></i> Tambah</a>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover table-responsive" id="data">
              <thead>
                <tr>
                  <th class="ctr">No.</th>
                  <th class="ctr">Sub Unit</th>
                  <th class="ctr">Nama Perusahaan</th>
                  <th>Telp</th>
                  <th>Alamat</th>
                  <?php if ($role == 1): ?>
                    <th class="ctr">Action</th>
                  <?php endif ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($vendor as $vdr): ?>
                  <tr>
                    <td class="ctr"><?php echo $no++; ?></td>
                    <td class="ctr"><?php echo $vdr->nama_unit; ?></td>
                    <td class="ctr"><?php echo $vdr->perusahaan; ?></td>
                    <td><?php echo $vdr->telp; ?></td>
                    <td><?php echo $vdr->alamat; ?></td>
                    <?php if ($role == 1): ?>
                      <td class="ctr">
                        <a href="<?php echo base_url('dashboard/vendor/edit/'.$vdr->vid); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="<?php echo $vdr->vid ?>" data-type="vendor" class="btn btn-delete btn-danger"><i class="fa fa-trash"></i></a>
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