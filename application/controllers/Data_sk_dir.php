<?php 
    class Data_sk_dir extends CI_Controller{
        
        public function tampil_data(){

            $data['data']=$this->model_data_sk_dir->tampil_data();

            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/data_sk_dir',$data);
            $this->load->view('templates_user/footer');
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_sk_dir->cari($cari);
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/hasil_pencarian_sk_dir', $data);
            $this->load->view('templates_user/footer');
        }

        public function detail_data_sk_dir($nomor_sk){
            do{
                $x=$data['data']=$this->model_data_antrian->cekloop($nomor_sk);var_dump($x);die;
                if($x==NULL){
                    echo "data  <br>";
                }else{

                }
            }while($x!=NULL);
        }
    }
?>