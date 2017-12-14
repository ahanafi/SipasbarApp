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
      <li class="active">Approval</li>
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
            <i class="fa fa-check-circle"></i>
            <h3 class="box-title">Approval</h3>
            <div class="box-tools pull-right">
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('dashboard/user/create'); ?>"><i class="fa fa-plus-circle"></i> Tambah</a>
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('dashboard/user/add'); ?>"><i class="fa fa-download"></i> Import</a>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover table-responsive" id="data-approval">
              <thead>
                <tr>
                  <th class="ctr" rowspan="2" style="vertical-align: middle;">#</th>
                  <th class="ctr" rowspan="2" style="vertical-align: middle;">Nomor</th>
                  <th class="ctr" rowspan="2" style="vertical-align: middle;">Nama Barang</th>
                  <th class="ctr" colspan="4">Approved by</th>
                  <th class="ctr" rowspan="2" style="vertical-align: middle;">Action</th>
                </tr>
                <tr>
                  <th class="ctr">Kasie</th>
                  <th class="ctr">Kadept</th>
                  <th class="ctr">Kadiv</th>
                  <th class="ctr">Security</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($approval as $app): ?>
                  <tr>
                    <td class="ctr"><?php echo $no++; ?></td>
                    <td class="ctr">
                      <a href="#" data-app-no="<?php echo $app['id']; ?>" data-toggle="modal" data-target"#test" class="modalShow"><?php echo $app['nomor']; ?></a>
                    </td>
                    <td class="ctr"><?php echo $app['nama_barang']; ?></td>
                    <td class="ctr">
                      <?php if ($app['is_approve_kasie'] == 1): ?>
                        <img src="<?php echo base_url('images/approved.png'); ?>" alt=""  style="width: 50px;margin:10px;">
                      <?php else: ?>
                        <img src="<?php echo base_url('images/rejected.png'); ?>" alt=""  style="width: 40px;margin:10px;">
                      <?php endif; ?>
                    </td>
                    <td class="ctr">
                      <?php if ($app['is_approve_kadept'] == 1): ?>
                        <img src="<?php echo base_url('images/approved.png'); ?>" alt=""  style="width: 50px;margin:10px;">
                      <?php else: ?>
                        <img src="<?php echo base_url('images/rejected.png'); ?>" alt=""  style="width: 40px;margin:10px;">
                      <?php endif; ?>
                    </td>
                    <td class="ctr">
                      <?php if ($app['is_approve_kadiv'] == 1): ?>
                        <img src="<?php echo base_url('images/approved.png'); ?>" alt=""  style="width: 50px;margin:10px;">
                      <?php else: ?>
                        <img src="<?php echo base_url('images/rejected.png'); ?>" alt=""  style="width: 40px;margin:10px;">
                      <?php endif; ?>
                    </td>
                    <td class="ctr">
                      <?php if ($app['is_approve_security'] == 1): ?>
                        <img src="<?php echo base_url('images/approved.png'); ?>" alt=""  style="width: 50px;margin:10px;">
                      <?php else: ?>
                        <img src="<?php echo base_url('images/rejected.png'); ?>" alt=""  style="width: 40px;margin:10px;">
                      <?php endif; ?>
                    </td>
                    <td class="ctr">
                      <a href="" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      <a href="" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                      <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
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
<!-- Modal -->
<div class="modal fade" id="detailBarang" tabindex="-1" role="dialog" aria-labelledby="detailBarangLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="detailBarangLabel">Detail Barang</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td>Nama barang</td>
            <td>:</td>
            <td><span class="nama_barang"></span></td>
          </tr>
          <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td><span class="jumlah"></span></td>
          </tr>
          <tr>
            <td>Satuan</td>
            <td>:</td>
            <td><span class="satuan"></span></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><span class="keterangan"></span></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>