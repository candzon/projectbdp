<?php
    class Data_karyawan extends CI_Controller{
        public function tampil_data_karyawan(){
            
            $data['data']=$this->model_data_karyawan->tampil_data();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_karyawan',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_karyawan(){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_karyawan');
            $this->load->view('templates_admin/footer');
        }

        public function tambah_karyawan_aksi(){
            $this->form_validation->set_rules('nik','Nik','required|trim',[
                'required' => 'NIK Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('nama_karyawan','Nama_karyawan','required|trim',[
                'required' => 'Nama Karyawan Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('lokasi','Lokasi','required|trim',[
                'required' => 'Lokasi Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('divisi','Divisi','required|trim',[
                'required' => 'Divisi Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('departemen','Departemen','required|trim',[
                'required' => 'Departemen Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('jabatan','Jabatan','required|trim',[
                'required' => 'Jabatan Tidak Boleh Kosong!'
            ]);
           
            
            $nik = $this->input->post('nik');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $lokasi = $this->input->post('lokasi');
            $divisi = $this->input->post('divisi');
            $departemen = $this->input->post('departemen');
            $jabatan = $this->input->post('jabatan');
        
            
            if($this->form_validation->run()==FALSE){
               $this->tambah_karyawan();
            }else{
                $data = array(
                    'nik' =>$nik,
                    'nama_karyawan' => $nama_karyawan,
                    'lokasi' => $lokasi,
                    'divisi' => $divisi,
                    'departemen' => $departemen,
                    'jabatan' => $jabatan
                );
                $this->model_data_karyawan->tambah_karyawan($data, 'sys_karyawan');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_karyawan/tampil_data_karyawan');
            }
        }

        public function edit_karyawan($id_karyawan){
          
            $where = array('id_karyawan'=> $id_karyawan);
            $data['data'] = $this->model_data_karyawan->edit_karyawan($where,'sys_karyawan')->result();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_karyawan',$data);
            $this->load->view('templates_admin/footer');
        }

        public function edit_karyawan_aksi($id_karyawan){
            $this->form_validation->set_rules('nik','Nik','required|trim',[
                'required' => 'NIK Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('nama_karyawan','Nama_karyawan','required|trim',[
                'required' => 'Nama Karyawan Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('lokasi','Lokasi','required|trim',[
                'required' => 'Lokasi Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('divisi','Divisi','required|trim',[
                'required' => 'Divisi Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('departemen','Departemen','required|trim',[
                'required' => 'Departemen Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('jabatan','Jabatan','required|trim',[
                'required' => 'Jabatan Tidak Boleh Kosong!'
            ]);
           
            
            $nik = $this->input->post('nik');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $lokasi = $this->input->post('lokasi');
            $divisi = $this->input->post('divisi');
            $departemen = $this->input->post('departemen');
            $jabatan = $this->input->post('jabatan');

            if($this->form_validation->run()==FALSE){
                $this->edit_karyawan($id_karyawan);
             }else{
                 $data = array(
                    'nik' =>$nik,
                    'nama_karyawan' => $nama_karyawan,
                    'lokasi' => $lokasi,
                    'divisi' => $divisi,
                    'departemen' => $departemen,
                    'jabatan' => $jabatan
                 );

                 $where = array(
                    'id_karyawan' =>$id_karyawan
                 );
                 
                 $this->model_data_karyawan->edit_karyawan_aksi($where, $data, 'sys_karyawan');
                 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');
                 redirect('data_karyawan/tampil_data_karyawan');
             }
        }

        public function hapus_karyawan($id_karyawan){
            $where = array(
                'id_karyawan' =>$id_karyawan
            );

            $this->model_data_karyawan->hapus_karyawan($where,'sys_karyawan');
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('data_karyawan/tampil_data_karyawan');
            
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_karyawan->cari($cari);
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/hasil_pencarian_karyawan', $data);
            $this->load->view('templates_admin/footer');
        }
    }
?>