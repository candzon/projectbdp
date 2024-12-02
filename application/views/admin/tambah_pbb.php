<div class="container-fluid ">
<div class="row">
    <div class="col-sm-6 ml-auto mr-auto">
    <form method="post" action="<?php echo base_url('data_pbb/tambah_pbb_aksi')?>">
    
     <div class="form-group">
            <label for="">Tanggal Pembayaran</label>
                <input type="date" name="tanggal_pembayaran" class="form-control" value="<?php echo set_value('tanggal_pembayaran')?>" autocomplete="off">
                <?php echo form_error('tanggal_pembayaran','<div class="text-danger small ml-2 mt-2">','</div>');?>
            </div>

            <div class="form-group">
    <label for="">Nominal Pajak</label>
    <input id="nominal_pajak" value="<?php echo set_value('nominal_pajak')?>" autocomplete="off" type="text" name="nominal_pajak" placeholder="Masukkan Nominal Pajak" class="form-control">
    <?php echo form_error('nominal_pajak','<small class="text-danger mt-2">','</small>')?>
</div>

<script>
    var nominalPajak = document.getElementById('nominal_pajak');
    nominalPajak.addEventListener('keyup', function(e) {
        // Menghapus format sebelum memproses
        var value = nominalPajak.value.replace(/[^,\d]/g, '').toString();

        // Format ke dalam bentuk rupiah
        nominalPajak.value = formatRupiah(value, 'Rp ');
    });

    function formatRupiah(angka, prefix) {
        var numberString = angka.replace(/[^,\d]/g, '').toString(),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>


        <div class="modal-footer">  
        <?php echo anchor('data_pbb/tampil_data_pbb','<div class="btn btn-danger btn-sm hapus_pakar">Batal</div>')?>
        <button type="submit" class ="btn btn-sm btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>