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
      <li><a href="<?php echo base_url('dashboard/ppb/open'); ?>">PPB</a></li>
      <li class="active">Set Approval</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <?php if (isset($_SESSION['notif'])): ?>
        <section class="col-lg-12">
          <div class="alert alert-<?= $_SESSION['notif']['level'] ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php echo substr($_SESSION['notif']['message'], 0,5); ?></strong>
            <?php echo substr($_SESSION['notif']['message'], 6); ?>
          </div>
        </section>
      <?php endif; ?>
      <section class="col-lg-7">
        <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-check-square-o"></i>
              <h3 class="box-title">Set Approval</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="setApproval" action="<?php echo base_url('dashboard/approval/set-store/'.$ppb->id); ?>" class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="approvedKadpet" class="col-sm-4 control-label">Approved by Kasie</label>
                  <div class="col-sm-8">
                    <input type="checkbox" name="approvedKasie" data-toggle="toggle" data-on="Aprroved" data-off="Not Approved" value="1" <?php echo ($app->is_approve_kasie == 1) ? 'checked' : ''; ?>>
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="approvedKadept" class="col-sm-4 control-label">Approved by Kadept</label>
                  <div class="col-sm-8">
                    <input type="checkbox" name="approvedKadept" data-toggle="toggle" data-on="Aprroved" data-off="Not Approved" value="1" <?php echo ($app->is_approve_kadept == 1) ? 'checked' : ''; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label for="approvedKadiv" class="col-sm-4 control-label">Approved by Kadiv</label>
                  <div class="col-sm-8">
                    <input type="checkbox" name="approvedKadiv" data-toggle="toggle" data-on="Aprroved" data-off="Not Approved" value="1" <?php echo ($app->is_approve_kadiv == 1) ? 'checked' : ''; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label for="approvedSecurity" class="col-sm-4 control-label">Approved by Security</label>
                  <div class="col-sm-8">
                    <input type="checkbox" name="approvedSecurity" data-toggle="toggle" data-on="Aprroved" data-off="Not Approved" value="1" <?php echo ($app->is_approve_security == 1) ? 'checked' : ''; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp3" class="col-sm-4 control-label">&nbsp;</label>
                  <div class="col-sm-8">
                    <button type="submit" name="post" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-default" name="back" type="button">Kembali</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
              <!-- /.box-body -->
          </div>
        <!-- /.box -->
        <!-- /.nav-tabs-custom -->
      </section>
      <section class="col-lg-5">
        <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-info-circle"></i>
              <h3 class="box-title">Detail Data PPB</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-responsive table-bordered table-striped">
                <tr>
                  <td>Nomor</td>
                  <td>:</td>
                  <td><?php echo $ppb->nomor; ?></td>
                </tr>
                <tr>
                  <td>Nama Brg</td>
                  <td>:</td>
                  <td>
                    <?php $brg = $this->Barang->PpbId($ppb->id);
                      foreach ($brg as $b) : ?>
                        <li style="list-style: none;"> <strong style="font-size: 20px;"><b>-</b></strong> <?php echo $b->nama_barang; ?></li>
                    <?php endforeach; ?>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td>:</td>
                  <td><?php echo str_replace("-", "/", $ppb->tanggal); ?></td>
                </tr>
                <tr>
                  <td>No. Kendaraaan</td>
                  <td>:</td>
                  <td><?php echo $ppb->no_kendaraan; ?></td>
                </tr>
                <tr>
                  <td>Tujuan</td>
                  <td>:</td>
                  <td><?php echo $ppb->tujuan; ?></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <td><?php echo $ppb->keterangan; ?></td>
                </tr>
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