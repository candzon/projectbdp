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
			<a href="<?php echo base_url('data_masa_sewa/tampil_masa_sewa') ?>">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sewa< 1 Bulan</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_masa_sewa[0]->jumlah; ?></div>
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
			<?php foreach ($get_id_skdp as $row) {
				$get_id_skdp = $row->id_detail_skdp;
				$periode_akhir = $row->periode_akhir;
				$collapse_id = $row->collapse_id;
			?>
				<?php if ($periode_akhir) ?>
				<a href="<?= base_url('data_skdp/cek_dokumen_skdp') ?>">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">SKDP < 3 Bulan</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_skdp ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-file-alt fa-2x text-gray-600"></i>
									</div>
								</div>
							</div>
						</div>
				</a>
			<?php break;
			} ?>
		</div>


		<!-- Akta Sewa Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">

			<?php foreach ($get_id_akta as $row) {
				$get_id_akta = $row->id_detail_akta;
				$periode_akhir = $row->periode_akhir;
			?>
				<a href="<?php echo base_url('data_akta/cek_dokumen_akta/') ?>">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Akta Sewa < 3 Bulan</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_akta_sewa ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-file-contract fa-2x text-gray-600"></i>
									</div>
								</div>
							</div>
						</div>
				</a>
			<?php
				break;
			}
			?>
		</div>

		<!-- PBB Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<?php foreach ($get_id_pbb as $row) {
				$get_id_pbb = $row->id;
				$periode_akhir = $row->tanggal_pembayaran;
			?>
				<a href="<?= base_url('data_pbb/cek_dokumen_pbb/') ?>">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">PBB < 3 Bulan</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">
											</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pbb ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-receipt fa-2x text-gray-600"></i>
									</div>
								</div>
							</div>
						</div>
				</a>
			<?php
				break;
			}
			?>
		</div>



	</div>
</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>