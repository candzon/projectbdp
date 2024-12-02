<?php 
    class Dashboard_procurement extends CI_Controller{
        
        public function index(){
            $data['jumlah_akun']=$this->model_data_akun->jumlah_akun();
            $data['jumlah_masa_sewa']=$this->model_data_masa_sewa->jumlah_masa_sewa();
                
            $this->load->view('templates_procurement/header');
            $this->load->view('templates_procurement/sidebar');
            $this->load->view('procurement/dashboard',$data);
            $this->load->view('templates_procurement/footer');
        }
    }

    


    
?>