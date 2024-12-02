// SkdpModel.php

public function delete_skdp($id_detail_skdp) {
    $this->db->where('id_detail_skdp', $id_detail_skdp);
    return $this->db->delete('nama_tabel_skdp'); // Replace 'nama_tabel_skdp' with your actual table name
}
