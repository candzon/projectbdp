<?php
class model_data_masa_sewa extends CI_Model
{
    public function tampil_data()
    {
        $result = $this->db->query("SELECT
            id_detail_kantor,sys_karyawan.nama_karyawan,mobil,plat_nomor,tahun,sys_vendor_kendaraan.nama_vendor_kendaraan,harga_sewa,periode_awal,periode_akhir,catatan,
            DATEDIFF(periode_akhir, CURDATE()) AS days
            FROM sys_detail_kantor 
            INNER JOIN sys_vendor_kendaraan 
            ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan 
            ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            WHERE DATEDIFF(periode_akhir, CURDATE()) <30
            ");

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function jumlah_masa_sewa()
    {
        $result = $this->db->query("SELECT COUNT(*) as jumlah
            FROM sys_detail_kantor INNER JOIN sys_vendor_kendaraan 
            ON sys_vendor_kendaraan.id_vendor_kendaraan = sys_detail_kantor.nama_vendor_kendaraan 
            INNER JOIN sys_karyawan 
            ON sys_karyawan.id_karyawan = sys_detail_kantor.pengguna 
            WHERE DATEDIFF(periode_akhir, CURDATE()) <30
            ");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }
}
