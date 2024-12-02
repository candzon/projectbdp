<?php 
    class Data_kendaraan extends CI_Controller{
        
        public function index(){
                            
            $data['data']=$this->model_data_kendaraan->tampil_data();
           
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_kendaraan',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tampil_data_kendaraan(){
            $data['data']=$this->model_data_kendaraan->tampil_data_kendaraan();
            $data['total_harga_sewa']=$this->model_detail_kantor->sewa_kendaraan();
           
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tampil_data_kendaraan',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tampil_data_kendaraan_building(){
            $data['data']=$this->model_data_kendaraan->tampil_data_kendaraan();
            $data['total_harga_sewa']=$this->model_detail_kantor->sewa_kendaraan();
           
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('admin/tampil_data_kendaraan_building',$data);
            $this->load->view('templates_user/footer');
        }

        public function pencarian_data_kendaraan(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_kendaraan->cari($cari);
            $data['total_harga_sewa']=$this->model_data_kendaraan->harga_sewa($cari);
      
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/hasil_pencarian_kendaraan', $data);
            $this->load->view('templates_admin/footer');
        }

        public function pencarian_data_kendaraan_building(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_kendaraan->cari($cari);
            $data['total_harga_sewa']=$this->model_data_kendaraan->harga_sewa($cari);
      
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('admin/hasil_pencarian_kendaraan_building', $data);
            $this->load->view('templates_user/footer');
        }

        public function unduhpdf(){
            $this->load->library('dompdf_gen');

            $data['data']=$this->model_data_kendaraan->tampil_data_kendaraan();
            $data['total_harga_sewa']=$this->model_detail_kantor->sewa_kendaraan();

            $tanggalcetak =[
                'tanggalcetak' =>  date("d/m/y")
            ];
            $this->session->set_userdata($tanggalcetak);
      
            
            $this->load->view('admin/unduhpdf',$data, $tanggalcetak);

            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("Data Sewa Kendaraan Operasional.pdf", array('Attachment' =>0));

            unset($_SESSION['tanggalcetak']);
        }
    }
?>