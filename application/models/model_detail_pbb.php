<?php
class Model_Detail_pbb extends CI_Model {
    public function tampil_detail_pbb($sys_detail_pbb) {
        $result = $this->db->query("SELECT * FROM sys_detail_pbb ORDER BY id DESC");

        // Menyusun query untuk mengambil data dari sys_detail_pbb dan sys_pbb
        $this->db->select('sys_detail_pbb.id_detail_pbb, sys_detail_pbb.pbb, sys_pbb.jumlah_pembayaran, sys_detail_pbb.tanggal_pembayaran');
        $this->db->from('sys_detail_pbb');
        $this->db->join('sys_pbb', 'sys_pbb.id = sys_detail_pbb.id_pbb');
        $this->db->where('sys_pbb.id', $id_pbb); // Menggunakan id_pbb sebagai filter
        $this->db->order_by('sys_detail_pbb.id_detail_pbb', 'DESC');

        
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return FALSE;
            }
    }

    public function tampil_pbb() {
        $result = $this->db->query("SELECT data_pbb, nama_pbb FROM sys_detail_pbb ORDER data_pbb");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }


    public function tambah_detail_pbb($data,$table){
        $this->db->insert($table,$data);
    }

    public function harga_sewa($data_pbb){
        $result = $this->db->query("SELECT SUM(harga_sewa) AS harga_sewa FROM sys_detail_pbb WHERE data_pbb = '$data_pbb'");
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    } 

    public function edit_detail_pbb($where, $table)
    {
       return $this->db->get_where($table, $where);
    }

    public function edit_detail_pbb_aksi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_detail_pbb($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cari($cari){
        $result = $this->db->query("SELECT data_detail_pbb, sys_pbb.nama_pbb, mobil, plat_nomor, tahun, sys_vendor_kendaraan.nama_vendor_kendaraan, harga_sewa, periode_awal, periode_akhir, catatan 
        FROM sys_detail_pbb
        INNER JOIN sys_vendor_kendaraan ON sys_vendor_kendaraan.data_vendor_kendaraan = sys_detail_pbb.nama_vendor_kendaraan 
        INNER JOIN sys_pbb ON sys_pbb.data_pbb = sys_detail_pbb.pengguna 
        WHERE plat_nomor = '$cari'
        ORDER BY data_detail_pbb 
        DESC");
       
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }

    public function sewa_kendaraan(){
        $result = $this->db->query("SELECT SUM(harga_sewa) AS id FROM sys_detail_pbb");
        
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }

    public function get_data_between_dates($periode_awal, $periode_akhir) {
        $this->db->where('masa_berlaku >=', $periode_awal);
        $this->db->where('masa_berlaku <=', $periode_akhir);
        $query = $this->db->get('nama_tabel'); // Ganti dengan nama tabel yang sesuai
        return $query->result();
    }
}
?>