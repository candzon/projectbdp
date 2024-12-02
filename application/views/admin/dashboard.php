<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Sewa < 1 Bulan Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a href="<?php echo base_url('data_masa_sewa/tampil_masa_sewa')?>">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sewa < 1 Bulan</div>
                <?php foreach($jumlah_masa_sewa as $jumlah_masa_sewa): ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                <?php endforeach; ?>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-car fa-2x text-gray-600"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- SKDP Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <a href="<?php echo base_url('data_/tampil_skdp')?>">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SKDP</div>
              <?php if (!empty($tampil_data_skdp)): ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo $tampil_data_skdp[0]->row; ?>
                </div>
              <?php else: ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              <?php endif; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-file-alt fa-2x text-gray-600"></i>
            </div>
          </div>
        </div>
      </div>
  </a>
</div>



<!-- Akta Sewa Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <a href="<?php echo base_url('data_/tampil_akta_sewa')?>">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Akta Sewa</div>
              <?php if (!empty($tampil_data_akta_sewa)): ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo $tampil_data_akta_sewa[0]->row; ?>
                </div>
              <?php else: ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              <?php endif; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-file-contract fa-2x text-gray-600"></i>
            </div>
          </div>
        </div>
      </div>
  </a>
</div>

<!-- PBB Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <a href="<?php echo base_url('data_/tampil_pbb')?>">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PBB</div>
              <?php if (!empty($tampil_data_pbb)): ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php echo $tampil_data_pbb[0]->row; ?>
                </div>
              <?php else: ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              <?php endif; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-receipt fa-2x text-gray-600"></i>
            </div>
          </div>
        </div>
      </div>
  </a>
</div>



  </div>
</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
