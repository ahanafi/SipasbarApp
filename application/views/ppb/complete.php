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
            <i class="fa fa-book"></i>
            <h3 class="box-title">Data PPB  <span class="label bg-red">COMPLETE</span></h3>
            <div class="box-tools pull-right">
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('dashboard/ppb/create'); ?>"><i class="fa fa-plus-circle"></i> Tambah</a>              
            </div>
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
                  <?php if ($role == 1): ?>
                  <th class="ctr">Option</th>
                  <th class="ctr">Action</th>
                  <?php endif ?>
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
                        <em>
                          <?php
                            if($p->status == 5){
                              echo "Berhasil di approve";
                            } else {
                              echo "Menunggu approve user";
                            }
                          ?>
                        </em>
                      </td>
                      <td><?php echo $p->keterangan; ?></td>
                      <?php if ($role == 1): ?>
                      <td class="ctr">
                        <?php if($p->status == 0): ?>
                        <div class="btn-group">
                          <a href="<?php echo base_url('dashboard/request/approval/'.$p->pid); ?>" class="btn bg-purple btn-xs" data-toggle="tooltip" title="Request Approval"><i class="fa fa-retweet"></i></a>
                          <a href="#" data-app-no="<?php echo $p->pid; ?>" class="btn bg-maroon detail-approved btn-xs" data-toggle="tooltip" title="Detail Approval"><i class="fa fa-eye"></i></a>
                        </div>
                      <?php else: ?>
                        <a href="#" data-app-no="<?php echo $p->pid; ?>" class="btn bg-maroon detail-approved btn-xs" data-toggle="tooltip" title="Detail Approval"><i class="fa fa-eye"></i></a>
                      <?php endif; ?>
                      </td>
                      <td class="ctr">
                        <div class="btn-group">
                          <a href="<?php echo base_url('dashboard/ppb/edit/'.$p->pid); ?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                          <a href="#" class="btn btn-danger btn-xs btn-delete" data-toggle="tooltip" title="Delete" data-id="<?php echo $p->pid; ?>" data-type="ppb"><i class="fa fa-trash"></i></a>
                        </div>
                      </td>
                      <?php endif ?>
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