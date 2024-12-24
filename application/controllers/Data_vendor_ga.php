<?php
class Data_vendor_ga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_data_vendor_ga');
    }

    public function tampil_penilaian_vendor_ga()
    {
        $data['data'] = $this->model_data_vendor_ga->tampil_vendor_penilaian();



        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tampil_penilaian_vendor', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tampil_pengadaan_ga()
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pengadaan_ga();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tampil_pengadaan_ga', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tampil_pengadaan_ga_procurement()
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pengadaan_ga();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tampil_pengadaan_ga_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function tampil_maintenance_ga()
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_maintenance_ga();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tampil_maintenance_ga', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tampil_maintenance_ga_procurement()
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_maintenance_ga();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tampil_maintenance_ga_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function tampil_jasa_ga()
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_jasa_ga();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tampil_jasa_ga', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tampil_jasa_ga_procurement()
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_jasa_ga();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tampil_jasa_ga_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function tambah_vendor_ga()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_vendor_ga');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_vendor_ga_procurement()
    {
        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tambah_vendor_ga_procurement');
        $this->load->view('templates_procurement/footer');
    }

    public function tambah_vendor_ga_aksi()
    {
        $this->form_validation->set_rules('jenis_vendor', 'Jenis_vendor', 'required|trim', [
            'required' => 'Jenis Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_vendor_ga();
        } else {
            $data = array(
                'jenis_vendor' => $jenis_vendor,
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );
            $this->model_data_vendor_ga->tambah_vendor_ga($data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');

            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga');
            } else if ($jenis_vendor == 'service') {
                redirect('data_vendor_ga/tampil_maintenance_ga');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga');
            }
        }
    }

    public function tambah_vendor_ga_aksi_procurement()
    {
        $this->form_validation->set_rules('jenis_vendor', 'Jenis_vendor', 'required|trim', [
            'required' => 'Jenis Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_vendor_ga_procurement();
        } else {
            $data = array(
                'jenis_vendor' => $jenis_vendor,
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );
            $this->model_data_vendor_ga->tambah_vendor_ga($data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');



            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga_procurement');
            } else if ($jenis_vendor == 'service') {
                redirect('data_vendor_ga/tampil_maintenance_ga_procurement');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga_procurement');
            }
        }
    }

    public function edit_pengadaan_ga($id_vendor)
    {

        $where = array('id_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_vendor_ga($where, 'sys_vendor')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_pengadaan_ga', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_pengadaan_ga_procurement($id_vendor)
    {
        $where = array('id_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_vendor_ga($where, 'sys_vendor')->result();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/edit_pengadaan_ga_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function edit_pengadaan_ga_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pengadaan_ga($id_vendor);
        } else {
            $data = array(
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );

            $where = array(
                'id_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_vendor_ga_aksi($where, $data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');



            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga');
            } else if ($jenis_vendor == 'service_maintenance') {
                redirect('data_vendor_ga/tampil_maintenance_ga');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga');
            }
        }
    }

    public function edit_pengadaan_ga_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pengadaan_ga_procurement($id_vendor);
        } else {
            $data = array(
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );

            $where = array(
                'id_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_vendor_ga_aksi($where, $data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>');



            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga_procurement');
            } else if ($jenis_vendor == 'service_maintenance') {
                redirect('data_vendor_ga/tampil_maintenance_ga_procurement');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga_procurement');
            }
        }
    }

    public function edit_maintenance_ga($id_vendor)
    {

        $where = array('id_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_vendor_ga($where, 'sys_vendor')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_maintenance_ga', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_maintenance_ga_procurement($id_vendor)
    {

        $where = array('id_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_vendor_ga($where, 'sys_vendor')->result();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/edit_maintenance_ga_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function edit_maintenance_ga_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pengadaan_ga($id_vendor);
        } else {
            $data = array(
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );

            $where = array(
                'id_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_vendor_ga_aksi($where, $data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');


            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga');
            } else if ($jenis_vendor == 'service') {
                redirect('data_vendor_ga/tampil_maintenance_ga');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga');
            }
        }
    }

    public function edit_maintenance_ga_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pengadaan_ga_procurement($id_vendor);
        } else {
            $data = array(
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );

            $where = array(
                'id_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_vendor_ga_aksi($where, $data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');


            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga_procurement');
            } else if ($jenis_vendor == 'service') {
                redirect('data_vendor_ga/tampil_maintenance_ga_procurement');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga_procurement');
            }
        }
    }

    public function edit_jasa_ga($id_vendor)
    {

        $where = array('id_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_vendor_ga($where, 'sys_vendor')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_jasa_ga', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_jasa_ga_procurement($id_vendor)
    {

        $where = array('id_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_vendor_ga($where, 'sys_vendor')->result();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/edit_jasa_ga_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }
    public function edit_jasa_ga_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pengadaan_ga($id_vendor);
        } else {
            $data = array(
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );

            $where = array(
                'id_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_vendor_ga_aksi($where, $data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga');
            } else if ($jenis_vendor == 'service_maintenance') {
                redirect('data_vendor_ga/tampil_maintenance_ga');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga');
            }
        }
    }

    public function edit_jasa_ga_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama_vendor', 'Nama_vendor', 'required|trim', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Provinsi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_telepon_kantor', 'No_telepon_kantor', 'is_numeric', [
            'is_numeric' => 'Nomor Telepom Berupa Angka!'
        ]);

        $jenis_vendor = $this->input->post('jenis_vendor');
        $nama_vendor = $this->input->post('nama_vendor');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $no_telepon_kantor = $this->input->post('no_telepon_kantor');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pengadaan_ga_procurement($id_vendor);
        } else {
            $data = array(
                'nama_vendor' => $nama_vendor,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'no_telepon_kantor' => $no_telepon_kantor
            );

            $where = array(
                'id_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_vendor_ga_aksi($where, $data, 'sys_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            if ($jenis_vendor == 'pengadaan') {
                redirect('data_vendor_ga/tampil_pengadaan_ga_procurement');
            } else if ($jenis_vendor == 'service') {
                redirect('data_vendor_ga/tampil_maintenance_ga_procurement');
            } else {
                redirect('data_vendor_ga/tampil_jasa_ga_procurement');
            }
        }
    }


    public function pencarian_pengadaan()
    {
        $cari = $this->input->post('cari');
        $data['data'] = $this->model_data_vendor_ga->cari_pengadaan($cari);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/hasil_pencarian_pengadaan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function pencarian_pengadaan_procurement()
    {
        $cari = $this->input->post('cari');
        $data['data'] = $this->model_data_vendor_ga->cari_pengadaan($cari);

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/hasil_pencarian_pengadaan_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function pencarian_maintenance()
    {
        $cari = $this->input->post('cari');
        $data['data'] = $this->model_data_vendor_ga->cari_maintenance($cari);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/hasil_pencarian_maintenance', $data);
        $this->load->view('templates_admin/footer');
    }

    public function pencarian_maintenance_procurement()
    {
        $cari = $this->input->post('cari');
        $data['data'] = $this->model_data_vendor_ga->cari_maintenance($cari);

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/hasil_pencarian_maintenance_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function pencarian_jasa()
    {
        $cari = $this->input->post('cari');
        $data['data'] = $this->model_data_vendor_ga->cari_jasa($cari);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/hasil_pencarian_jasa', $data);
        $this->load->view('templates_admin/footer');
    }

    public function pencarian_jasa_procurement()
    {
        $cari = $this->input->post('cari');
        $data['data'] = $this->model_data_vendor_ga->cari_jasa($cari);

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/hasil_pencarian_jasa_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }


    public function tampil_pic_pengadaan($id_vendor)
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pic_pengadaan($id_vendor);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tampil_pic_pengadaan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tampil_pic_pengadaan_procurement($id_vendor)
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pic_pengadaan($id_vendor);

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tampil_pic_pengadaan_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function tambah_pic_pengadaan()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_pic_pengadaan');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_pic_pengadaan_procurement()
    {
        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tambah_pic_pengadaan_procurement');
        $this->load->view('templates_procurement/footer');
    }

    public function tambah_pic_pengadaan_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Nomor_telepon_pic', 'required|trim', [
            'required' => 'Nomor Telepon PIC Tidak Boleh Kosong!'
        ]);


        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');


        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pic_pengadaan();
        } else {
            $data = array(
                'id_vendor' => $id_vendor,
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );
            $this->model_data_vendor_ga->tambah_pic_pengadaan($data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('data_vendor_ga/tampil_pic_pengadaan/' . $id_vendor);
        }
    }

    public function tambah_pic_pengadaan_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Nomor_telepon_pic', 'required|trim', [
            'required' => 'Nomor Telepon PIC Tidak Boleh Kosong!'
        ]);


        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');


        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pic_pengadaan_procurement();
        } else {
            $data = array(
                'id_vendor' => $id_vendor,
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );
            $this->model_data_vendor_ga->tambah_pic_pengadaan($data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('data_vendor_ga/tampil_pic_pengadaan_procurement/' . $id_vendor);
        }
    }
    ///sampai sini
    public function edit_pic_pengadaan($id_vendor)
    {
        $where = array('id_pic_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_pic_pengadaan($where, 'sys_pic_vendor')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_pic_pengadaan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_pic_pengadaan_procurement($id_vendor)
    {
        $where = array('id_pic_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_pic_pengadaan($where, 'sys_pic_vendor')->result();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/edit_pic_pengadaan_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function edit_pic_pengadaan_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Provinsi', 'required|trim', [
            'required' => 'Nomor Telepon Tidak Boleh Kosong!'
        ]);

        $id = $this->input->post('id');
        var_dump($id);
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pic_pengadaan($id_vendor);
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );

            $where = array(
                'id_pic_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_pic_pengadaan_aksi($where, $data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');

            redirect('data_vendor_ga/tampil_pic_pengadaan/' . $id);
        }
    }

    public function edit_pic_pengadaan_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Provinsi', 'required|trim', [
            'required' => 'Nomor Telepon Tidak Boleh Kosong!'
        ]);

        $id = $this->input->post('id');
        var_dump($id);
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pic_pengadaan_procurement($id_vendor);
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );

            $where = array(
                'id_pic_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_pic_pengadaan_aksi($where, $data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');

            redirect('data_vendor_ga/tampil_pic_pengadaan_procurement/' . $id);
        }
    }

    ///sampai sini
    public function hapus_pic_pengadaan($id_vendor)
    {
        $where = array(
            'id_pic_vendor' => $id_vendor
        );

        $this->model_data_vendor_ga->hapus_pic_pengadaan($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_pengadaan_ga');
    }

    public function hapus_pic_pengadaan_procurement($id_vendor)
    {
        $where = array(
            'id_pic_vendor' => $id_vendor
        );

        $this->model_data_vendor_ga->hapus_pic_pengadaan($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_pengadaan_ga_procurement');
    }

    public function hapus_pic_maintenance($id_vendor)
    {
        $where = array(
            'id_pic_vendor' => $id_vendor
        );

        $this->model_data_vendor_ga->hapus_pic_pengadaan($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_maintenance_ga');
    }

    public function hapus_pic_maintenance_procurement($id_vendor)
    {
        $where = array(
            'id_pic_vendor' => $id_vendor
        );

        $this->model_data_vendor_ga->hapus_pic_pengadaan($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_maintenance_ga_procurement');
    }

    public function hapus_pic_jasa($id_vendor)
    {
        $where = array(
            'id_pic_vendor' => $id_vendor
        );

        $this->model_data_vendor_ga->hapus_pic_pengadaan($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_jasa_ga');
    }

    public function hapus_pic_jasa_procurement($id_vendor)
    {
        $where = array(
            'id_pic_vendor' => $id_vendor
        );

        $this->model_data_vendor_ga->hapus_pic_pengadaan($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_jasa_ga_procurement');
    }

    public function tampil_pic_maintenance($id_vendor)
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pic_maintenance($id_vendor);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tampil_pic_maintenance', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tampil_pic_maintenance_procurement($id_vendor)
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pic_maintenance($id_vendor);

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tampil_pic_maintenance_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function tambah_pic_maintenance()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_pic_maintenance');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_pic_maintenance_procurement()
    {
        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tambah_pic_maintenance_procurement');
        $this->load->view('templates_procurement/footer');
    }

    public function tambah_pic_maintenance_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Nomor_telepon_pic', 'required|trim', [
            'required' => 'Nomor Telepon PIC Tidak Boleh Kosong!'
        ]);


        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');


        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pic_maintenance();
        } else {
            $data = array(
                'id_vendor' => $id_vendor,
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );
            $this->model_data_vendor_ga->tambah_pic_maintenance($data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('data_vendor_ga/tampil_pic_maintenance/' . $id_vendor);
        }
    }

    public function tambah_pic_maintenance_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Nomor_telepon_pic', 'required|trim', [
            'required' => 'Nomor Telepon PIC Tidak Boleh Kosong!'
        ]);


        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');


        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pic_maintenance_procurement();
        } else {
            $data = array(
                'id_vendor' => $id_vendor,
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );
            $this->model_data_vendor_ga->tambah_pic_maintenance($data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('data_vendor_ga/tampil_pic_maintenance_procurement/' . $id_vendor);
        }
    }

    public function edit_pic_maintenance($id_vendor)
    {
        $where = array('id_pic_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_pic_maintenance($where, 'sys_pic_vendor')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_pic_maintenance', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_pic_maintenance_procurement($id_vendor)
    {
        $where = array('id_pic_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_pic_maintenance($where, 'sys_pic_vendor')->result();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/edit_pic_maintenance_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function edit_pic_maintenance_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Provinsi', 'required|trim', [
            'required' => 'Nomor Telepon Tidak Boleh Kosong!'
        ]);

        $id = $this->input->post('id');
        var_dump($id);
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pic_maintenance($id_vendor);
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );

            $where = array(
                'id_pic_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_pic_pengadaan_aksi($where, $data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');

            redirect('data_vendor_ga/tampil_pic_maintenance/' . $id);
        }
    }

    public function edit_pic_maintenance_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Provinsi', 'required|trim', [
            'required' => 'Nomor Telepon Tidak Boleh Kosong!'
        ]);

        $id = $this->input->post('id');
        var_dump($id);
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pic_maintenance_procurement($id_vendor);
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );

            $where = array(
                'id_pic_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_pic_pengadaan_aksi($where, $data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');

            redirect('data_vendor_ga/tampil_pic_maintenance_procurement/' . $id);
        }
    }


    public function tampil_pic_jasa($id_vendor)
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pic_jasa($id_vendor);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tampil_pic_jasa', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tampil_pic_jasa_procurement($id_vendor)
    {

        $data['data'] = $this->model_data_vendor_ga->tampil_pic_jasa($id_vendor);

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tampil_pic_jasa_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function tambah_pic_jasa()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_pic_jasa');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_pic_jasa_procurement()
    {
        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/tambah_pic_jasa_procurement');
        $this->load->view('templates_procurement/footer');
    }


    public function tambah_pic_jasa_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Nomor_telepon_pic', 'required|trim', [
            'required' => 'Nomor Telepon PIC Tidak Boleh Kosong!'
        ]);


        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');


        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pic_jasa();
        } else {
            $data = array(
                'id_vendor' => $id_vendor,
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );
            $this->model_data_vendor_ga->tambah_pic_jasa($data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('data_vendor_ga/tampil_pic_jasa/' . $id_vendor);
        }
    }

    public function tambah_pic_jasa_aksi_procurement($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Nomor_telepon_pic', 'required|trim', [
            'required' => 'Nomor Telepon PIC Tidak Boleh Kosong!'
        ]);


        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');


        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pic_jasa_procurement();
        } else {
            $data = array(
                'id_vendor' => $id_vendor,
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );
            $this->model_data_vendor_ga->tambah_pic_jasa($data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('data_vendor_ga/tampil_pic_jasa_procurement/' . $id_vendor);
        }
    }

    public function edit_pic_jasa($id_vendor)
    {
        $where = array('id_pic_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_pic_maintenance($where, 'sys_pic_vendor')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_pic_jasa', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_pic_jasa_procurement($id_vendor)
    {
        $where = array('id_pic_vendor' => $id_vendor);
        $data['data'] = $this->model_data_vendor_ga->edit_pic_maintenance($where, 'sys_pic_vendor')->result();

        $this->load->view('templates_procurement/header');
        $this->load->view('templates_procurement/sidebar');
        $this->load->view('admin/edit_pic_jasa_procurement', $data);
        $this->load->view('templates_procurement/footer');
    }

    public function edit_pic_jasa_aksi($id_vendor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nomor_telepon_pic', 'Provinsi', 'required|trim', [
            'required' => 'Nomor Telepon Tidak Boleh Kosong!'
        ]);

        $id = $this->input->post('id');
        var_dump($id);
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telepon_pic = $this->input->post('nomor_telepon_pic');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_pic_jasa($id_vendor);
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'nomor_telepon_pic' => $nomor_telepon_pic
            );

            $where = array(
                'id_pic_vendor' => $id_vendor
            );

            $this->model_data_vendor_ga->edit_pic_pengadaan_aksi($where, $data, 'sys_pic_vendor');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');

            redirect('data_vendor_ga/tampil_pic_jasa/' . $id);
        }
    }

    public function hapus_pengadaan($id_vendor)
    {
        $where = array(
            'id_vendor' => $id_vendor
        );

        $this->model_data_vendor->hapus_vendor($where, 'sys_vendor');
        $this->model_data_vendor->hapus_vendor($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_pengadaan_ga');
    }

    public function hapus_pengadaan_procurement($id_vendor)
    {
        $where = array(
            'id_vendor' => $id_vendor
        );

        $this->model_data_vendor->hapus_vendor($where, 'sys_vendor');
        $this->model_data_vendor->hapus_vendor($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_pengadaan_ga_procurement');
    }

    public function hapus_maintenance($id_vendor)
    {
        $where = array(
            'id_vendor' => $id_vendor
        );

        $this->model_data_vendor->hapus_vendor($where, 'sys_vendor');
        $this->model_data_vendor->hapus_vendor($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_maintenance_ga');
    }

    public function hapus_maintenance_procurement($id_vendor)
    {
        $where = array(
            'id_vendor' => $id_vendor
        );

        $this->model_data_vendor->hapus_vendor($where, 'sys_vendor');
        $this->model_data_vendor->hapus_vendor($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_maintenance_ga_procurement');
    }

    public function hapus_jasa($id_vendor)
    {
        $where = array(
            'id_vendor' => $id_vendor
        );

        $this->model_data_vendor->hapus_vendor($where, 'sys_vendor');
        $this->model_data_vendor->hapus_vendor($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_jasa_ga');
    }

    public function hapus_jasa_procurement($id_vendor)
    {
        $where = array(
            'id_vendor' => $id_vendor
        );

        $this->model_data_vendor->hapus_vendor($where, 'sys_vendor');
        $this->model_data_vendor->hapus_vendor($where, 'sys_pic_vendor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data Pakar<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('data_vendor_ga/tampil_jasa_ga_procurement');
    }

    public function tambah_penilaian_vendor()
    {
        $data['data'] = $this->model_data_vendor_ga->tampil_vendor_penilaian();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_penilaian_vendor', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_penilaian_vendor_aksi()
    {
        $this->form_validation->set_rules('cari', 'Nama Vendor', 'required', [
            'required' => 'Nama Vendor Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nilai[]', 'Nilai', 'required', [
            'required' => 'Nilai Tidak Boleh Kosong!'
        ]);

        $id_vendor = $this->input->post('cari');
        $nilai = $this->input->post('nilai');
        $komentar = $this->input->post('komentar');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_penilaian_vendor();
        } else {
            foreach ($nilai as $key => $value) {
                $data = array(
                    'id_vendor' => $id_vendor,
                    'aspek_penilaian' => $key + 1,
                    'nilai' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->model_data_vendor_ga->tambah_penilaian_vendor($data, 'sys_penilaian_vendor');
            }

            $data = array(
                'id_vendor' => $id_vendor,
                'komentar' => $komentar,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $this->model_data_vendor_ga->tambah_penilaian_vendor($data, 'sys_komentar_penilaian');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data Penilaian Vendor<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('data_vendor_ga/tampil_penilaian_vendor_ga');
        }
    }


    public function download_pdf_penilaian_vendor($id_vendor)
    {
        $data['data'] = $this->model_data_vendor_ga->get_sys_penilaian_vendor($id_vendor)->result_array();
        $data['vendor_data'] = $this->model_data_vendor_ga->get_sys_penilaian_vendor($id_vendor)->row_array();

        $html = $this->load->view('admin/pdf_penilaian_vendor', $data, true);

        $this->load->library('Tcpdf_gen'); // Load Tcpdf_gen library
        $pdf = new TCPDF(); // Buat instance dari TCPDF

        // Pengaturan halaman
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 10);

        // Tulis konten HTML
        $pdf->SetMargins(10, 10, 10); // Atur margin
        $pdf->writeHTML($html, true, false, true, false, ''); // Tulis HTML ke PDF

        // Output PDF ke browser
        $pdf->Output('penilaian_vendor_' . $id_vendor . '.pdf', 'D');
    }
}
