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
        <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-users"></i>
              <h3 class="box-title">Edit User Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('dashboard/user/update/'.$user->uid); ?>" class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputUsername3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="inputUsername3" placeholder="Username" value="<?php echo $user->username; ?>">
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <?php echo form_error('username'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="inputNama3" placeholder="Nama" value="<?php echo $user->nama; ?>">
                    <?php echo form_error('nama'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $user->email; ?>">
                    <?php echo form_error('email'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" value="******">
                    <?php echo form_error('password'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputBagian3" class="col-sm-2 control-label">Bagian</label>
                  <div class="col-sm-10">
                    <input type="text" name="bagian" class="form-control" id="inputBagian3" placeholder="Bagian" value="<?php echo $user->bagian; ?>">
                    <?php echo form_error('bagian'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSubUnit3" class="col-sm-2 control-label">Sub Unit</label>
                  <div class="col-sm-10">
                    <select name="unit_id" id="inputSubUnit" class="form-control">
                      <option value="">-- Select Sub Unit --</option>
                      <?php foreach ($units as $unit): ?>
                        <?php if ($unit->id == $user->unit_id): ?>
                          <option value="<?php echo $unit->id; ?>" selected><?php echo $unit->nama_unit; ?></option>
                        <?php else: ?>
                          <option value="<?php echo $unit->id; ?>"><?php echo $unit->nama_unit; ?></option>
                        <?php endif; ?>
                      <?php endforeach ?>
                    </select>
                    <?php echo form_error('unit_id'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp3" class="col-sm-2 control-label">No. Telp</label>
                  <div class="col-sm-10">
                    <input type="number" name="telp" class="form-control" id="inputTelp3" placeholder="Nomor Telepon" value="<?php echo $user->telp; ?>">
                    <?php echo form_error('telp'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTelp3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('dashboard/users'); ?>" class="btn btn-default">Kembali</a>
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