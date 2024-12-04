<?php 
    class Data_alamat extends CI_Controller{
        public function tampil_alamat(){
            $data['data']=$this->model_data_alamat->tampil_data();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_alamat',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_alamat(){
            $query = $this->db->select_max('collapse_id')->get('sys_alamat');
            $last_collapse_id = $query->row()->collapse_id;
            $collapse_id = $last_collapse_id + 1;

            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_alamat', ['collapse_id' => $collapse_id]);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_alamat_aksi(){
            $this->form_validation->set_rules('nama_kantor','Nama_kantor','required|trim',[
                'required' => 'Nama Kantor Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('alamat','Alamat','required|trim',[
                'required' => 'Alamat Kantor Tidak Boleh Kosong!'
            ]);
            
            $nama_kantor = $this->input->post('nama_kantor');
            $alamat = $this->input->post('alamat');
            $collapse_id = $this->input->post('collapse_id');
           
            
            if($this->form_validation->run()==FALSE){
               $this->tambah_alamat();
            }else{
                $data = array(
                    'nama_kantor' =>$nama_kantor,
                    'alamat' =>$alamat,
                    'collapse_id' =>$collapse_id
                );
                $this->model_data_alamat->tambah_alamat($data, 'sys_alamat');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_alamat/tampil_alamat');
            }
        }

        public function edit_alamat($id_alamat){
          
            $where = array('id_alamat'=> $id_alamat);
            $data['data'] = $this->model_data_alamat->edit_alamat($where,'sys_alamat')->result();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_alamat',$data);
            $this->load->view('templates_admin/footer');
        }

        public function edit_alamat_aksi($id_alamat){
            $this->form_validation->set_rules('nama_kantor','Nama_kantor','required|trim',[
                'required' => 'Nama Kantor Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('alamat','Alamat','required|trim',[
                'required' => 'Alamat Kantor Tidak Boleh Kosong!'
            ]);
            
            $nama_kantor = $this->input->post('nama_kantor');
            $alamat = $this->input->post('alamat');
            
            if($this->form_validation->run()==FALSE){
                $this->edit_alamat($id_alamat);
             }else{
                $data = array(
                    'nama_kantor' =>$nama_kantor,
                    'alamat' =>$alamat
                );

                 $where = array(
                    'id_alamat' =>$id_alamat
                 );
                 
                 $this->model_data_alamat->edit_alamat_aksi($where, $data, 'sys_alamat');
                 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');
                 redirect('data_alamat/tampil_alamat');
             }
        }

        public function hapus_alamat($id_alamat){
            $where = array(
                'id_alamat' =>$id_alamat
            );
            $this->model_data_alamat->hapus_alamat($where,'sys_alamat');

            $where = array(
                'id_kantor' =>$id_alamat
            );
            $this->model_data_alamat->hapus_alamat($where,'sys_detail_kantor');

            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('data_alamat/tampil_alamat');
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
           
            $data['data']=$this->model_data_alamat->cari($cari);
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/hasil_pencarian_alamat',$data);
            $this->load->view('templates_admin/footer');
        }

    }
?>