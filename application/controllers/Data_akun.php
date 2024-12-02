<?php
    class Data_akun extends CI_Controller{
        public function tampil_data_akun(){
            $data['data']=$this->model_data_akun->tampil_data();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_akun',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_akun(){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_akun');
            $this->load->view('templates_admin/footer');
        }

        public function tambah_akun_aksi(){
            $this->form_validation->set_rules('nama','Nama','required|trim',[
                'required' => 'Nama Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('level','Level','required|trim',[
                'required' => 'Level Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('nama_akun','Nama_akun','required|is_numeric|trim|is_unique[sys_akun.nama_akun]|max_length[6]',[
                'required' => 'NIK Tidak Boleh Kosong!',
                'is_numeric' => 'NIK Berupa Angka!',
                'is_unique' => 'NIK Sudah Digunakan!',
                'max_length'=> 'NIK Maksimal 6 Digit!',
                
            ]);
            $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',[
                'required' => 'Kata Sandi Tidak Boleh Kosong!',
                'matches' => 'Password Tidak Sama!',
                'min_length' => 'Password Minimal 5 Karakter'
            ]);
            $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',[
                'required' => 'Kata Sandi Tidak Boleh Kosong!',
                'matches' => 'Password Tidak Sama!',
                'min_length' => 'Password Minimal 5 Karakter'
            ]);
            
            
            $nama = $this->input->post('nama');
            $nama_akun = $this->input->post('nama_akun');
            $nama_akun = str_replace(' ','',$nama_akun);
            $password1 = $this->input->post('password1');
            $password1 = str_replace(' ','',$password1);
            $password2 = $this->input->post('password2');
            $password2 = str_replace(' ','',$password2);
            $level = $this->input->post('level');
            
            if($this->form_validation->run()==FALSE){
               $this->tambah_akun();
            }else{
                $data = array(
                    'nama' =>$nama,
                    'nama_akun' => $nama_akun,
                    'kata_sandi' =>password_hash($password2,PASSWORD_DEFAULT ),
                    'level' => $level
                );
                $this->model_data_akun->tambah_akun($data, 'sys_akun');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_akun/tampil_data_akun');
            }
        }

        public function edit_akun($nama_akun){
            $where = array('nama_akun'=> $nama_akun);
        
            $data['data'] = $this->model_data_akun->edit_akun($where,'sys_akun')->result();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_akun',$data);
            $this->load->view('templates_admin/footer');
        }

        public function edit_akun_aksi($nama_akun){
            $this->form_validation->set_rules('nama','Nama','required',[
                'required' => 'Nama Tidak Boleh Kosong!'
            ]);
            // $this->form_validation->set_rules('nama_akun','Nama_akun','required|trim|is_unique[sys_akun.nama_akun]|max_length[6]|numeric',[
            //     'required' => 'NIK Tidak Boleh Kosong!',
            //     'is_unique' => 'NIK Sudah Digunakan!',
            //     'max_length'=> 'NIK Maksimal 6 Digit!',
            //     'numeric' => 'NIK Berupa Angka!'
            // ]);
            $this->form_validation->set_rules('password_lama','Password_lama','required|trim',[
                'required' => 'Password Lama Tidak Boleh Kososng!'
            ]);
            $this->form_validation->set_rules('password_baru','Password_baru','required|trim|min_length[5]|matches[ulangi_password]',[
                'required' => 'Password Baru Tidak Boleh Kososng!',
                'min_length' => 'Password Minimal 5 Karakter',
                'matches' => 'Password Tidak Sama!',
            ]);
            $this->form_validation->set_rules('ulangi_password','Ulangi_password','required|trim|min_length[5]|matches[ulangi_password]',[
                'required' => 'Ulangi Password Tidak Boleh Kososng!',
                'min_length' => 'Password Minimal 5 Karakter',
                'matches' => 'Password Tidak Sama!',
                
            ]);

            $nama = $this->input->post('nama');
            $nama_akun_edited = $this->input->post('nama_akun');
            $nama_akun_edited = str_replace(' ','',$nama_akun_edited);
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $ulangi_password = $this->input->post('ulangi_passwoord');  
          

            if($this->form_validation->run()==FALSE){
                $this->edit_akun($nama_akun);
             }else{
                $result =  $this->db->get_where('sys_akun',['nama_akun'=>$nama_akun])->row_array();
                if(password_verify($password_lama,$result['kata_sandi'])){
                    $data = array(
                        'nama' =>$nama,
                        'nama_akun' => $nama_akun_edited,
                        'kata_sandi' =>password_hash($password_baru,PASSWORD_DEFAULT ),
                    );
                    
                    $where = array(
                        'nama_akun' =>$nama_akun
                    );
                    
                 $this->model_data_akun->edit_password_aksi($where, $data,'sys_akun');
                 $this->model_data_akun->edit_akun_aksi($where,$data,'sys_akun');
                 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengubah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');
                 redirect('data_akun/tampil_data_akun');
             }else{
                $this->edit_akun($nama_akun);
             }
        }
    }
        public function hapus_akun($nama_akun){
            $where = array(
                'nama_akun' =>$nama_akun
            );

            if($nama_akun=='admin'){
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_akun/tampil_data_akun');
            }else{
                $this->model_data_akun->hapus_akun($where,'sys_akun');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_akun/tampil_data_akun');
            }
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_akun->cari($cari);
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/hasil_pencarian', $data);
            $this->load->view('templates_admin/footer');
        }

        public function ubah_kata_sandi($nama_akun){
            
            $where = array('nama_akun'=> $nama_akun);
        
            $data['data'] = $this->model_data_akun->edit_akun($where,'sys_akun')->result();
            
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/edit_akun',$data);
            $this->load->view('templates_user/footer');
        }

        public function ubah_kata_sandi_aksi($nama_akun){
            $this->form_validation->set_rules('nama','Nama','required',[
                'required' => 'Nama Tidak Boleh Kosong!'
            ]);
       
            $this->form_validation->set_rules('password_lama','Password_lama','required|trim',[
                'required' => 'Password Lama Tidak Boleh Kososng!'
            ]);
            $this->form_validation->set_rules('password_baru','Password_baru','required|trim|min_length[5]|matches[ulangi_password]',[
                'required' => 'Password Baru Tidak Boleh Kososng!',
                'min_length' => 'Password Minimal 5 Karakter',
                'matches' => 'Password Tidak Sama!',
            ]);
            $this->form_validation->set_rules('ulangi_password','Ulangi_password','required|trim|min_length[5]|matches[ulangi_password]',[
                'required' => 'Ulangi Password Tidak Boleh Kososng!',
                'min_length' => 'Password Minimal 5 Karakter',
                'matches' => 'Password Tidak Sama!',
                
            ]);

            $nama = $this->input->post('nama');
            $nama_akun_edited = $this->input->post('nama_akun');                            
            $nama_akun_edited = str_replace(' ','',$nama_akun_edited);
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $ulangi_password = $this->input->post('ulangi_passwoord');  
          

            if($this->form_validation->run()==FALSE){
                $this->ubah_kata_sandi($nama_akun);
             }else{
                $result =  $this->db->get_where('sys_akun',['nama_akun'=>$nama_akun])->row_array();
                if(password_verify($password_lama,$result['kata_sandi'])){
                    $data = array(
                        'nama' =>$nama,
                        'nama_akun' => $nama_akun_edited,
                        'kata_sandi' =>password_hash($password_baru,PASSWORD_DEFAULT ),
                    );
                    
                    $where = array(
                        'nama_akun' =>$nama_akun
                    );
                    
                 $this->model_data_akun->edit_password_aksi($where, $data,'sys_akun');
                 $this->model_data_akun->edit_akun_aksi($where,$data,'sys_akun');
                 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengubah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');
                 redirect('dashboard_user');
             }else{
                $this->ubah_kata_sandi($nama_akun);
             }
        }
        }

}
?>