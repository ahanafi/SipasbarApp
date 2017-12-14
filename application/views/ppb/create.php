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
        <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>
              <h3 class="box-title">Tambah Data PPB</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('dashboard/ppb/store'); ?>" class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNumber3" class="col-sm-2 control-label">Nomor</label>
                  <div class="col-sm-10">
                    <input type="text" name="nomor" class="form-control" id="inputNumber3" placeholder="Nomor">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <?php echo form_error('nomor'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTanggal3" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="text" name="tanggal" class="form-control" id="inputTanggal3" placeholder="Tanggal" value="<?php echo date('Y-m-d'); ?>">
                    <?php echo form_error('tanggal'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNoKendaraan3" class="col-sm-2 control-label">No. kendaraan</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_kendaraan" class="form-control" id="inputNoKendaraan3" placeholder="Nomor Kendaraan">
                    <?php echo form_error('no_kendaraan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTujuan3" class="col-sm-2 control-label">Tujuan</label>
                  <div class="col-sm-10">
                    <input type="text" name="tujuan" class="form-control" id="inputTujuan3" placeholder="Tujuan">
                    <?php echo form_error('tujuan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKeteranganName3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea name="keterangan" class="form-control" id="inputKeteranganName3" placeholder="Keterangan" style="resize: none;"></textarea>
                    <?php echo form_error('keterangan'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputBarang3" class="col-sm-2 control-label">Pilih Barang</label>
                  <div class="col-sm-10">
                    <select name="barang[]" id="inputBarang3" class="form-control" multiple="multiple" style="border-radius: 0px;border-color: #d2d6de;">                      
                      <?php foreach ($barang as $brg): ?>
                        <option value="<?php echo $brg->id; ?>"><?php echo $brg->nama_barang; ?></option>
                      <?php endforeach ?>
                    </select>
                    <?php echo form_error('barang[]'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <button type="submit" name="create" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-default" name="back" type="button">Kembali</button>
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