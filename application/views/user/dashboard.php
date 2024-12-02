



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url('data_masa_sewa/tampil_masa_sewa_building')?>">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sewa < 1 Bulan</div>
                      <?php foreach($jumlah_masa_sewa as $jumlah_masa_sewa):?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_masa_sewa->row?></div>
                      <?php endforeach;?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-car fa-2x text-gray-600"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
           
          
          <!-- Content Row -->
          <div class="row">
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 