<?php 
    class Dashboard_user extends CI_Controller{
        
        public function index(){
            $data['jumlah_akun']=$this->model_data_akun->jumlah_akun();
            $data['jumlah_masa_sewa']=$this->model_data_masa_sewa->jumlah_masa_sewa();

            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/dashboard',$data);
            $this->load->view('templates_user/footer');
        }
    }

    

    
?>