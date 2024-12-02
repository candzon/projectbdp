<?php 
    Class Data_vendor extends CI_Controller{
        public function tampil_data_vendor(){
            $data['data']=$this->model_data_vendor->tampil_data();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_vendor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_vendor(){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_vendor');
            $this->load->view('templates_admin/footer');
        }

        public function tambah_vendor_aksi(){
            $this->form_validation->set_rules('nama_vendor','Nama_vendor','required|trim',[
                'required' => 'Nama Vendor Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('pic','Pic','required|trim',[
                'required' => 'Nama PIC (Person In Contact) Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('nomor_telepon','Nomor_telepon','required|trim',[
                'required' => 'Nomor Telepon Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('email','Email','required|trim',[
                'required' => 'Email Tidak Boleh Kosong!'
            ]);
           
            
            $nama_vendor = $this->input->post('nama_vendor');
            $pic = $this->input->post('pic');
            $email = $this->input->post('email');
            $nomor_telepon = $this->input->post('nomor_telepon');
        
            
            if($this->form_validation->run()==FALSE){
               $this->tambah_vendor();
            }else{
                $data = array(
                    'nama_vendor_kendaraan' =>$nama_vendor,
                    'pic' => $pic,
                    'email' => $email,
                    'nomor_telepon' => $nomor_telepon
                );
                $this->model_data_vendor->tambah_vendor($data, 'sys_vendor_kendaraan');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_vendor/tampil_data_vendor');
            }
        }

        public function edit_vendor($id_vendor_kendaraan){
          
            $where = array('id_vendor_kendaraan'=> $id_vendor_kendaraan);
            $data['data'] = $this->model_data_vendor->edit_vendor($where,'sys_vendor_kendaraan')->result();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_vendor',$data);
            $this->load->view('templates_admin/footer');
        }


        public function edit_vendor_aksi($id_vendor_kendaraan){
            $this->form_validation->set_rules('nama_vendor','Nama_vendor','required|trim',[
                'required' => 'Nama Vendor Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('pic','Pic','required|trim',[
                'required' => 'Nama PIC (Person In Contact) Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('nomor_telepon','Nomor_telepon','required|trim',[
                'required' => 'Nomor Telepon Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('email','Email','required|trim',[
                'required' => 'Email Tidak Boleh Kosong!'
            ]);
           
            
            $nama_vendor = $this->input->post('nama_vendor');
            $pic = $this->input->post('pic');
            $email = $this->input->post('email');
            $nomor_telepon = $this->input->post('nomor_telepon');

            if($this->form_validation->run()==FALSE){
                $this->edit_vendor($id_vendor_kendaraan);
             }else{
                 $data = array(
                     'nama_vendor_kendaraan' =>$nama_vendor,
                     'pic' => $pic,
                     'email' => $email,
                     'nomor_telepon' => $nomor_telepon
                 );

                 $where = array(
                    'id_vendor_kendaraan' =>$id_vendor_kendaraan
                 );
                 
                 $this->model_data_vendor->edit_vendor_aksi($where, $data, 'sys_vendor_kendaraan');
                 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');
                 redirect('data_vendor/tampil_data_vendor');
             }
        }

        public function hapus_vendor($id_vendor_kendaraan){
            $where = array(
                'id_vendor_kendaraan' =>$id_vendor_kendaraan
            );

            $this->model_data_vendor->hapus_vendor($where,'sys_vendor_kendaraan');
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('data_vendor/tampil_data_vendor');
            
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_vendor->cari($cari);
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/hasil_pencarian_vendor_kendaraan', $data);
            $this->load->view('templates_admin/footer');
        }

      
    }
?>