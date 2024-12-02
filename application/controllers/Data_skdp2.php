<?php
    class Data_skdp extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('model_data_skdp2'); // Memuat model di constructor
        }

        public function tampil_data_skdp() {
            $data['data'] = $this->model_data_skdp2->tampil_data();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_skdp2', $data);
            $this->load->view('templates_admin/footer');
        }

        

        

        

    }
?>
