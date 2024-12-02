<?php
    class Data_kantor extends CI_Controller{
        public function tampil_data_kantor(){
            $data['data']=$this->model_data_kantor->tampil_data();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_kantor(){
            $data['tampil_alamat'] = $this->model_data_alamat->tampil_data();

            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_kantor_aksi(){
            $this->form_validation->set_rules('nama_kantor','Nama_kantor','required|trim',[
                'required' => 'Nama Kantor Tidak Boleh Kosong!'
            ]);
            
            $nama_kantor = $this->input->post('nama_kantor');

            $cek = $this->model_data_kantor->cek($nama_kantor);
            if($cek==FALSE){
                if($this->form_validation->run()==FALSE){
                    $this->tambah_kantor();
                 }else{
                     $data = array(
                         'nama_kantor' =>$nama_kantor
                     );
                     $this->model_data_kantor->tambah_kantor($data, 'sys_kantor');
                     $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button></div>');
                     redirect('data_kantor/tampil_data_kantor');
                 }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Data Sudah Ada!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                $this->tambah_kantor();
            }
        }

        public function edit_kantor($id_kantor){
          
            $where = array('id_kantor'=> $id_kantor);
            $data['data'] = $this->model_data_kantor->edit_kantor($where,'sys_kantor')->result();
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function edit_kantor_aksi($id_kantor){
            $this->form_validation->set_rules('nama_kantor','Nama_kantor','required|trim',[
                'required' => 'Nama Kantor Tidak Boleh Kosong!'
            ]);
            
            $nama_kantor = $this->input->post('nama_kantor');

            if($this->form_validation->run()==FALSE){
                $this->edit_kantor($id_kantor);
             }else{
                $data = array(
                    'nama_kantor' =>$nama_kantor
                );

                 $where = array(
                    'id_kantor' =>$id_kantor
                 );
                 
                 $this->model_data_kantor->edit_kantor_aksi($where, $data, 'sys_kantor');
                 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');
                 redirect('data_kantor/tampil_data_kantor');
             }
        }

        public function hapus_kantor($id_kantor){
            $where = array(
                'id_kantor' =>$id_kantor
            );

            $this->model_data_kantor->hapus_kantor($where,'sys_kantor');
            $this->model_data_kantor->hapus_kantor($where,'sys_detail_kantor');

            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('data_kantor/tampil_data_kantor');
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_kantor->cari($cari);
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/hasil_pencarian_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        ///detail kantor
 
        public function detail_kantor($id_kantor){
            $data['total_harga_sewa']=$this->model_detail_kantor->harga_sewa($id_kantor);
            $data['data']=$this->model_detail_kantor->tampil_detail_kantor($id_kantor);
            $data['header_kantor']=$this->model_data_kantor->tampil_header_kantor($id_kantor);
            
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/detail_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_detail_kantor(){
            $data['tampil_karyawan'] = $this->model_detail_kantor->tampil_karyawan();
            $data['tampil_vendor_kendaraan'] = $this->model_detail_kantor->tampil_vendor_kendaraan();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_detail_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function tambah_detail_kantor_aksi($id_kantor){
        $this->form_validation->set_rules('nama_karyawan','Nama_karyawan','required|trim',[
            'required' => 'Nama Karyawan Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('mobil','Mobil','required|trim',[
                'required' => 'Data Mobil Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('plat_nomor','Plat_nomor','required|trim',[
                'required' => 'Plat Nomor Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('tahun','Tahun','required|trim|is_numeric',[
                'required' => 'Tahun Kendaraan Tidak Boleh Kosong!',
                'is_numeric' => 'Inputan Harus Berupa Angka!'
            ]);
            $this->form_validation->set_rules('nama_vendor_kendaraan','Nama_vendor_kendaraan','required|trim',[
                'required' => 'Nama Vendor Kendaraan Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('harga_sewa','Harga_sewa','required|trim|is_numeric',[
                'required' => 'Harga Sewa Tidak Boleh Kosong!',
                'is_numeric' => 'Inputan Harus Berupa Angka!'
            ]);
            $this->form_validation->set_rules('periode_awal','Periode_awal','required|trim',[
                'required' => 'Periode Awal Sewa Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('periode_akhir','Periode_akhir','required|trim',[
                'required' => 'Periode Akir Sewa Tidak Boleh Kosong!'
            ]);
            
            
            $pengguna = $this->input->post('nama_karyawan');
            $mobil = $this->input->post('mobil');
            $plat_nomor = $this->input->post('plat_nomor');
            $tahun = $this->input->post('tahun');
            $nama_vendor_kendaraan = $this->input->post('nama_vendor_kendaraan');
            $harga_sewa = $this->input->post('harga_sewa');
            $periode_awal = $this->input->post('periode_awal');
            $periode_akhir = $this->input->post('periode_akhir');
            $catatan = $this->input->post('catatan');
            
            if($this->form_validation->run()==FALSE){
               $this->tambah_detail_kantor();
            }else{
                $data = array(
                    'id_kantor'=>$id_kantor,
                    'pengguna' =>$pengguna,
                    'mobil' =>$mobil,
                    'plat_nomor' =>$plat_nomor,
                    'tahun' =>$tahun,
                    'nama_vendor_kendaraan' =>$nama_vendor_kendaraan,
                    'harga_sewa' =>$harga_sewa,
                    'periode_awal' =>$periode_awal,
                    'periode_akhir' =>$periode_akhir,
                    'catatan' =>$catatan,
                );
                $this->model_detail_kantor->tambah_detail_kantor($data, 'sys_detail_kantor');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_kantor/detail_kantor/'.$id_kantor);
            }
        }

        public function edit_detail_kantor($id_detail_kantor){
            $where = array('id_detail_kantor'=> $id_detail_kantor);
            $data['data'] = $this->model_detail_kantor->edit_detail_kantor($where,'sys_detail_kantor')->result();
            $data['karyawan']= $this->model_data_karyawan->tampil_data();  
            $data['vendor_kendaraan'] = $this->model_detail_kantor->tampil_vendor_kendaraan();

            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_detail_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function edit_detail_kantor_aksi($id_detail_kantor){
            $this->form_validation->set_rules('pengguna','Pengguna','required|trim',[
                'required' => 'Nama Pengguna Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('mobil','Mobil','required|trim',[
                'required' => 'Mobil Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('plat_nomor','Plat_nomor','required|trim',[
                'required' => 'Plat Nomor Kendaraan Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('tahun','Tahun','required|trim|is_numeric',[
                'required' => 'Tahun Kendaraan Tidak Boleh Kosong!',
                'is_numeric' => 'Inputan Harus Berupa Angka!'
            ]);
            $this->form_validation->set_rules('nama_vendor_kendaraan','Nama_vendor_kendaraan','required|trim',[
                'required' => 'Nama Vendor Kendaraan Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('harga_sewa','Harga_sewa','required|trim|is_numeric',[
                'required' => 'Harga Sewa Tidak Boleh Kosong!',
                'is_numeric' => 'Inputan Harus Berupa Angka!'
            ]);
          

            $id_kantor = $this->input->post('id_kantor');
            $pengguna = $this->input->post('pengguna');
            $mobil = $this->input->post('mobil');
            $plat_nomor = $this->input->post('plat_nomor');
            $tahun = $this->input->post('tahun');
            $nama_vendor_kendaraan = $this->input->post('nama_vendor_kendaraan');
            $harga_sewa = $this->input->post('harga_sewa');
            $catatan = $this->input->post('catatan');
            $periode_awal = $this->input->post('periode_awal');
            $periode_akhir = $this->input->post('periode_akhir');

            if($this->form_validation->run()==FALSE){
                $this->edit_detail_kantor($id_detail_kantor);
             }else{
                 $data = array(
                     'pengguna' =>$pengguna,
                     'mobil' => $mobil,
                     'plat_nomor' => $plat_nomor,
                     'tahun' =>$tahun,
                     'nama_vendor_kendaraan' => $nama_vendor_kendaraan,
                     'harga_sewa' =>$harga_sewa,
                     'periode_awal' =>$periode_awal,
                     'periode_akhir' =>$periode_akhir,
                     'catatan' => $catatan,
                 );

                 $where = array(
                    'id_detail_kantor' =>$id_detail_kantor
                 );

                 $this->model_detail_kantor->edit_detail_kantor_aksi($where, $data, 'sys_detail_kantor');
                 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');
                 redirect('data_kantor/detail_kantor/'.$id_kantor); 
             }
        }

        public function hapus_detail_kantor($id_detail_kantor,$id_kantor){
            $where = array(
                'id_detail_kantor' =>$id_detail_kantor
            );
            

            $this->model_detail_kantor->hapus_detail_kantor($where,'sys_detail_kantor');
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('data_kantor/detail_kantor/'.$id_kantor);
        }

        public function pencarian_detail_kantor(){
            $cari = $this->input->post('cari'); 
            $data['data']=$this->model_detail_kantor->cari($cari);
            $data['header_kantor']=$this->model_detail_kantor->harga_sewa_detail($cari);
                       
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/hasil_pencarian_detail_kantor',$data);
            $this->load->view('templates_admin/footer');
        }

        public function login(){
            $this->session->sess_destroy();
            $this->load->view('templates_admin/header');
            $this->load->view('admin/login');
            $this->load->view('templates_admin/footer');
        }
    }
?>