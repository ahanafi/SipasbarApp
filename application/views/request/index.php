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
      <li class="active">PPB</li>
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
            <i class="fa fa-refresh"></i>
            <h3 class="box-title">Request Approval PPB</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover table-responsive" id="data-open">
              <thead>
                <tr>
                  <th class="ctr">#</th>
                  <th class="ctr">Nomor</th>
                  <th class="ctr">Nama Barang</th>
                  <th class="ctr">Tanggal</th>
                  <th class="ctr">No. Kendaraan</th>
                  <th class="ctr">Tujuan</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th class="ctr">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($ppb) > 0): ?>
                  <?php foreach ($ppb as $p): ?>
                    <tr>
                      <td class="ctr"><?php echo $no++; ?></td>
                      <td><?php echo $p->nomor; ?></td>
                      <td style="list-style: none;">
                        <?php $brg = $this->Barang->PpbId($p->pid);
                          foreach ($brg as $b) : ?>
                            <li>
                              <strong style="font-size: 20px;"><b>-</b></strong>
                              <a href="#" data-app-no="<?php echo $b->id; ?>" data-toggle="modal" data-target"#detailBarang" class="modalShow"><?php echo $b->nama_barang; ?></a>
                            </li>
                        <?php endforeach; ?>
                      </td>
                      <td class="ctr"><?php echo str_replace("-", "/",  $p->tanggal); ?></td>
                      <td class="ctr"><?php echo $p->no_kendaraan; ?></td>
                      <td class="ctr"><?php echo $p->tujuan; ?></td>
                      <td>
                        <em>Menunggu approve user</em>
                      </td>
                      <td><?php echo $p->keterangan; ?></td>
                      <td class="ctr">
                        <a href="<?php echo base_url('dashboard/approve/'.$p->pid); ?>" class="btn btn-primary">Approve!</a>
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