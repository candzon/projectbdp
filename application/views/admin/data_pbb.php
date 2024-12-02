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
				<h5 class="modal-title" id="tambahModalLabel">Tambah Data PBB</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Isi Form Tambah -->
			<form action="<?= base_url('data_pbb/tambah_pbb') ?>" method="post">
				<div class="modal-body">
					<!--  radio button, input for parent or child -->
					<div class="form-group">
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-outline-primary btn-toggle active">
								<input type="radio" name="jenis" id="parent" autocomplete="off" value="parent" checked
									onchange="handleChange(this)"> Parent
							</label>
							<label class="btn btn-outline-primary btn-toggle">
								<input type="radio" name="jenis" id="child" autocomplete="off" value="child"
									onchange="handleChange(this)"> Child
							</label>
						</div>
					</div>
					<!-- parent: nama kantor, alamat(disabled), nop, luas -->
					<section id="parent">
						<div class="form-group">
							<label for="selectKantor">Nama Kantor</label>
							<select class="form-control select2" id="selectKantor" name="nama_kantor">
								<option value="">Pilih Nama Kantor</option>
								<?php foreach ($kantor as $kantor): ?>
									<option value="<?= $kantor->nama_kantor; ?>"><?= $kantor->nama_kantor; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="selectAlamat">Alamat</label>
							<input type="text" class="form-control" id="selectAlamat" name="alamat" readonly>
						</div>
						<div class="form-group">
							<label for="nop">NOP</label>
							<input type="text" class="form-control" id="nop" name="nop">
						</div>
						<div class="form-group">
							<label for="luas">Luas</label>
							<input type="text" class="form-control" id="luas" name="luas">
						</div>
					</section>
					<!-- child: tahun, jumlah_pembayaran, tanggal_pembayaran-->
					<section id="child">
						<!-- parent -->
						<div class="form-group">
							<label for="id_pbb">Parent</label>
							<select class="form-control select2" id="id_pbb" name="id_pbb">
								<option value="">Pilih Parent</option>
								<?php foreach ($data as $sys_pbb): ?>
									<option value="<?= $sys_pbb->id; ?>"><?= $sys_pbb->nama_kantor; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="tahun">Tahun</label>
							<input type="text" class="form-control" id="tahun" name="tahun">
						</div>
						<div class="form-group">
							<label for="jumlah_pembayaran">Jumlah Pembayaran</label>
							<input type="text" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran">
						</div>
						<div class="form-group">
							<label for="tanggal_pembayaran">Tanggal Pembayaran</label>
							<input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran">
						</div>
					</section>
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
			<th>NOP</th>
			<th>Luas</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody id="tableBody">
		<?php $no = 1;
		foreach ($data as $sys_pbb):
			$details = $this->model_data_pbb->get_detail_pbb($sys_pbb->id);
		?>
			<tr align="center">
				<td><?= $no; ?></td>
				<td><?= $sys_pbb->nama_kantor; ?></td>
				<td><?= $sys_pbb->alamat; ?></td>
				<td><?= $sys_pbb->nop; ?></td>
				<td><?= $sys_pbb->luas; ?></td>
				<td>
					<div class="action-buttons">
						<button class="btn btn-primary" type="button" data-toggle="collapse"
							data-target="#collapse<?= $no; ?>">Detail</button>
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
							<strong>History: <?= $sys_pbb->nama_kantor; ?></strong>
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr align="center">
										<th>No</th>
										<th>Tahun</th>
										<th>Jumlah Pembayaran</th>
										<th>Tanggal Pembayaran</th>
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
											<td><?= $detail->tahun; ?></td>
											<td><?= $detail->jumlah_pembayaran; ?></td>
											<td><?= $detail->tanggal_pembayaran; ?></td>
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
			<tr id="collapse<?= $no; ?>" class="collapse">
				<td colspan="6">
					<div class="card">
						<div class="card-header">
							<strong>Detail: <?= $sys_pbb->nama_kantor; ?></strong>
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr align="center">
										<th>No</th>
										<th>Tahun</th>
										<th>Jumlah Pembayaran</th>
										<th>Tanggal Pembayaran</th>
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
											<td><?= $detail->tahun; ?></td>
											<td><?= $detail->jumlah_pembayaran; ?></td>
											<td><?= $detail->tanggal_pembayaran; ?></td>
											<td>
												<!-- delete -->
												<div class="action-buttons">
													<a href="<?= base_url('data_pbb/hapus_detail_pbb/' . $detail->id) ?>" class="btn btn-danger mr-2"
														onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
													<button class="btn btn-primary mr-2" type="button" data-toggle="modal"
														data-target="#editModal<?= $detail->id; ?>">Ubah</button>
												</div>
											</td>
										</tr>
										<!-- modal edit -->
										<div class="modal fade" id="editModal<?= $detail->id; ?>" tabindex="-1" role="dialog"
											aria-labelledby="editModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="editModalLabel">Ubah Data PBB</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<!-- Isi Form Edit -->
													<form action="<?= base_url('data_pbb/edit_detail_pbb/' . $detail->id) ?>" method="post">
														<div class="modal-body">
															<input type="hidden" name="id" value="<?= $detail->id; ?>">
															<div class="form-group">
																<label for="tahun">Tahun</label>
																<input type="text" class="form-control" id="tahun" name="tahun"
																	value="<?= $detail->tahun; ?>">
															</div>
															<div class="form-group">
																<label for="jumlah_pembayaran">Jumlah Pembayaran</label>
																<input type="text" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran"
																	value="<?= $detail->jumlah_pembayaran; ?>">
															</div>
															<div class="form-group">
																<label for="tanggal_pembayaran">Tanggal Pembayaran</label>
																<input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran"
																	value="<?= $detail->tanggal_pembayaran; ?>">
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- endModal -->

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
		$('section#child').hide().find('input, select').prop('disabled', true).hide();

		// nama kantor onchange
		$('#selectKantor').on('change', function() {
			var nama_kantor = $(this).val();
			$.ajax({
				url: '<?= base_url('data_pbb/get_kantor') ?>',
				method: 'POST',
				data: {
					nama_kantor: nama_kantor
				},
				success: function(response) {
					var data = JSON.parse(response);
					$('#selectAlamat').val(data.alamat);
				}
			});
		});
	});

	function handleChange(radio) {
		if (radio.value == 'parent') {
			// hide section child
			$('section#child').hide().find('input, select').prop('disabled', true).hide();
			// show section parent
			$('section#parent').show().find('input, select').prop('disabled', false).show();
		} else {
			// hide section parent
			$('section#parent').hide().find('input, select').prop('disabled', true).hide();
			// show section child
			$('section#child').show().find('input, select').prop('disabled', false).show();
		}
	}

	function deletedata(element) {
		var id_detail_pbb = $(element).data('id_detail_pbb');
		// alert(id_detail_pbb);
		swal({
			title: "Hapus Data?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#FF0000",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya",
		}, function() {
			window.location = "../data_pbb/hapus_pbb/" + id_detail_pbb;
		});
	}
</script>