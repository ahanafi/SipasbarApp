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
        <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-briefcase"></i>
              <h3 class="box-title">Tambah Vendor Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('dashboard/vendor/store'); ?>" class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputCompanyName3" class="col-sm-2 control-label">Perusahaan</label>
                  <div class="col-sm-10">
                    <input type="text" name="perusahaan" class="form-control" id="inputCompanyName3" placeholder="Perusahaan">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <?php echo form_error('perusahaan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSubUnit3" class="col-sm-2 control-label">Sub Unit</label>
                  <div class="col-sm-10">
                    <select name="unit_id" id="inputSubUnit" class="form-control">
                      <option value="">-- Pilih Sub Unit --</option>
                      <?php foreach ($units as $unit): ?>
                        <option value="<?php echo $unit->id; ?>"><?php echo $unit->nama_unit; ?></option>
                      <?php endforeach ?>
                    </select>
                    <?php echo form_error('unit_id'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp3" class="col-sm-2 control-label">No. Telp</label>
                  <div class="col-sm-10">
                    <input type="number" name="telp" class="form-control" id="inputTelp3" placeholder="Nomor Telepon">
                    <?php echo form_error('telp'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAlamat3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" rows="3" id="inputAlamat3" style="resize: none;" placeholder="Alamat"></textarea>
                    <?php echo form_error('alamat'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <button type="submit" name="create" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('dashboard/vendor'); ?>" class="btn btn-default">Kembali</a>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
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