<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Vendor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #edf4f8; /* Soft BCA Blue */
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            background-color: #ffffff; /* White */
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .table {
            border: 1px solid #d1e7fd;
        }
        .table thead {
            background-color: #d1e7fd;
            color: #003399; /* Deep BCA Blue */
        }
        .btn-primary {
            background-color: #003399; /* Deep BCA Blue */
            border-color: #003399;
        }
        .btn-primary:hover {
            background-color: #002b80;
            border-color: #002b80;
        }
        h1, h5, h6 {
            color: #003399; /* Deep BCA Blue */
        }
        .form-control {
            border: 1px solid #003399;
        }
        .alert {
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0">Penilaian Vendor</h1>
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
                                    <select name="cari" id="select-vendor" class="form-control" required>
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
                                <textarea name="komentar" id="komentar" rows="4" class="form-control" placeholder="Masukkan komentar Anda di sini"></textarea>
                                <button type="button" id="btn-submit" class="btn btn-primary mt-2">Selesai</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-submit').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Konfirmasi Pengajuan',
                text: 'Apakah Anda yakin ingin menyelesaikan evaluasi ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#003399',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-penilaian').submit();
                }
            });
        });
    </script>
</body>
</html>
