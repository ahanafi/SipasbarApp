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
      <li class="active">Barang</li>
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
              <i class="fa fa-cubes"></i>
              <h3 class="box-title">Tambah Barang Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('dashboard/barang/store'); ?>" class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNamaBarang3" class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_barang" class="form-control" id="inputNamaBarang3" placeholder="Nama Barang">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <?php echo form_error('nama_barang'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputJumlah3" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah" class="form-control" id="inputJumlah3" placeholder="Jumlah">
                    <?php echo form_error('jumlah'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSatuan3" class="col-sm-2 control-label">Satuan</label>
                  <div class="col-sm-10">
                    <select name="satuan" id="inputSatuan3" class="form-control">
                      <option value="">-- Pilih Satuan --</option>
                      <option value="pack">Pack</option>
                      <option value="unit">Unit</option>
                      <option value="buah">Buah</option>
                    </select>
                    <?php echo form_error('satuan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputStatus3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <input type="text" name="status" class="form-control" id="inputStatus3" placeholder="Status">
                    <?php echo form_error('status'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKeterangan3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea name="keterangan" class="form-control" id="inputKeterangan3" placeholder="Keterangan" style="resize: none;"></textarea>
                    <?php echo form_error('keterangan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <button type="submit" name="create" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('dashboard/barang'); ?>" class="btn btn-default">Kembali</a>
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