  <div class="modal fade" id="confirmLogout" tabindex="-1" role="dialog" aria-labelledby="confirmLogoutLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="confirmLogoutLabel">Konfirmasi Logout</h4>
        </div>
        <div class="modal-body">
          <strong>
            Apakah Anda yakin akan keluar dari system ?
          </strong>
        </div>
        <div class="modal-footer">
          <form action="<?php echo base_url('logout'); ?>" method="POST">
            <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="confirmLogoutLabel">Konfirmasi Hapus</h4>
        </div>
        <div class="modal-body">
          <strong>
            Apakah Anda yakin akan menghapus data ini ?
          </strong>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" class="btn btn-danger url">Ya, Hapus</a>
        </div>
      </div>
    </div>
  </div>
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
              <td>Status</td>
              <td>:</td>
              <td><span class="status"></span></td>
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
  <div class="modal fade" id="detailApproved" tabindex="-1" role="dialog" aria-labelledby="detailApprovedLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="detailApprovedLabel">Detail Approved</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td>Approved by Kasie</td>
              <td>:</td>
              <td><img src="" class="approvedKasie" style="width: 40px;"></td>
            </tr>
            <tr>
              <td>Approved by Kadept</td>
              <td>:</td>
              <td><img src="" class="approvedKadept" style="width: 40px;"></td>
            </tr>
            <tr>
              <td>Approved by Kadiv</td>
              <td>:</td>
              <td><img src="" class="approvedKadiv" style="width: 40px;"></td>
            </tr>
            <tr>
              <td>Approved by Security</td>
              <td>:</td>
              <td><img src="" class="approvedSecurity" style="width: 40px;"></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <div class="modal fade" id="ListBarang" tabindex="-1" role="dialog" aria-labelledby="ListBarangLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="ListBarangLabel">Daftar Barang</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Status</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody id="load-data">
              
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Ahmad Hanafi</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
  <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/knob/jquery.knob.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/pages/dashboard.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js'); ?>"></script>
  <script>
    $(function() {
      $("#data-user").DataTable({});
      $("#inputBarang3").select2({
        placeholder : 'Silahkan pilih atau ketik nama barang'
      });
    });
  </script>
</body>
</html>
