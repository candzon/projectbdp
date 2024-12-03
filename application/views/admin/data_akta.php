<script src="https://code.jquery.com/jquery-3.7.1.min.js"
	integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url('assets/css/select2.min.css') ?>" type="text/css" rel="stylesheet" />

<?php if ($this->session->flashdata('message')): ?>
	<?= $this->session->flashdata('message'); ?>
	<!-- delete flash data -->
	<?php $this->session->unset_userdata('message'); ?>
<?php endif; ?>


<!-- Tombol Tambah -->
<div class="d-flex justify-content-between mb-3">
	<button class="btn btn-success" type="button" id="btnTambah" data-toggle="modal" data-target="#tambahModal">
		<i class="fas fa-plus"></i> Tambah
	</button>
</div>

<!-- modal tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahModalLabel">Tambah Data Akta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Isi Form Tambah -->
			<form action="<?= base_url('data_akta/tambah_akta') ?>" method="post">
				<div class="modal-body">
					<!--  radio button, input for parent or child -->
					<div class="form-group">
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-outline-primary btn-toggle active">
								<input type="radio" name="jenis_akta" id="parent" autocomplete="off" value="parent" checked
									onchange="handleChange(this)"> Parent
							</label>
							<label class="btn btn-outline-primary btn-toggle">
								<input type="radio" name="jenis_akta" id="child" autocomplete="off" value="child"
									onchange="handleChange(this)"> Child
							</label>
						</div>
					</div>
					<!-- nomor akta -->
					<div class="form-group" id="nomor_akta">
						<label for="nomor_akta">Nomor Akta</label>
						<input value="<?= set_value('nomor_akta') ?>" autocomplete="off" type="text" name="nomor_akta"
							placeholder="Masukkan Nomor Akta" class="form-control">
					</div>
					<!-- select2 nama kantor, onchange getKantor() -->
					<div class="form-group" id="nama_kantor">
						<label for="nama_kantor">Nama Kantor</label>
						<select class="form-control select2 nama_kantor" name="nama_kantor" id="selectKantor">
							<option value="">Pilih Nama Kantor</option>
							<?php foreach ($kantor as $k) : ?>
								<option value="<?= $k->nama_kantor ?>"><?= $k->nama_kantor ?></option>
							<?php endforeach; ?>
						</select>

						<?= form_error('nama_kantor', '<small class="text-danger">', '</small>') ?>
					</div>

					<!-- select2 alamat -->
					<div class="form-group" id="alamat">
						<label for="alamat">Alamat</label>
						<select class="form-control select2 alamat" name="alamat" id="selectAlamat">
							<option value="">Pilih Alamat</option>
							<?php foreach ($kantor as $alamat) : ?>
								<option value="<?= $alamat->alamat ?>"><?= $alamat->alamat ?></option>
							<?php endforeach; ?>
						</select>

						<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
					</div>

					<!-- select2 kepala kantor -->
					<div class="form-group" id="nama_kepala_kantor">
						<label for="nama_kepala_kantor">Nama Kepala Kantor</label>
						<select class="form-control select2 nama_kepala_kantor" name="nama_kepala_kantor" id="selectKepala">
							<option value="">Pilih Nama Kepala Kantor</option>
							<?php foreach ($karyawan as $kepala) : ?>
								<option value="<?= $kepala->nama_karyawan ?>"><?= $kepala->nama_karyawan ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<!-- periode_awal, periode_akhir -->
					<div class="form-group" id="periode_awal">
						<label for="periode_awal">Periode Awal</label>
						<input value="<?= set_value('periode_awal') ?>" autocomplete="off" type="date" name="periode_awal"
							class="form-control">
						<?= form_error('periode_awal', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="form-group" id="periode_akhir">
						<label for="periode_akhir">Periode Akhir</label>
						<input value="<?= set_value('periode_akhir') ?>" autocomplete="off" type="date" name="periode_akhir"
							class="form-control">
						<?= form_error('periode_akhir', '<small class="text-danger">', '</small>') ?>
					</div>

					<!-- harga sewa -->
					<div class="form-group">
						<label for="total_harga_sewa">Total Harga Sewa</label>
						<input value="<?= set_value('total_harga_sewa') ?>" autocomplete="off" type="text" name="total_harga_sewa"
							placeholder="Masukkan Total Harga Sewa" class="form-control" id="total_harga_sewa" oninput="formatRupiah(this)">
						<?= form_error('total_harga_sewa', '<small class="text-danger">', '</small>') ?>
					</div>

					<script>
						function formatRupiah(input) {
							let value = input.value.replace(/[^,\d]/g, '').toString();
							let split = value.split(',');
							let number = split[0];
							let decimal = split[1];

							// Format number with commas
							number = number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

							if (decimal !== undefined) {
								input.value = number + ',' + decimal;
							} else {
								input.value = number;
							}
						}
					</script>



				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Tabel Data -->
<table class="table table-bordered table-striped table-hover table-sm small" id="dataTabel">
	<thead>
		<tr align="center">
			<th>No</th>
			<th>Nama Kantor</th>
			<th>Alamat</th>
			<th>Periode Akhir Sewa</th>
			<th>Total Harga Sewa</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody id="tableBody">
		<?php $no = 1;
		foreach ($data as $sys_akta):
			$details = $this->model_data_akta->get_detail_akta($sys_akta->id);
		?>
			<tr align="center">
				<td><?= $no; ?></td>
				<td><?= $sys_akta->nama_kantor; ?></td>
				<td><?= $sys_akta->alamat; ?></td>
				<td><?= $sys_akta->periode_akhir_sewa; ?></td>
				<td>Rp <?= number_format((float)$this->model_data_akta->sum_harga_sewa($sys_akta->id), 0, ',', '.'); ?></td>
				<td>
					<div class="action-buttons">
						<a class="btn btn-primary" href="#collapse<?= $no; ?>" data-toggle="collapse" aria-expanded="true">Detail</a>
						<a href="<?= base_url('upload/' . $sys_akta->dokumen_path) ?>" class="btn btn-secondary" type="button">
							<i class="fas fa-eye"></i> Lihat
						</a>
						<!-- history -->
						<button class="btn btn-primary" type="button" data-toggle="collapse"
							data-target="#collapseHistory<?= $no; ?>">History</button>
					</div>
				</td>
			</tr>

			<!-- collapse history -->
			<tr id="collapseHistory<?= $no; ?>" class="collapse">
				<td colspan="6">
					<div class="card">
						<div class="card-header">
							<strong>History: <?= $sys_akta->nama_kantor; ?></strong>
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr align="center">
										<th>No</th>
										<th>Nomor Akta</th>
										<th>Nama Kantor</th>
										<th>Alamat Kantor</th>
										<th>Nama Kepala Kantor</th>
										<th>Periode Awal</th>
										<th>Periode Akhir</th>
										<th>Dokumen</th>
										<th>Deleted At</th>
										<th>Deleted By</th>
									</tr>
								</thead>
								<tbody>
									<?php $detail_no = 1;
									foreach ($details as $detail):
										if (!$detail->deleted_at) continue;
									?>
										<tr align="center">
											<td><?= $detail_no; ?></td>
											<td><?= $detail->nomor_akta; ?></td>
											<td><?= $detail->nama_kantor ?></td>
											<td><?= $detail->alamat_kantor; ?></td>
											<td><?= $detail->nama_kepala_kantor; ?></td>
											<td><?= $detail->periode_awal ?? "-"; ?></td>
											<td><?= $detail->periode_akhir; ?></td>
											<td>
												<?php if ($detail->dokumen_path) : ?>
													<a href="<?= base_url('upload/' . $detail->dokumen_path) ?>" target="_blank">Lihat Dokumen</a>
												<?php else : ?>
													-
												<?php endif; ?>
											</td>
											<td><?= $detail->deleted_at; ?></td>
											<td><?= $detail->deleted_by_user; ?></td>
										</tr>
									<?php $detail_no++;
									endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</td>
			</tr>
			<!-- endCollapse -->


			<!-- collapse -->
			<tr id="collapse<?= $no; ?>" class="collapse show">
				<td colspan="6">
					<div class="card">
						<div class="card-header">
							<strong>Detail: <?= $sys_akta->nama_kantor; ?></strong>
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr align="center">
										<th>No</th>
										<th>Nomor Akta</th>
										<th>Alamat Kantor</th>
										<th>Nama Kepala Kantor</th>
										<th>Periode Awal</th>
										<th>Periode Akhir</th>
										<th>Harga Sewa</th>
										<th>Dokumen</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $detail_no = 1;
									foreach ($details as $detail):
										if ($detail->deleted_at) continue;
									?>
										<tr align="center">
											<td><?= $detail_no; ?></td>
											<td><?= $detail->nomor_akta; ?></td>
											<td><?= $detail->alamat_kantor; ?></td>
											<td><?= $detail->nama_kepala_kantor; ?></td>
											<td><?= $detail->periode_awal ?? "-"; ?></td>
											<td><?= $detail->periode_akhir; ?></td>
											<td>Rp <?= number_format((float)$detail->harga_sewa, 0, ',', '.'); ?></td>
											<td>
												<?php if ($detail->dokumen_path) : ?>
													<a href="<?= base_url('upload/' . $detail->dokumen_path) ?>" target="_blank">Lihat Dokumen</a>
												<?php else : ?>
													-
												<?php endif; ?>
											</td>
											<td>
												<!-- delete -->
												<div class="action-buttons">
													<a onclick="deletedata(this)" data-id_detail_akta="<?= $detail->id_detail_akta; ?>"
														data-toggle="tooltip" data-placement="bottom" title="Hapus"
														class="btn btn-danger btn-sm delete text-white">Hapus</a>
													<button class="btn btn-primary mr-2" type="button" data-toggle="modal"
														data-target="#editModal<?= $detail->id_detail_akta; ?>">Ubah</button>
													<button class="btn btn-secondary" data-toggle="modal"
														data-target="#uploadModal<?= $detail->id_detail_akta; ?>">Upload Dokumen</button>
												</div>
											</td>
										</tr>
										<!-- Modal Edit -->
										<div class="modal fade" id="editModal<?= $detail->id_detail_akta; ?>" tabindex="-1" role="dialog"
											aria-labelledby="editModalLabel<?= $detail->id_detail_akta; ?>" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="editModalLabel<?= $detail->id_detail_akta; ?>">Ubah
															Data Akta</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="<?= base_url('data_akta/edit_detail_akta/' . $detail->id_detail_akta) ?>"
														method="post">
														<div class="modal-body">
															<div class="form-group">
																<label for="nomor_akta">Nomor Akta</label>
																<input value="<?= $detail->nomor_akta; ?>" autocomplete="off" type="text" name="nomor_akta"
																	placeholder="Masukkan Nomor Akta" class="form-control">
															</div>
															<div class="form-group">
																<label for="periode_awal">Periode Awal</label>
																<input value="<?= $detail->periode_awal; ?>" autocomplete="off" type="date"
																	name="periode_awal" class="form-control">
															</div>
															<div class="form-group">
																<label for="periode_akhir">Periode Akhir</label>
																<input value="<?= $detail->periode_akhir; ?>" autocomplete="off" type="date"
																	name="periode_akhir" class="form-control">
															</div>
															<!-- harga sewa -->
															<div class="form-group">
																<label for="total_harga_sewa">Harga Sewa</label>
																<input value="<?= number_format($detail->harga_sewa, 0, ',', '.'); ?>" autocomplete="off" type="text"
																	name="total_harga_sewa" placeholder="Masukkan Total Harga Sewa" class="form-control"
																	id="total_harga_sewa" onkeyup="formatRupiah(this, 'Rp')">
															</div>

															<script>
																function formatRupiah(input, prefix) {
																	// Hapus semua karakter selain angka
																	let value = input.value.replace(/[^,\d]/g, '').toString();

																	// Pisahkan angka ke dalam ribuan
																	let split = value.split(',');
																	let number = split[0];
																	let decimal = split[1];
																	let sisa = number.length % 3;
																	let rupiah = number.substr(0, sisa);
																	let ribuan = number.substr(sisa).match(/\d{3}/g);

																	// Tambahkan titik sebagai pemisah ribuan
																	if (ribuan) {
																		let separator = sisa ? '.' : '';
																		rupiah += separator + ribuan.join('.');
																	}

																	// Gabungkan dengan angka desimal jika ada
																	rupiah = decimal !== undefined ? rupiah + ',' + decimal : rupiah;

																	// Tambahkan prefix "Rp" jika diperlukan
																	input.value = prefix !== undefined ? prefix + ' ' + rupiah : rupiah;
																}
															</script>


															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
																<button type="submit" class="btn btn-primary">Simpan</button>
															</div>
													</form>
												</div>
											</div>
										</div>


										<!-- Modal Upload Dokumen -->
										<div class="modal fade" id="uploadModal<?= $detail->id_detail_akta; ?>" tabindex="-1" role="dialog"
											aria-labelledby="uploadModalLabel<?= $detail->id_detail_akta; ?>" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="uploadModalLabel<?= $detail->id_detail_akta; ?>">Upload
															Dokumen</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="<?= base_url('data_akta/upload_dokumen/' . $detail->id_detail_akta) ?>"
														method="post" enctype="multipart/form-data">
														<input type="hidden" name="id_detail_akta" value="<?= $detail->id_detail_akta; ?>">
														<div class="modal-body">
															<div class="form-group">
																<label for="dokumen">Pilih Dokumen</label>
																<input type="file" name="dokumen" class="form-control" required>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
															<button type="submit" class="btn btn-primary">Upload</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php $detail_no++;
									endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</td>
			</tr>
			<!-- endCollapse -->
		<?php $no++;
		endforeach; ?>
	</tbody>
</table>

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('.select2').select2({
			theme: 'bootstrap',
			dropdownParent: $('#tambahModal')
		});

		// init parent or child
		$('#nomor_akta').hide();
		$('#nama_kepala_kantor').hide();
		$('#periode_awal').hide();

		// nama kantor onchange
		$('#selectKantor').on('change', function() {
			var nama_kantor = $(this).val();
			$.ajax({
				url: '<?= base_url('data_akta/get_kantor') ?>',
				method: 'POST',
				data: {
					nama_kantor: nama_kantor
				},
				success: function(response) {
					var data = JSON.parse(response);
					if (data) {
						$('#selectAlamat').select2('destroy').val(data.alamat).trigger('change').attr('readonly', true);
						$('#selectKepala').select2('destroy').val(data.nama_karyawan).trigger('change').attr('readonly',
							true);
					} else {
						$('#selectAlamat').val('').trigger('change').attr('readonly', false).select2({
							theme: 'bootstrap',
							dropdownParent: $('#tambahModal')
						});
						$('#selectKepala').val('').trigger('change').attr('readonly', false).select2({
							theme: 'bootstrap',
							dropdownParent: $('#tambahModal')
						});
					}
				}

			});
		});
	});


	function handleChange(radio) {
		if (radio.value == 'parent') {
			$('#nomor_akta').hide();
			$('#nama_kepala_kantor').hide();
			$('#periode_awal').hide();
		} else {
			$('#nomor_akta').show();
			$('#nama_kepala_kantor ').show();
			$('#periode_awal ').show();
		}
	}

	function deletedata(element) {
		var id_detail_akta = $(element).data('id_detail_akta');
		// alert(id_detail_akta);
		swal({
			title: "Hapus Data?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#FF0000",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya",
		}, function() {
			window.location = "../data_akta/hapus_detail_akta/" + id_detail_akta;
		});
	}
</script>

<!-- Logic untuk show collapse -->
<script>
	$(document).ready(function() {
		// Get current URL
		const currentUrl = window.location.href;
		const baseUrl = '<?= base_url('data_akta/tampil_data_akta') ?>';

		console.log(baseUrl);

		// Only execute collapse logic if NOT on data_pbb page
		if (currentUrl !== baseUrl) {
			// Get both path and query parameters
			const pathSegments = window.location.pathname.split('/');
			const id_detail_skdp = pathSegments[pathSegments.length - 1];
			const urlParams = new URLSearchParams(window.location.search);
			const periode_akhir = urlParams.get('periode_akhir');

			if (id_detail_skdp && periode_akhir) {
				$('tr').each(function() {
					const row = $(this);
					const periodeAkhirCell = row.find('td:nth-child(5)');

					if (periodeAkhirCell.text().trim() === periode_akhir) {
						const collapseId = row.find('a[data-toggle="collapse"]').attr('href');
						if (collapseId) {
							$(collapseId).addClass('show');
							row.find('a[data-toggle="collapse"]').attr('aria-expanded', 'true');

							$('html, body').animate({
								scrollTop: row.offset().top - 100
							}, 500);
						}
					}
				});
			}
		} else {
			$('tr').each(function() {
				const row = $(this);
				const collapseId = row.find('a[data-toggle="collapse"]').attr('href');
				if (collapseId) {
					$(collapseId).removeClass('show');
					row.find('a[data-toggle="collapse"]').attr('aria-expanded', 'false');
				}
			});
		}
	});
</script>