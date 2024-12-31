<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluasi Penilaian Kinerja Supplier/Vendor</title>
    <style>
    .container {
        margin: 10px auto;
        width: 90%;
    }
    .header {
        text-align: center;
    }
    .table-header {
        margin-top: 18px;
    }
    .header img {
        margin: 0 13;
        width: 130px;
        height: auto;
    }
    .header h1 {
        font-size: 14px;
        margin: 0;
    }
    .header p {
        font-size: 12px;
        margin: 5px 0;
    }
    .section-title {
        text-align: center;
        background-color: #0070c0;
        color: #ffffff;
        padding: 3px;
        font-size: 13px;
        margin-top: 10px;
    }
    .table-container {
        margin-top: 3px;
    }
    .table-container table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }
    .table-container th, td {
        padding: 3px;
        text-align: center;
    }
    .table-container th {
        color: #ffffff;
    }
    .table-vendor table {
        width: 100%;
        padding: 0;
        margin: 0;
        border-collapse: collapse;
        font-size: 12px;
    }
    .table-vendor td {
        border: 0;
        padding: 3px;
        margin: 0;
        text-align: left;
    }
    .table-vendor p {
        font-weight: bold;
        margin: 0;
    }
    .table-signature table {
        margin-top: 25px;
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-size: 12px;
    }
    .table-signature td {
        border: 1;
        padding: 0;
    }
    .note {
        font-size: 12px;
        margin-top: 10px;
    }
    .circle {
        border: 2px solid black;
        border-radius: 50%;
        padding: 5px;
        display: inline-block;
    }
    tfoot tr {
    background-color: #f0f0f0;
    font-weight: bold;
    }
    tfoot td {
        padding: 5px;
        text-align: center;
    }
</style>

</head>
<body>
<div class="container">
        <div class="header">
            <p>Lampiran SE No. 021/SE/PBO/12/18</p>
            <div class="table-header">
                <table>
                    <tr>
                        <td><h1>FORMULIR EVALUASI PENILAIAN KINERJA SUPPLIER/VENDOR</h1></td>
                        <td><img alt="BCA Insurance Logo" src="<?php echo base_url('assets/img/logo.png'); ?>"/></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="section-title">PROFIL VENDOR</div>
        <div class="table-vendor">
            <table>
                <tbody>
                    <tr>
                        <td style="width:30%"><label>Nama Perusahaan</label></td>
                        <td>:</td>
                        <td><p><?php echo $vendor->nama_vendor; ?></p>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Alamat Kantor</label></td>
                        <td>:</td>
                        <td><p><?php echo $vendor->alamat; ?></p>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Nama User / PIC supplier</label></td>
                        <td>:</td>
                        <td><p><?php echo $vendor->nama; ?></p>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Email</label></td>
                        <td style="width:5%">:</td>
                        <td><p><?php echo $vendor->email; ?></p>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Telpon</label></td>
                        <td style="width:5%">:</td>
                        <td><p><?php echo $vendor->no_telepon_kantor; ?></p>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Jenis Pekerjaan</label></td>
                        <td style="width:5%">:</td>
                        <td><p><?php echo $vendor->jenis_vendor; ?></p>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Tgl Evaluasi</label></td>
                        <td style="width:5%">:</td>
                        <td><p><?php echo $tanggal_penilaian; ?></p>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="section-title">TINGKAT KEPUASAN EVALUASI</div>
        <div class="note">
            <p>Keterangan: Menunjukkan seberapa puas Anda terhadap standar pelayanan yang diberikan</p>
        </div>
        <div class="table-container">
            <table>
             <thead style="background-color:rgb(197, 149, 46);">
              <tr>
               <th colspan="2">
                Tingkat Kepuasan
               </th>
               <th colspan="2">
                Note
               </th>
              </tr>
             </thead>
             <tbody>
              <tr>
               <td>
                Sangat Puas
               </td>
               <td>
                5
               </td>
               <td>
                A1 Vendor Rutin (ATK, Percetakan dan Peralatan Kantor)
               </td>
              </tr>
              <tr>
               <td>
                Puas
               </td>
               <td>
                4
               </td>
               <td>
                A2 Vendor Renovasi
               </td>
              </tr>
              <tr>
               <td>
                Antara Puas dan Tidak Puas
               </td>
               <td>
                3
               </td>
               <td>
                A3 Vendor Rental
               </td>
              </tr>
              <tr>
               <td>
                Tidak Puas
               </td>
               <td>
                2
               </td>
               <td>
                B Komunikasi Vendor
               </td>
              </tr>
              <tr>
               <td>
                Sangat Tidak Puas
               </td>
               <td>
                1
               </td>
               <td>
                C Proses Administrasi Keuangan
               </td>
              </tr>
             </tbody>
            </table>
           </div>
        <div class="table-container">
            <table>
                <thead style="background-color:rgb(24, 84, 128);">
                    <tr>
                        <th>Aspek</th>
                        <th>Sub Aspek</th>
                        <th>Tingkat Kepuasan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penilaian as $aspek): ?>
                        <tr>
                            <td><?php echo $aspek->kode_kategori; ?></td>
                            <td><?php echo $aspek->aspek_penilaian; ?></td>
                            <td>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <?php if ($aspek->nilai == $i): ?>
                                        <span class="circle"><?php echo $i; ?></span>
                                    <?php else: ?>
                                        <?php echo $i; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Rata-rata</strong></td>
                        <td><strong><?php echo number_format($rata_rata, 2); ?>/5</strong></td>
                    </tr>
                </tfoot>
            </table>
            <hr>
        </div>
        <div class="table-signature">
            <table>
                <tr>
                    <td>Dinilai oleh</td>
                    <td>Disetujui oleh</td>
                </tr>
                <tr>
                    <td style="height: 98px;">&nbsp;</td>
                    <td style="height: 98px;">&nbsp;</td>
                </tr>
                <tr>
                    <td>(_____________________)</td>
                    <td>(_____________________)</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>