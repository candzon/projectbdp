<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Vendor</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading mb-4">

            <div class="d-flex justify-content-center">
                <form id="form-penilaian" action="<?= base_url('data_vendor_ga/tambah_penilaian_vendor_aksi') ?>" method="post" enctype="multipart/form-data">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="select-vendor" class="col-form-label">Nama Vendor</label>
                            <div class="col">
                                <select name="cari" id="select-vendor" class="form-control" style="width: 600;" required>
                                    <option value="">Pilih Vendor</option>
                                    <?php foreach ($data as $values) : ?>
                                        <option value="<?= $values->id_vendor; ?>"><?= $values->nama_vendor; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <h6>Tingkat Kepuasan Evaluasi</h6>
                        </div>
                        <!-- Table Penilaian A1 -->
                        <div class="row mt-4">
                            <table class="table table-striped-columns">
                                <tr>
                                    <h5>A1 Pengadaan Barang</h5>
                                    <th>No</th>
                                    <th>Aspek Penilaian</th>
                                    <th>Nilai</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pengiriman tepat Waktu</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pengiriman supply barang tepat waktu</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kemudahan pemesanan kelengkapan barang yang digunakan</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Kecepatan penggantian peralatan yang rusak </td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Penilaian A2 -->
                        <div class="row mt-4">
                            <table class="table table-striped-columns">
                                <tr>
                                    <h5>A2 Kualitas Pekerjaan</h3>
                                        <th>No</th>
                                        <th>Aspek Penilaian</th>
                                        <th>Nilai</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kehadiran Karyawan</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Komunikatif dan inisiatif karyawan dalam pekerjaan</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Penampilan karyawan</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Tindak lanjut terhadap keluhan</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Hasil akhir penyelesaian pekerjaan</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Penilaian A3 -->
                        <div class="row mt-4">
                            <table class="table table-striped-columns">
                                <tr>
                                    <h5>A3 Rental</h3>
                                        <th>No</th>
                                        <th>Aspek Penilaian</th>
                                        <th>Nilai</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Penerimaan kendaraan sesuai waktu yang ditentukan</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Penerimaan kendaraan dalam kondisi siap pakai</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pengurusan perpanjangan STNK tepat waktu</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Service rutin kendaraan dilakukan dengan tuntas </td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Harga yang kompetitif dan melalui proses proses piching</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Penilaian B -->
                        <div class="row mt-4">
                            <table class="table table-striped-columns">
                                <tr>
                                    <h5>B Komunikasi</h3>
                                        <th>No</th>
                                        <th>Aspek Penilaian</th>
                                        <th>Nilai</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Vendor mudah dihubungi</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Vendor ramah dan hangat melayani</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Vendor cepat respon dalam menerima komplain </td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Respon bantuan saat keadaan darurat </td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Penilaian C -->
                        <div class="row mt-4">
                            <table class="table table-striped-columns">
                                <tr>
                                    <h5>C Proses Administrasi Keuangan</h3>
                                        <th>No</th>
                                        <th>Aspek Penilaian</th>
                                        <th>Nilai</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tagihan pembayaran datang sebelum jatuh tempo </td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tagihan pembayaran jelas dan akurat </td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kelengkapan dokumen pembayaran lengkap</td>
                                        <td>
                                            <select name="nilai[]" id="nilai" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-4 d-flex justify-content-between">
                            <textarea name="komentar" id="komentar" placeholder="komentar"></textarea>
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
    document.getElementById('btn-submit').addEventListener('click', function (e) {
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