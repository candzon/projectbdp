<script src="https://code.jquery.com/jquery-3.7.1.min.js"
	integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Tombol Tambah -->
<?php if ($this->session->flashdata('message')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('message'); ?>
	</div>
<?php endif; ?>

<div class="d-flex justify-content-between mb-3">
	<button class="btn btn-success" type="button" id="btnTambah" data-toggle="modal" data-target="#tambahModal">+
		Tambah</button>
</div>

<!-- Form Pencarian -->
<div class="mb-3">
	<input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan kolom apapun...">
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
		$groupedData = [];

		// Kelompokkan data berdasarkan nama kantor
		foreach ($data as $detail_skdp) {
			$groupedData[$detail_skdp->nama_kantor][] = $detail_skdp;
		}

		// Loop untuk menampilkan data yang sudah dikelompokkan
		foreach ($groupedData as $nama_kantor => $details):
			usort($details, function ($a, $b) {
				return strtotime($b->periode_akhir) - strtotime($a->periode_akhir);
			});

			$firstDetail = $details[0]; // Data pertama dalam grup untuk ditampilkan di baris utama
		?>
			<tr class="searchable">
				<td><?= $no; ?></td>
				<td><?= $nama_kantor; ?></td>
				<td><?= $firstDetail->nomor_skdp; ?></td>
				<td><?= $firstDetail->periode_awal; ?></td>
				<td><?= $firstDetail->periode_akhir; ?></td>
				<td>
					<div class="btn-group" role="group">
						<button class="btn btn-primary" type="button" data-toggle="collapse"
							data-target="#collapse<?= $no; ?>">Detail</button>
						<a href="previewFile?nomorskdp=<?= $firstDetail->nomor_skdp ?>" target="_blank" class="btn btn-secondary"
							type="">
							<i class="fas fa-eye"></i> Lihat
						</a>
					</div>
				</td>
			</tr>

			<!-- Accordion detail untuk grup nama kantor yang sama -->
			<tr id="collapse<?= $no; ?>" class="collapse searchable">
				<td colspan="6">
					<div class="card">
						<div class="card-header">
							<strong>Detail Kantor: <?= $nama_kantor; ?></strong>
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
									$subNo = 1;
									foreach ($details as $detail):
									?>
										<tr>
											<td><?= $subNo++; ?></td>
											<td><?= $detail->nomor_skdp; ?></td>
											<td><?= $detail->alamat_kantor; ?></td>
											<td><?= $detail->nama_kepala_kantor; ?></td>
											<td><?= $detail->periode_awal; ?></td>
											<td><?= $detail->periode_akhir; ?></td>
											<td>
												<a href="<?= base_url('upload/file/' . $detail->dokumen) ?>" target="_blank">
													<i class="fas fa-download"></i> Unduh
												</a>
											</td>
											<td><?= $detail->tgl_upload_dokumen; ?></td>
											<td><?= $detail->keterangan; ?></td>
											<td>
												<a href="<?= base_url('data_skdp/hapus/' . $detail->id_skdp); ?>" class="btn btn-danger btn-sm"
													onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
													<i class="fas fa-trash"></i> Hapus
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</td>
			</tr>
		<?php $no++; endforeach; ?>
	</tbody>
</table>

<script>
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        
        // Filter baris tabel yang memiliki kelas "searchable"
        $("#dataTabel .searchable").filter(function() {
            // Periksa apakah setiap baris tabel mengandung nilai pencarian
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>
