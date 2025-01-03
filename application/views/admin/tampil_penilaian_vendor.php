<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Vendor</h1>
    </div>

    <!-- Flash Message -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading mb-4">

            <div class="d-flex justify-content-center">
                <form id="form-penilaian" action="<?= base_url('data_vendor_ga/tambah_penilaian_vendor_aksi') ?>" method="post" enctype="multipart/form-data">
                    <div class="col">
                        <div class="row mb-3">
                            <div class="col">
                                <h6>Keterangan Penilaian:</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nilai</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sangat Tidak Puas</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tidak Puas</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Cukup Puas</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Puas</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sangat Puas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="select-vendor" class="col-form-label">Nama Vendor</label>
                            <div class="col">
                                <select name="cari" id="select-vendor" class="form-control" style="width: 600;" required>
                                    <option value="">Pilih Vendor</option>
                                    <?php foreach ($vendor as $values) : ?>
                                        <option value="<?= $values->id_vendor; ?>"><?= $values->nama_vendor; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <h6>Tingkat Kepuasan Evaluasi</h6>
                        </div>
                        <?php if ($data != null): ?>
                            <?php foreach ($data as $item): ?>
                                <div class="row mt-4">
                                    <table class="table table-striped-columns">
                                        <tr>
                                            <h5><?= $item['kategori']->kode_kategori; ?> <?= $item['kategori']->keterangan; ?></h5>
                                            <th>No</th>
                                            <th>Aspek Penilaian</th>
                                            <th>Nilai</th>
                                        </tr>
                                        <tbody>
                                            <?php $detail_no = 1;
                                            foreach ($item['details'] as $detail):
                                            ?>
                                                <tr>
                                                    <td><?= $detail_no; ?></td>
                                                    <td><?= $detail->aspek_penilaian; ?></td>
                                                    <td>
                                                        <select name="nilai[<?= $detail->id_aspek_penilaian; ?>]" class="form-control" required>
                                                            <option value="">Pilih Nilai</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php $detail_no++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="row mt-4 d-flex justify-content-between">
                            <!-- <textarea name="komentar" id="komentar" placeholder="komentar"></textarea> -->
                            <button type="button" id="btn-submit" class="btn btn-primary">Selesai</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </script>
</div>

<!-- JavaScript SweetAlert -->
<script>
    document.getElementById('btn-submit').addEventListener('click', function(e) {
        Swal.fire({
            title: 'Konfirmasi Pengajuan',
            text: 'Apakah Anda yakin ingin menyelesaikan evaluasi ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim form jika pengguna menekan konfirmasi
                document.getElementById('form-penilaian').submit();
            }
        });
    });
</script>