<?php
class M_data_akta_sewa extends CI_Model {

    public function get_jumlah_akta_sewa() {
        $this->db->select('COUNT(id) as row');
        $this->db->from('akta_sewa');
        $query = $this->db->get();
        return $query->row();
    }
}
?>
