<?php
class Data_akta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_data_akta');
		$this->load->model('model_data_alamat');
		$this->load->model('model_data_karyawan');
	}

	public function tampil_data_akta()
	{
		$data['data'] = $this->model_data_akta->get_akta();
		$data['kantor'] = $this->model_data_alamat->findAll();
		$data['karyawan'] = $this->model_data_karyawan->findAll();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_akta', $data);
		$this->load->view('templates_admin/footer');
	}

	public function get_kantor()
	{
		// prevent direct access
		if ($this->input->is_ajax_request() == FALSE) {
			redirect(base_url());
		}

		// get nama_kantor from POST
		$nama_kantor = $this->input->post('nama_kantor');
		// get data from model_data_alamat
		$data = $this->model_data_alamat->getAlamatDetailAktaById($nama_kantor);

		// return data as JSON
		echo json_encode($data);
	}

	public function tambah_akta()
	{
		// set rules
		$rules = [
			[
				'field' => 'nama_kantor',
				'label' => 'Nama Kantor',
				'rules' => 'required|max_length[100]',
				'errors' => [
					'required' => 'Nama Kantor Tidak Boleh Kosong!',
					'max_length' => 'Nama Kantor Maksimal 100 Karakter!'
				]
			],
			[
				'field' => 'alamat',
				'label' => 'Alamat Kantor',
				'rules' => 'required',
				'errors' => [
					'required' => 'Alamat Kantor Tidak Boleh Kosong!'
				]
			],
			[
				'field' => 'total_harga_sewa',
				'label' => 'Harga Sewa',
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga Sewa Tidak Boleh Kosong!'
				]
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke form input
			$this->tampil_data_akta();
		} else {
			// Menyiapkan data untuk disimpan ke dalam database
			$data = [
				'nomor_akta' => $this->input->post('nomor_akta'),
				'nama_kantor' => $this->input->post('nama_kantor'),
				'alamat_kantor' => $this->input->post('alamat'),
				'nama_kepala_kantor' => $this->input->post('nama_kepala_kantor'),
				'periode_awal' => $this->input->post('periode_awal') == '' ? null : $this->input->post('periode_awal'),
				'periode_akhir' => $this->input->post('periode_akhir'),
				'harga_sewa' => $this->input->post('total_harga_sewa_raw')
			];
			$check_nama_kantor = $this->model_data_akta->get_akta_by_nama_kantor($data['nama_kantor']);
			$jenis_akta = $this->input->post('jenis_akta');
			if ($jenis_akta == 'child') {
				$data['id_akta'] = $check_nama_kantor->id;
				$this->model_data_akta->tambah_akta($data, 'sys_detail_akta');
				// Set pesan berhasil
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data akta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				// Redirect ke halaman data akta
				redirect('data_akta/tampil_data_akta');
			} else if ($jenis_akta == 'parent') {
				// if nama_kantor already exists
				if ($check_nama_kantor) {
					// Set pesan gagal
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Nama Kantor Sudah Ada<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

					// Redirect ke halaman data akta
					redirect('data_akta/tampil_data_akta');
				}

				// remove harga_sewa from data change it to total_harga_sewa
				$data['total_harga_sewa'] = $data['harga_sewa'];
				$data['periode_akhir_sewa'] = $data['periode_akhir'];
				$data['alamat'] = $data['alamat_kantor'];
				unset($data['harga_sewa']);
				unset($data['alamat_kantor']);
				unset($data['periode_awal']);
				unset($data['periode_akhir']);
				unset($data['nomor_akta']);
				unset($data['nama_kepala_kantor']);

				// Simpan data ke database
				$this->model_data_akta->tambah_akta($data, 'sys_akta');

				// Set pesan berhasil
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data akta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				// Redirect ke halaman data akta
				redirect('data_akta/tampil_data_akta');
			}
		}
	}

	public function edit_detail_akta($id_detail_akta)
	{
		$data = [
			'nomor_akta' => $this->input->post('nomor_akta'),
			'periode_awal' => $this->input->post('periode_awal') == '' ? null : $this->input->post('periode_awal'),
			'periode_akhir' => $this->input->post('periode_akhir'),
			'harga_sewa' => $this->input->post('total_harga_sewa_raw')
		];

		$result = $this->model_data_akta->edit_detail_akta($id_detail_akta, $data);

		if ($result) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Edit Data Detail Akta Berhasil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('data_akta/tampil_data_akta');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Edit Data Detail Akta Gagal, Silahkan Coba Lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('data_akta/tampil_data_akta');
		}
	}


	public function edit_akta_aksi()
	{
		// Pastikan semua nama sesuai
		$this->form_validation->set_rules('nomor_akta', 'Nomor akta', 'required|trim|max_length[50]', [
			'required' => 'Nomor akta Tidak Boleh Kosong!',
			'max_length' => 'Nomor akta Maksimal 50 Karakter!'
		]);
		$this->form_validation->set_rules('nama_kantor', 'Nama Kantor', 'required|trim|max_length[100]', [
			'required' => 'Nama Kantor Tidak Boleh Kosong!',
			'max_length' => 'Nama Kantor Maksimal 100 Karakter!'
		]);
		$this->form_validation->set_rules('alamat_kantor', 'Alamat Kantor', 'required|trim', [
			'required' => 'Alamat Kantor Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('nama_kepala_kantor', 'Nama Kepala Kantor', 'required|trim|max_length[100]', [
			'required' => 'Nama Kepala Kantor Tidak Boleh Kosong!',
			'max_length' => 'Nama Kepala Kantor Maksimal 100 Karakter!'
		]);

		$nama_kantor = $this->input->post('nama_kantor');
		$nomor_akta = $this->input->post('nomor_akta');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$nama_kepala_kantor = $this->input->post('nama_kepala_kantor');
		$periode_awal = $this->input->post('periode_awal');
		$periode_awal = empty($periode_awal) ? NULL : $periode_awal;
		$periode_akhir = $this->input->post('periode_akhir');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke form input
			$this->edit_akta();
		} else {
			// Menyiapkan data untuk disimpan ke dalam database
			$data = array(
				'nomor_akta' => $nomor_akta,
				'nama_kantor' => $nama_kantor,
				'alamat_kantor' => $alamat_kantor,
				'nama_kepala_kantor' => $nama_kepala_kantor,
				'periode_awal' => $periode_awal,
				'periode_akhir' => $periode_akhir
			);



			// Simpan data ke database
			$this->model_data_akta->edit_akta($data, 'sys_akta');

			// Set pesan berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data akta<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// Redirect ke halaman data akta
			redirect('data_akta/tampil_data_akta');
		}
	}

	public function upload_dokumen()
	{
		$config = [
			'upload_path' => './upload/',
			'allowed_types' => 'pdf|jpg|png|jpeg|doc|docx',
			'max_size' => 12048
		];

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('dokumen')) {
			$upload = $this->upload->data();
			$id = $this->input->post('id_detail_akta');
			$data['dokumen_path'] = $upload['file_name'];
			$result = $this->model_data_akta->upload_dokumen($id, $data);


			if ($result) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Upload Dokumen Berhasil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				redirect('data_akta/tampil_data_akta');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Upload Dokumen Gagal, Silahkan Coba Lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				redirect('data_akta/tampil_data_akta');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> ' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('data_akta/tampil_data_akta');
		}
	}

	public function hapus_detail_akta($id_detail_akta)
	{
		$where = array('id_detail_akta' => $id_detail_akta);
		$this->model_data_akta->hapus_detail_akta($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Hapus Data Detail Akta Berhasil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('data_akta/tampil_data_akta');
	}
}
