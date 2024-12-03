<script src="https://code.jquery.com/jquery-3.7.1.min.js"
	integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url('assets/css/select2.min.css') ?>" type="text/css" rel="stylesheet" />

<!-- Tombol Tambah -->
<?php if ($this->session->flashdata('message')): ?>
	<?= $this->session->flashdata('message'); ?>
	<!-- delete flash data -->
	<?php $this->session->unset_userdata('message'); ?>
<?php endif; ?>

<div class="d-flex justify-content-between mb-3">
	<button class="btn btn-success" type="button" id="btnTambah" data-toggle="modal" data-target="#tambahModal">+
		Tambah</button>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahModalLabel">Tambah Data SKDP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Form untuk menambah data -->
				<form method="post" action="<?= base_url('data_skdp/tambah_skdp_aksi') ?>" onsubmit="return validateForm()">
					<div class="form-group">
						<label for="nomor_skdp">Nomor SKDP</label>
						<input value="<?= set_value('nomor_skdp') ?>" autocomplete="off" type="text" name="nomor_skdp"
							placeholder="Masukkan Nomor SKDP" class="form-control">
						<?= form_error('nomor_skdp', '<small class="text-danger mt-2">', '</small>') ?>
					</div>
					<div class="form-group">
						<label for="nama_kantor">Nama Kantor</label>
						<select name="nama_kantor" class="select2 form-control" id="nama_kantor">
							<option value="">Pilih Nama Kantor</option>
							<!-- PHP Code to generate options dynamically -->
							<?php foreach ($alamat as $value) : ?>
								<option value="<?= $value->nama_kantor ?>"><?= $value->nama_kantor ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('nama_kantor', '<small class="text-danger mt-2">', '</small>') ?>
					</div>

					<div class="form-group">
						<label for="alamat_kantor">Alamat Kantor</label>
						<select name="alamat_kantor" class="form-control select2" id="alamat_kantor">
							<option value="">Pilih Alamat Kantor</option>
							<?php foreach ($alamat as $value) : ?>
								<option value="<?= $value->alamat ?>"><?= $value->alamat ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('alamat_kantor', '<small class="text-danger mt-2">', '</small>') ?>
					</div>

					<div class="form-group">
						<label for="nama_kepala_kantor">Nama Kepala Kantor</label>
						<select name="nama_kepala_kantor" class="form-control select2" id="nama_kepala_kantor">
							<option value="">Pilih Nama Kepala Kantor</option>
							<?php foreach ($getHeadKantor as $value) : ?>
								<option value="<?= $value->nama_karyawan ?>"><?= $value->nama_karyawan ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('nama_kepala_kantor', '<small class="text-danger mt-2">', '</small>') ?>
					</div>

					<div id="periodeInput">
						<div class="form-group" id="periode_awal_group">
							<label for="periode_awal">Periode Awal (opsional)</label>
							<input value="<?= set_value('periode_awal') ?>" autocomplete="off" type="date" name="periode_awal"
								class="form-control">
							<?= form_error('periode_awal', '<small class="text-danger mt-2">', '</small>') ?>
						</div>

						<div class="form-group" id="periode_akhir_group">
							<label for="periode_akhir">Periode Akhir</label>
							<input value="<?= set_value('periode_akhir') ?>" autocomplete="off" type="date" required
								name="periode_akhir" class="form-control">
							<?= form_error('periode_akhir', '<small class="text-danger mt-2">', '</small>') ?>
						</div>
					</div>

					<!-- Keterangan (opsional) -->
					<div class="form-group">
						<label for="keterangan">Keterangan (opsional)</label>
						<textarea name="keterangan" placeholder="Masukkan Keterangan (boleh kosong)"
							class="form-control"><?= set_value('keterangan') ?></textarea>
						<?= form_error('keterangan', '<small class="text-danger mt-2">', '</small>') ?>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<table class="table table-bordered table-striped table-hover table-sm small" id="dataTabel">
	<thead>
		<tr align="center">
			<th>No</th>
			<th>Nama Kantor</th>
			<th>Nomor SKDP</th>
			<th>Periode Awal</th>
			<th>Periode Akhir</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody id="tableBody">


		<?php
		$no = 1;
		$groupedData = []; // Variabel untuk mengelompokkan data berdasarkan nama kantor

		// Kelompokkan data berdasarkan nama kantor
		foreach ($data as $detail_skdp) {
			$groupedData[$detail_skdp->nama_kantor][] = $detail_skdp;
		}
		// Loop untuk menampilkan data yang sudah dikelompokkan
		foreach ($groupedData as $nama_kantor => $details):

			// Urutkan berdasarkan periode_akhir dalam urutan menurun
			usort($details, function ($a, $b) {
				return strtotime($b->periode_akhir) - strtotime($a->periode_akhir);
			});

			$firstDetail = $details[0]; // Data pertama dalam grup untuk ditampilkan di baris 

		?>
			<tr align="center">
				<td><?= $no; ?></td>
				<td><?= $nama_kantor; ?></td>
				<td><?= $firstDetail->nomor_skdp; ?></td>
				<td><?= $firstDetail->periode_awal; ?></td>
				<td><?= $firstDetail->periode_akhir; ?></td>
				<td>
					<div class="btn-group" role="group">
						<a class="btn btn-primary" href="#collapse<?= $no; ?>" data-toggle="collapse">Detail</a>
						<a href="previewFile?nomorskdp=<?= $firstDetail->nomor_skdp ?>" target="_blank" class="btn btn-secondary"
							type="">
							<i class="fas fa-eye"></i> Lihat
						</a>

						<!-- Button History -->
						<button type="button" class="btn btn-primary" data-toggle="collapse"
							data-target="#historyCollapse<?= $no; ?>">
							History </button>

						<!-- Modal History -->
						<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="card-header">
										<strong>Detail Kantor: <?= $nama_kantor; ?></strong>
									</div>
									<div class="modal-body">
										<table class="table table-bordered">
											<thead>
												<tr align="center">
													<th>No</th>
													<th>Nomor SKDP</th>
													<th>Alamat Kantor</th>
													<th>Nama Kepala Kantor</th>
													<th>Periode Awal</th>
													<th>Periode Akhir</th>
													<th>Dokumen</th>
													<th>Tgl Upload Dok.</th>
													<th>Keterangan</th>
													<th>User</th>
													<th>Tanggal Hapus</th>
													<th>Aksi</th>
													<th>Aksi</th>

												</tr>
											</thead>
											<tbody>
												<tr align="center">
													<td><?= $detail_no; ?></td>
													<td><?= $detail->nomor_skdp; ?></td>
													<td><?= $detail->alamat_kantor; ?></td>
													<td><?= $detail->nama_kepala_kantor; ?></td>
													<td><?= $detail->periode_awal ?? "-"; ?></td>
													<td><?= $detail->periode_akhir; ?></td>
											</tbody>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>

			<!-- historyCollapse -->
			<tr id="historyCollapse<?= $no ?>" class="collapse">
				<td colspan="6">
					<div class="card">
						<div class="card-header">
							<strong>History:<?= $nama_kantor; ?></strong>
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr align="center">
										<th>No</th>
										<th>Nomor SKDP</th>
										<th>Alamat Kantor</th>
										<th>Nama Kepala Kantor</th>
										<th>Periode Awal</th>
										<th>Periode Akhir</th>
										<th>Dokumen</th>
										<th>Tgl Upload Dok.</th>
										<th>Keterangan</th>
										<th>Deleted At</th>
										<th>Deleted By</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$detail_no = 1;
									foreach ($details as $detail):
										if ($detail->deleted_at == null) {
											continue;
										}
									?>
										<tr align="center">
											<td><?= $detail_no; ?></td>
											<td><?= $detail->nomor_skdp; ?></td>
											<td><?= $detail->alamat_kantor; ?></td>
											<td><?= $detail->nama_kepala_kantor; ?></td>
											<td><?= $detail->periode_awal ?? "-"; ?></td>
											<td><?= $detail->periode_akhir; ?></td>
											<td>
												<?php if ($detail->dokumen_path) : ?>
													<a href="<?= base_url('upload/' . $detail->dokumen_path) ?>" target="_blank">Lihat
														Dokumen</a>
												<?php else : ?>
													-
												<?php endif; ?>

											</td>
											<td><?= !is_null($detail->dokumen_uploaded_at) ? date('d F Y H:i:s', strtotime($detail->dokumen_uploaded_at)) : '-' ?></td>
											<td><?= $detail->keterangan; ?></td>
											<td style="word-wrap:break-word;">
												<?= date('d-m-Y', strtotime($detail->deleted_at)) . "<br/>" . date('H:i:s', strtotime($detail->deleted_at)); ?>
											</td>
											<td><?= $detail->deleted_by_user; ?></td>
										</tr>
									<?php
										$detail_no++;
									endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</td>
			</tr>
			<!-- endHistoryCollapse -->

			<!-- collapse -->
			<tr id="collapse<?= $no; ?>" class="collapse">
				<td colspan="6">
					<div class="card">
						<div class="card-header">
							<strong>Detail:<?= $nama_kantor; ?></strong>
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr align="center">
										<th>No</th>
										<th>Nomor SKDP</th>
										<th>Alamat Kantor</th>
										<th>Nama Kepala Kantor</th>
										<th>Periode Awal</th>
										<th>Periode Akhir</th>
										<th>Dokumen</th>
										<th>Tgl Upload Dok.</th>
										<th>Keterangan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$detail_no = 1;
									foreach ($details as $detail):
										if ($detail->deleted_at != null) {
											continue;
										}
									?>
										<tr align="center">
											<td><?= $detail_no; ?></td>
											<td><?= $detail->nomor_skdp; ?></td>
											<td><?= $detail->alamat_kantor; ?></td>
											<td><?= $detail->nama_kepala_kantor; ?></td>
											<td><?= $detail->periode_awal ?? "-"; ?></td>
											<td><?= $detail->periode_akhir; ?></td>
											<td>
												<?php if ($detail->dokumen_path) : ?>
													<a href="<?= base_url('upload/' . $detail->dokumen_path) ?>" target="_blank">Lihat
														Dokumen</a>
												<?php else : ?>
													-
												<?php endif; ?>

											</td>
											<td><?= !is_null($detail->dokumen_uploaded_at) ? date('d F Y H:i:s', strtotime($detail->dokumen_uploaded_at)) : '-' ?></td>
											<td><?= $detail->keterangan; ?></td>
											<td>
												<a onclick="deletedata(this)" data-id_detail_skdp="<?= $detail->id_detail_skdp; ?>"
													data-toggle="tooltip" data-placement="bottom" title="Hapus"
													class="btn btn-danger btn-sm delete text-white">Hapus</a>
												<div class="btn-group" role="group">
													<button class="btn btn-primary" data-toggle="modal"
														data-target="#editModal<?= $detail->id_detail_skdp; ?>">Ubah</button>


													<!-- modal upload -->
													<button class="btn btn-secondary" data-toggle="modal"
														data-target="#uploadModal<?= $detail->id_detail_skdp  ?>">Upload
														Dokumen</button>
												</div>
											</td>
										</tr>


										<!-- Modal Upload Dokumen -->
										<div class="modal fade" id="uploadModal<?= $detail->id_detail_skdp ?>" tabindex="-1" role="dialog"
											aria-labelledby="uploadModal<?= $detail->id_detail_skdp ?>Label" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="uploadModal<?= $detail->id_detail_skdp ?>Label">Upload Dokumen</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<!-- Form untuk upload dokumen -->
														<form method="post" action="<?= base_url('data_skdp/upload_dokumen') ?>"
															enctype="multipart/form-data">
															<input type="hidden" name="id" value="<?= $detail->id_detail_skdp ?>">
															<div class="form-group">
																<label for="dokumen">Pilih Dokumen (PDF/DOC/DOCX)</label>
																<input type="file" class="form-control" id="dokumen" name="dokumen"
																	accept=".pdf, .doc, .docx" required>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																<button type="submit" class="btn btn-primary">Upload</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>

										<!-- Modal Edit -->
										<div class="modal fade" id="editModal<?= $detail->id_detail_skdp; ?>" tabindex="-1" role="dialog"
											aria-labelledby="editModal<?= $detail->id_detail_skdp; ?>Label" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="editModal<?= $no; ?>Label">Ubah Data SKDP</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form method="post"
														action="<?= base_url('data_skdp/edit_detail_skdp/' . $detail->id_detail_skdp) ?>">
														<input type="hidden" name="id_detail_skdp" value="<?= $detail->id_detail_skdp; ?>">
														<div class="modal-body">
															<!-- Form untuk mengedit data -->

															<div class="form-group">
																<label for="nomor_skdp">Nomor SKDP</label>
																<input value="<?= $detail->nomor_skdp; ?>" autocomplete="off" type="text" name="nomor_skdp"
																	placeholder="Masukkan Nomor SKDP" class="form-control">
																<?= form_error('nomor_skdp', '<small class="text-danger mt-2">', '</small>') ?>
															</div>
															<div id="periodeInput">
																<div class="form-group" id="periode_awal_group">
																	<label for="periode_awal">Periode Awal</label>
																	<input value="<?= $detail->periode_awal; ?>" autocomplete="off" type="date"
																		name="periode_awal" class="form-control">
																	<?= form_error('periode_awal', '<small class="text-danger mt-2">', '</small>') ?>
																</div>
																<div class="form-group" id="periode_akhir_group">
																	<label for="periode_akhir">Periode Akhir</label>
																	<input value="<?= $detail->periode_akhir; ?>" autocomplete="off" type="date"
																		name="periode_akhir" class="form-control">
																	<?= form_error('periode_akhir', '<small class="text-danger mt-2">', '</small>') ?>
																</div>
															</div>
															<div class="form-group">
																<label for="keterangan">Keterangan (opsional)</label>
																<textarea name="keterangan" placeholder="Masukkan Keterangan (boleh kosong)"
																	class="form-control"><?= $detail->keterangan; ?></textarea>
																<?= form_error('keterangan', '<small class="text-danger mt-2">', '</small>') ?>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</form>
												</div>
											</div>
										</div>


									<?php
										$detail_no++;
									endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</td>
			</tr>
			<!-- endCollapse -->

		<?php
			$no++;
		endforeach;
		?>
	</tbody>
</table>

<style>
	/* CSS untuk mengubah warna tombol "OK" menjadi merah */
	.swal-button--confirm {
		background-color: red !important;
		/* Mengubah warna latar belakang tombol */
		border-color: red !important;
		/* Mengubah warna border tombol */
	}
</style>
<script>
	$(document).ready(function() {
		$('.select2').select2({
			theme: 'bootstrap',
			dropdownParent: $('#tambahModal')
		});

		$("#nama_kantor").on('change', function() {
			var nama_kantor = $(this).val();
			$.ajax({
				url: '<?= base_url('data_skdp/get_kantor') ?>',
				method: 'post',
				data: {
					nama_kantor: nama_kantor
				},
				success: function(response) {
					var data = JSON.parse(response);
					var alamat = $("#alamat_kantor");
					var nama_kepala_kantor = $("#nama_kepala_kantor");
					// check if alamat had select2
					if (alamat.hasClass('select2-hidden-accessible')) {
						console.log('destroy');
					} else {
						// add select2
						alamat.select2({
							theme: 'bootstrap',
							dropdownParent: $('#tambahModal')
						});
					}

					// check if nama_kepala_kantor had select2
					if (nama_kepala_kantor.hasClass('select2-hidden-accessible')) {
						console.log('destroy');
					} else {
						// add select2
						nama_kepala_kantor.select2({
							theme: 'bootstrap',
							dropdownParent: $('#tambahModal')
						});
					}

					if (data) {
						if (data.alamat == null) {
							$("#alamat_kantor").val('').trigger('change').attr('readonly', false).select2({
								theme: 'bootstrap',
								dropdownParent: $('#tambahModal')
							});
						} else {
							$("#alamat_kantor").select2('destroy').val(data.alamat).trigger('change').attr('readonly',
								true);
						}
						if (data.nama_karyawan == null) {
							$("#nama_kepala_kantor").val('').trigger('change').attr('readonly', false).select2({
								theme: 'bootstrap',
								dropdownParent: $('#tambahModal')
							});
						} else {
							$("#nama_kepala_kantor").select2('destroy').val(data.nama_karyawan).trigger('change').attr(
								'readonly',
								true);
						}

					} else {
						$("#alamat_kantor").val('').trigger('change').attr('readonly', false).select2({
							theme: 'bootstrap',
							dropdownParent: $('#tambahModal')
						});
						$("#nama_kepala_kantor").val('').trigger('change').attr('readonly', false).select2({
							theme: 'bootstrap',
							dropdownParent: $('#tambahModal')
						});
					}
				}
			});
		});
	});

	function deletedata(element) {
		var id_detail_skdp = $(element).data('id_detail_skdp');
		// alert(id_detail_skdp);
		swal({
			title: "Hapus Data?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#FF0000",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya",
		}, function() {
			window.location = "../data_skdp/hapus_skdp/" + id_detail_skdp;
		});
	}
</script>