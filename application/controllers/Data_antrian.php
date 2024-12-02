<?php
    class Data_antrian extends CI_Controller{
        
        public function tampil_data(){

            $data['data']=$this->model_data_antrian->tampil_data();
           
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/data_antrian', $data);
            $this->load->view('templates_user/footer');
        }

        
        public function detail_antrian($id){

            $data['data']= $this->model_data_antrian->tampil_detail_antrian($id);
                
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/detail_antrian',$data);
            $this->load->view('templates_user/footer');
        }

        public function tambah_antrian(){
            $kode=0;
            $data['kodeunik'] = $this->model_data_antrian->buat_kode($kode);
            
            $data['prioritas']= $this->model_data_antrian->prioritas();
            $data['jenis']= $this->model_data_antrian->jenis();
            $data['pengajuan']= $this->model_data_antrian->pengajuan();

            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/tambah_antrian',$data);   
            $this->load->view('templates_user/footer');
        }
 
        public function tambah_antrian_aksi(){
           
            $this->form_validation->set_rules('rr','Rr','required',[
                'required' => 'Nomor RR Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('perihal','Perihal','required',[
                'required' => 'Perihal Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('prioritas','Prioritas','required',[
                'required' => 'Prioritas Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('pemohon','Pemohon','required',[
                'required' => 'Nama Pemohon Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('disetujui','Disetujui','required',[
                'required' => 'Pemberi Persetujuan Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('unit_kerja','Unit_kerja','required',[
                'required' => 'Unit Kerja Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('jenis','Jenis','required',[
                'required' => 'Jenis Dokumen Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('registrasi','Registrasi','required',[
                'required' => 'Tanggal Registrasi Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('target_selesai','Target_selesai','required',[
                'required' => 'Target Selesai Tidak Boleh Kosong!'
            ]);
            $this->form_validation->set_rules('pengajuan','Pengajuan','required',[
                'required' => 'Jenis Pengajuan Tidak Boleh Kosong!'
            ]);
            
            $rr = $this->input->post('rr');
            $pengajuan = $this->input->post('pengajuan');
            $perihal = $this->input->post('perihal');
            $prioritas = $this->input->post('prioritas'); 
            $pemohon = $this->input->post('pemohon');
            $disetujui = $this->input->post('disetujui'); 
            $unit_kerja = $this->input->post('unit_kerja'); 
            $jenis = $this->input->post('jenis');
            $registrasi = $this->input->post('registrasi');
            $target_selesai = $this->input->post('target_selesai');
            $catatan = $this->input->post('catatan');

               
            if($this->form_validation->run()==FALSE){
               $this->tambah_antrian();
            }else{
                if($jenis=='SK Direksi'){
                    $data1 = array(
                        'rr' =>$rr,
                        'pengajuan' => $pengajuan,
                        'perihal' => $perihal,
                        'prioritas' => $prioritas,
                        'pemohon' => $pemohon,
                        'disetujui' =>$disetujui,
                        'unit_kerja' => $unit_kerja,
                        'jenis' => $jenis,
                        'registrasi' => $registrasi,
                        'target_selesai' => $target_selesai,
                        'catatan' => $catatan,
                    );
                    $id_sk_dir=0;
                    $this->model_data_antrian->tambah_antrian($data1, 'sys_antrian');
                    $data2 = array(
                        'jenis'=>$jenis,
                        'status' => $pengajuan,
                        'perihal' => $perihal,
                        'keterangan' => $catatan,
                    );
                    $this->model_data_sk_dir->tambah_sk_dir($data2, 'sys_sk_dir');
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('data_antrian/tampil_data');
                }else if($jenis=='SE Direksi'){
                    $data1 = array(
                        'rr' =>$rr,
                        'pengajuan' => $pengajuan,
                        'perihal' => $perihal,
                        'prioritas' => $prioritas,
                        'pemohon' => $pemohon,
                        'disetujui' =>$disetujui,
                        'unit_kerja' => $unit_kerja,
                        'jenis' => $jenis,
                        'registrasi' => $registrasi,
                        'target_selesai' => $target_selesai,
                        'catatan' => $catatan,
                    );
                    $id_sk_dir=0;
                    $this->model_data_antrian->tambah_antrian($data1, 'sys_antrian');
                    $data2 = array(
                        'jenis'=>$jenis,
                        'status' => $pengajuan,
                        'perihal' => $perihal,
                        'keterangan' => $catatan,
                    );
                    $this->model_data_sk_dir->tambah_sk_dir($data2, 'sys_sk_dir');
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('data_antrian/tampil_data');
                }else{
                    $data1 = array(
                        'rr' =>$rr,
                        'pengajuan' => $pengajuan,
                        'perihal' => $perihal,
                        'prioritas' => $prioritas,
                        'pemohon' => $pemohon,
                        'disetujui' =>$disetujui,
                        'unit_kerja' => $unit_kerja,
                        'jenis' => $jenis,
                        'registrasi' => $registrasi,
                        'target_selesai' => $target_selesai,
                        'catatan' => $catatan,
                    );
                  
                    $this->model_data_antrian->tambah_antrian($data1,'sys_antrian');
                    $data2 = array(
                        'jenis'=>$jenis,
                        'status' => $pengajuan,
                        'perihal' => $perihal,
                        'keterangan' => $catatan,
                    );
                    $this->model_data_sk_dir->tambah_sk_dir($data2,'sys_sk_dir');
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('data_antrian/tampil_data');
                }
            }
        }

        public function proses_antrian($id,$pengajuan){
            $where = array('id'=> $id);

            if($pengajuan=='Baru'){
                $data['antrian']= $this->model_data_antrian->antrian($id);
                $data['status']= $this->model_data_antrian->status();    
                
                $this->load->view('templates_user/header');
                $this->load->view('templates_user/sidebar');
                $this->load->view('user/proses_sk_dir',$data);   
                $this->load->view('templates_user/footer');
            }else{
                $data['antrian_revisi']= $this->model_data_antrian->antrian_revisi($id);
                $data['status']= $this->model_data_antrian->status();
                $data['sk_dir_rev']= $this->model_data_sk_dir->sk_dir_rev();   
            
                $this->load->view('templates_user/header');
                $this->load->view('templates_user/sidebar');
                $this->load->view('user/proses_sk_dir_rev',$data);   
                $this->load->view('templates_user/footer');
            }
        }

        public function proses_antrian_aksi($id,$pengajuan){
           
            // $this->form_validation->set_rules('penerbitan','Penerbitan','required',[
            //     'required' => 'Nomor SK/SE Tidak Boleh Kosong!'
            // ]);
            
            $status_terakhir_readonly = $this->input->post('status_terakhir_readonly');
            $status_terakhir = $this->input->post('status_terakhir');
            $penerbitan = $this->input->post('penerbitan');
            $catatan = $this->input->post('catatan');
            $referensi_ketentuan= $this->input->post('referensi_ketentuan');    
            $mencabut_ketentuan = $this->input->post('mencabut_ketentuan');
            $ketentuan_pengganti =$this->input->post('ketentuan_pengganti');

            // if($this->form_validation->run()==FALSE){
                $this->proses_antrian($id,$pengajuan);
            //  }else{
                if($status_terakhir==NULL){
                    $data = array(
                        'status_terakhir' =>$status_terakhir_readonly,
                        'penerbitan' =>$penerbitan,
                        'catatan' => $catatan
                    );
                    $data2 = array(
                        'referensi_ketentuan' =>$referensi_ketentuan,
                        'flag' => '1',
                        'keterangan' => $catatan
                    );
                    $where = array('id'=> $id);
                    $this->model_data_antrian->proses_antrian($where,$data,'sys_antrian');
                    $this->model_data_sk_dir->proses_sk_dir($where,$data2,'sys_sk_dir');
                    
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengubah Data Gejala<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('data_antrian/tampil_data');
                }else{
                            
                $data = array(
                    'status_terakhir' =>$status_terakhir,
                    'penerbitan' =>$penerbitan,
                    'catatan' => $catatan
                );
                $data2 = array( 
                    'referensi_ketentuan' =>$referensi_ketentuan,
                    'nomor_sk' =>$penerbitan,
                    'keterangan' => $catatan,
                    'flag' => '1',
                    'publish' => date("Y-m-d H:i:s"),
                );
                $where = array('id'=> $id);
                
                $this->model_data_antrian->proses_antrian($where,$data,'sys_antrian');
                $this->model_data_sk_dir->proses_sk_dir($where,$data2,'sys_sk_dir');
               
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengubah Data Gejala<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_antrian/tampil_data');
                }
            //  }
        }

        public function proses_antrian_aksi_rev($id,$pengajuan){
            // $this->form_validation->set_rules('penerbitan','Penerbitan','required',[
            //     'required' => 'Nomor SK/SE Tidak Boleh Kosong!'
            // ]);

            $status_terakhir_readonly = $this->input->post('status_terakhir_readonly');
            $status_terakhir = $this->input->post('status_terakhir');
            $penerbitan = $this->input->post('penerbitan');
            $referensi_ketentuan= $this->input->post('referensi_ketentuan');
            $mencabut_ketentuan = $this->input->post('mencabut_ketentuan');
            $ketentuan_pengganti =$this->input->post('ketentuan_pengganti');
            $catatan =$this->input->post('catatan');

            // if($this->form_validation->run()==FALSE){
                $this->proses_antrian($id,$pengajuan);
            //  }else{
                if($status_terakhir==NULL){
                    $data = array(
                        'status_terakhir' =>$status_terakhir_readonly,
                        'catatan' => $catatan,
                        'penerbitan' => $penerbitan,
                    );
                    $data2 = array(
                        'nomor_sk' =>$penerbitan,
                        'referensi_ketentuan' =>$referensi_ketentuan,
                        'mencabut_ketentuan' =>$mencabut_ketentuan,
                        'ketentuan_pengganti' => $ketentuan_pengganti,
                        'keterangan' => $catatan,
                        'flag' => '1',
                    );
                    $where = array('id'=> $id);
                    $this->model_data_antrian->proses_antrian($where,$data,'sys_antrian');
                    $this->model_data_sk_dir->proses_sk_dir($where,$data2,'sys_sk_dir');
                    
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengubah Data Gejala<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('data_antrian/tampil_data');
                }else{
                            
                $data = array(
                    'status_terakhir' =>$status_terakhir,
                    'catatan' => $catatan,
                    'penerbitan' => $penerbitan,
                );
    
                $data2 = array( 
                    'nomor_sk' =>$penerbitan,
                    'referensi_ketentuan' =>$referensi_ketentuan,
                    'mencabut_ketentuan' =>$mencabut_ketentuan,
                    'ketentuan_pengganti' => $ketentuan_pengganti,
                    'publish' => date("Y-m-d H:i:s"),
                    'flag' => '1',
                );
                $where = array('id'=> $id);
                
                $this->model_data_antrian->proses_antrian($where,$data,'sys_antrian');
                $this->model_data_sk_dir->proses_sk_dir($where,$data2,'sys_sk_dir');
                $cek=$this->model_data_sk_dir->flag($mencabut_ketentuan);
    
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengubah Data Gejala<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('data_antrian/tampil_data');
                }
            //  }
        }

        public function hapus_antrian($id){
            $where = array(
                'id' =>$id
            );
            $this->model_data_sk_dir->hapus_sk_dir($where,'sys_sk_dir');
            $this->model_data_antrian->hapus_antrian($where,'sys_antrian');
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('data_antrian/tampil_data');
        }

        public function pencarian(){
            $cari = $this->input->post('cari');
            $data['data']=$this->model_data_antrian->cari($cari);
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/hasil_pencarian', $data);
            $this->load->view('templates_user/footer');
        }
    }
?>