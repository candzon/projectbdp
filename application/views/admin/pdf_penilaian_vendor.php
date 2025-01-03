<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Evaluasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .container {
            width: 100%;
            padding: 10px;
        }

        .header {
            text-align: right;
            font-size: 10px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
        }

        .form-section {
            margin: 15px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .notes {
            font-size: 11px;
            margin-bottom: 10px;
        }

        .signature {
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
        }

        .signature div {
            text-align: center;
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            Lampiran SE No.021/SE/PB01/12/18
        </div>
        <div class="title">
            FORMULIR EVALUASI PENILAIAN KINERJA SUPPLIER/VENDOR
        </div>

        <div class="form-section">
            <strong>PROFIL VENDOR</strong>
            <br>
            <table>

                <tr>
                    <td>Nama Perusahaan: <?= $vendor_data['nama_vendor'] ?></td>
                    <td>Email: <?= $vendor_data['email'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Kantor: <?= $vendor_data['alamat'] ?></td>
                    <td>Telpon: <?= $vendor_data['no_telepon_kantor'] ?></td>
                </tr>
                <tr>
                    <td>Nama User / PIC Vendor: <?= $vendor_data['nama'] ?></td>
                    <td>Tgl Evaluasi: <?= date('d F Y H:i:s', strtotime($vendor_data['tgl_evaluasi'])) ?></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <strong>TINGKAT KEPUASAN EVALUASI</strong>
            <div class="notes">
                Tingkat Kepuasan : Menunjukkan seberapa puas Anda terhadap standar pelayanan yang diberikan
            </div>
            <table>
                <tr>
                    <th>Tingkat Kepuasan</th>
                    <th>Note</th>
                </tr>
                <tr>
                    <td>Sangat Puas - 5</td>
                    <td>A1 Vendor Rutin (ATK, Percetakan dan Peralatan Kantor)</td>
                </tr>
                <tr>
                    <td>Puas - 4</td>
                    <td>A2 Vendor Renovasi</td>
                </tr>
                <tr>
                    <td>Antara Puas dan Tidak Puas - 3</td>
                    <td>A3 Vendor Rental</td>
                </tr>
                <tr>
                    <td>Tidak Puas - 2</td>
                    <td>B Komunikasi Vendor</td>
                </tr>
                <tr>
                    <td>Sangat Tidak Puas - 1</td>
                    <td>C Proses Administrasi Keuangan</td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <table>
                <tr>
                    <th colspan="2">A1. Pengadaan Barang</th>
                    <th>Tingkat Kepuasan</th>
                </tr>
                <?php foreach ($penilaian_A1 as $nilai) : ?>
                    <tr>
                        <td><?= $nilai['aspek_penilaian'] ?></td>
                        <td>Pengiriman tepat waktu</td>
                        <td><?= $nilai['nilai'] ?></td>
                    </tr>
                    <tr>
                        <td><?= $nilai['aspek_penilaian'] ?></td>
                        <td>Pengiriman supply barang tepat waktu</td>
                        <td><?= $nilai['nilai'] ?></td>
                    </tr>
                    <tr>
                        <td><?= $nilai['aspek_penilaian'] ?></td>
                        <td>Kemudahan pemesanan kelengkapan barang yang digunakan</td>
                        <td><?= $nilai['nilai'] ?></td>
                    </tr>
                    <tr>
                        <td><?= $nilai['aspek_penilaian'] ?></td>
                        <td>Kecepatan penggantian peralatan yang rusak</td>
                        <td><?= $nilai['nilai'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="form-section">
            <table>
                <tr>
                    <th colspan="2">A2. Kualitas Pekerjaan</th>
                    <th>Tingkat Kepuasan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Kehadiran Karyawan</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Komunikatif dan inisiatif karyawan dalam pekerjaan</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Penampilan karyawan</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Tindak lanjut terhadap keluhan</td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Hasil akhir penyelesaian pekerjaan</td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <table>
                <tr>
                    <th colspan="2">A3. Rental</th>
                    <th>Tingkat Kepuasan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Penerimaan kendaraan sesuai waktu yang ditentukan</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Penerimaan kendaraan dalam kondisi siap pakai</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pengurusan perpanjangan STNK tepat waktu</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Service rutin kendaraan dilakukan dengan tuntas</td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Harga yang kompetitif dan melalui proses proses piching</td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <table>
                <tr>
                    <th colspan="2">B. Komunikasi</th>
                    <th>Tingkat Kepuasan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Vendor mudah dihubungi</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Vendor ramah dan hangat melayani</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Vendor cepat respon dalam menerima komplain</td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <table>
                <tr>
                    <th colspan="2">C. Proses Administrasi Keuangan</th>
                    <th>Tingkat Kepuasan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tagihan pembayaran datang sebelum jatuh tempo</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tagihan pembayaran jelas dan akurat</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Kelengkapan dokumen pembayaran lengkap</td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="signature">
            <table>
                <tr>
                    <td style="text-align:center;">Dinilai oleh<br><br>___________________________</td>
                    <td style="text-align:center;">Disetujui oleh<br><br>___________________________</td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>