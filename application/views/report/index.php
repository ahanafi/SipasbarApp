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
      <li class="active">Laporan</li>
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
            <i class="fa fa-pie-chart"></i>
            <h3 class="box-title">Laporan <span class="label bg-blue">DATA PPB</span></h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover table-responsive" id="data-report" style="width: 100%;">
              <thead>
                <tr>
                  <th class="ctr" rowspan="2">No.</th>
                  <th class="ctr" rowspan="2">Nomor</th>
                  <th class="ctr" rowspan="2">Nama Barang</th>
                  <th class="ctr" rowspan="2">Tanggal</th>
                  <th class="ctr" rowspan="2">No. Kendaraan</th>
                  <th class="ctr" rowspan="2">Tujuan</th>
                  <th rowspan="2">Keterangan</th>
                  <th colspan="4" class="ctr">Approval</th>
                  <th class="ctr" rowspan="2">Option</th>
                </tr>
                <tr>
                  <th class="ctr">Kasie</th>
                  <th class="ctr">Kadept</th>
                  <th class="ctr">Kadiv</th>
                  <tH class="ctr">Security</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($ppb) > 0): ?>
                  <?php foreach ($ppb as $p): ?>
                    <tr>
                      <td class="ctr"><?php echo $no++; ?></td>
                      <td><?php echo $p->nomor; ?></td>
                      <td>
                        <button type="button" data-ppb-id="<?php echo $p->pid; ?>" class="btn btn-sm btn-show btn-success">Show Barang</button>
                      </td>
                      <td class="ctr"><?php echo str_replace("-", "/",  $p->tanggal); ?></td>
                      <td class="ctr"><?php echo $p->no_kendaraan; ?></td>
                      <td class="ctr"><?php echo $p->tujuan; ?></td>
                      <td><?php echo $p->keterangan; ?></td>
                      <td class="ctr">
                        <?php if($p->is_approve_kasie == 1): ?>
                          <img src="<?php echo base_url('images/approved.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php else: ?>
                          <img src="<?php echo base_url('images/rejected.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php endif; ?>
                      </td>
                      <td class="ctr">
                        <?php if($p->is_approve_kadept == 1): ?>
                          <img src="<?php echo base_url('images/approved.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php else: ?>
                          <img src="<?php echo base_url('images/rejected.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php endif; ?>
                      </td>
                      <td class="ctr">
                        <?php if($p->is_approve_kadiv == 1): ?>
                          <img src="<?php echo base_url('images/approved.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php else: ?>
                          <img src="<?php echo base_url('images/rejected.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php endif; ?>
                      </td>
                      <td class="ctr">
                        <?php if($p->is_approve_security == 1): ?>
                          <img src="<?php echo base_url('images/approved.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php else: ?>
                          <img src="<?php echo base_url('images/rejected.png'); ?>" alt="" class="img img-responsive" width="30px;">
                        <?php endif; ?>
                      </td>
                      <td class="ctr">
                        <a target="_blank" href="<?php echo base_url('report/print/ppb/'.$p->pid); ?>" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
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