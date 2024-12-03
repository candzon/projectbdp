<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
				<!-- <div class="sidebar-brand-icon">
          <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GA Building Management BCAi</div> -->
				<img src="<?php echo base_url() ?>/assets/img/logo.png" width="80px" height="20px">
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li <?= $this->uri->segment(1) == 'dashboard_admin' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
				<a class="nav-link" href="<?php echo base_url('dashboard_admin/index') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>



			<!-- Divider -->
			<hr class="sidebar-divider my-0">



			<!-- Nav Item - Pages Collapse Menu -->
			<li
				<?= $this->uri->segment(2) == 'tampil_data_akun' || $this->uri->segment(1) == 'data_akun' || $this->uri->segment(2) == 'tampil_data_vendor' || $this->uri->segment(1) == 'data_vendor' || $this->uri->segment(2) == 'tampil_data_karyawan' || $this->uri->segment(1) == 'data_karyawan' || $this->uri->segment(2) == 'tampil_alamat' || $this->uri->segment(1) == 'data_alamat' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Data Master</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Pilih Data Master:</h6>
						<a class="collapse-item" href="<?php echo base_url('data_akun/tampil_data_akun') ?>">Data Akun</a>
						<a class="collapse-item" href="<?php echo base_url('data_vendor/tampil_data_vendor') ?>">Data Vendor</a>
						<a class="collapse-item" href="<?php echo base_url('data_karyawan/tampil_data_karyawan') ?>">Data
							Karyawan</a>
						<a class="collapse-item" href="<?php echo base_url('data_alamat/tampil_alamat') ?>">Data Kantor</a>
					</div>
				</div>
			</li>

			<!-- <li  <?= $this->uri->segment(2) == 'tampil_data_akun' || $this->uri->segment(1) == 'data_akun' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('data_akun/tampil_data_akun') ?>">
          <i class="fas fa-fw fa-child"></i>
          <span>Data Akun</span></a>
        </li> -->

			<!-- Divider -->
			<!-- <hr class="sidebar-divider my-0">

       <li  <?= $this->uri->segment(2) == 'tampil_data_vendor' || $this->uri->segment(1) == 'data_vendor' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('data_vendor/tampil_data_vendor') ?>">
          <i class="fas fa-fw fa-car"></i>
          <span>Data Vendor</span></a>
        </li> -->

			<!-- Divider -->
			<!-- <hr class="sidebar-divider my-0">

        <li  <?= $this->uri->segment(2) == 'tampil_data_karyawan' || $this->uri->segment(1) == 'data_karyawan' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('data_karyawan/tampil_data_karyawan') ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Karyawan</span></a>
        </li> -->

			<!-- Divider -->
			<!-- <hr class="sidebar-divider my-0">

        <li  <?= $this->uri->segment(2) == 'tampil_alamat' || $this->uri->segment(1) == 'data_alamat' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('data_alamat/tampil_alamat') ?>">
        <i class="fas fa-fw fa-building"></i>
          <span>Data Kantor</span></a>
        </li> -->

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li
				<?= $this->uri->segment(2) == 'tampil_data_kendaraan' || $this->uri->segment(1) == 'data_kendaraan' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
				<a class="nav-link" href="<?php echo base_url('data_kendaraan/tampil_data_kendaraan') ?>">
					<i class="fas fa-car"></i>
					<span>Tampil Data Kendaraan</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li
				<?= $this->uri->segment(2) == 'tampil_data_kantor' || $this->uri->segment(1) == 'data_kantor' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
				<a class="nav-link" href="<?php echo base_url('data_kantor/tampil_data_kantor') ?>">
					<i class="fas fa-fw fa-edit"></i>
					<span>Kelola Data Kendaraan</span></a>
			</li>


			<!-- Nav Item - Pages Collapse Menu -->
			<li
				<?= $this->uri->segment(2) == 'tampil_data_skdp' || $this->uri->segment(1) == 'data_skdp' || $this->uri->segment(2) == 'tampil_data_vendor' || $this->uri->segment(1) == 'data_vendor' || $this->uri->segment(2) == 'tampil_data_karyawan' || $this->uri->segment(1) == 'data_karyawan' || $this->uri->segment(2) == 'tampil_alamat' || $this->uri->segment(1) == 'data_alamat' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-file-alt"></i>
					<span>Data Menejemen</span>
				</a>
				<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Pilih Data Menejemen</h6>
						<a class="collapse-item" href="<?php echo base_url('data_skdp/tampil_data_skdp') ?>">SKDP</a>
						<a class="collapse-item" href="<?php echo base_url('data_akta/tampil_data_akta') ?>">Akta Sewa</a>
						<a class="collapse-item" href="<?php echo base_url('data_pbb/tampil_data_pbb') ?>">PBB</a>
					</div>
				</div>
			</li>


			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li
				<?= $this->uri->segment(2) == 'tampil_masa_sewa' || $this->uri->segment(1) == 'data_masa_sewa' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
				<a class="nav-link" href="<?php echo base_url('data_masa_sewa/tampil_masa_sewa') ?>">
					<i class="fas fa-calendar-check"></i>
					<span>Cek Masa Sewa</span></a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li
				<?= $this->uri->segment(2) == 'tampil_data_akun' || $this->uri->segment(1) == 'data_akun' || $this->uri->segment(2) == 'tampil_data_vendor' || $this->uri->segment(1) == 'data_vendor' || $this->uri->segment(2) == 'tampil_data_karyawan' || $this->uri->segment(1) == 'data_karyawan' || $this->uri->segment(2) == 'tampil_alamat' || $this->uri->segment(1) == 'data_alamat' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="far fa-address-book"></i>
					<span>Data Vendor</span>
				</a>
				<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Pilih Menu:</h6>
						<a class="collapse-item" href="<?php echo base_url('data_vendor_ga/tambah_vendor_ga') ?>">Tambah Data
							Vendor</a>
						<a class="collapse-item" href="<?php echo base_url('data_vendor_ga/tampil_pengadaan_ga') ?>">Pengadaan</a>
						<a class="collapse-item" href="<?php echo base_url('data_vendor_ga/tampil_maintenance_ga') ?>">Service /
							Maintenance</a>
						<a class="collapse-item" href="<?php echo base_url('data_vendor_ga/tampil_jasa_ga') ?>">Jasa</a>
					</div>
				</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link nav-link logout w3-hover-opacity" style="width:100%;cursor:pointer" onclick="showConfirmation('logout', 'Anda Yakin ingin Keluar ?', '../login/logout')">
					<i class="fas fa-fw fa-door-open"></i>
					<span>Keluar</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link nav-link logout w3-hover-opacity" style="width:100%;cursor:pointer" onclick="#">
					<i class="fas fa-copoyright"></i>
					<span>&copy; lukaspdtama</span></a>
			</li>





			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
								aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
											aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - Alerts -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">

							</a>
							<!-- Dropdown - Alerts -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="alertsDropdown">
								<h6 class="dropdown-header">
									Alerts Center
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-primary">
											<i class="fas fa-file-alt text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 12, 2019</div>
										<span class="font-weight-bold">A new monthly report is ready to download!</span>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-success">
											<i class="fas fa-donate text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 7, 2019</div>
										$290.29 has been deposited into your account!
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-warning">
											<i class="fas fa-exclamation-triangle text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 2, 2019</div>
										Spending Alert: We've noticed unusually high spending for your account.
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
							</div>
						</li>

						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">

								<!-- Counter - Messages -->
							</a>
							<!-- Dropdown - Messages -->
							<!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>

                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div> -->
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600">Halo, <?php echo $_SESSION['nama']; ?> </span>
								<!-- <img class="img-profile rounded-circle" src="https://www.vhv.rs/dpng/d/544-5445462_people-icons-png-flat-person-icon-png-transparent.png"> -->
							</a>
						</li>
					</ul>

				</nav>
				<!-- End of Topbar
 -->