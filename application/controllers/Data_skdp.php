<?php

class Data_skdp extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_data_skdp'); // Memuat model di constructor
	}

	public function tampil_data_skdp()
	{
		$periode_akhir = $this->input->get('periode_akhir');
		$data['data'] = $this->model_data_skdp->tampil_data();

		// var_dump($data['data']); die;
		$data['alamat'] = $this->model_data_skdp->getAlamatAndKantor();
		$data['getHeadKantor'] = $this->model_data_skdp->getHeadKantor();
		$data['get_id_skdp'] = $this->db->select('a.*, b.*')
			->from('sys_detail_skdp a')
			->join('sys_alamat b', 'a.nama_kantor = b.nama_kantor')
			->where('a.periode_akhir <', date('Y-m-d'))
			->get()
			->result();

		$data['periode_akhir'] = $periode_akhir;

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/data_skdp', $data);
		$this->load->view('templates_admin/footer');
	}

	public function get_kantor()
	{
		// get nama kantor
		$nama_kantor = $this->input->post('nama_kantor');
		// join sys detail skdp as dskdp dengan sys alamat as sa dengan dskdp.nama_kantor = sa.nama_kantor
		$data = $this->model_data_skdp->getKantor($nama_kantor);

		// return data
		echo json_encode($data);
	}

	public function tambah_skdp()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_skdp');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_skdp_aksi()
	{
		// Validasi input
		$this->form_validation->set_rules('nomor_skdp', 'Nomor SKDP', 'required|trim|max_length[50]', [
			'required' => 'Nomor SKDP Tidak Boleh Kosong!',
			'max_length' => 'Nomor SKDP Maksimal 50 Karakter!'
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

		$data = [
			'nomor_skdp' => $this->input->post('nomor_skdp'),
			'nama_kantor' => $this->input->post('nama_kantor'),
			'alamat_kantor' => $this->input->post('alamat_kantor'),
			'nama_kepala_kantor' => $this->input->post('nama_kepala_kantor'),
			'periode_awal' => $this->input->post('periode_awal') ?: NULL,
			'periode_akhir' => $this->input->post('periode_akhir')
		];

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke form input
			$this->tambah_skdp();
		} else {
			// Simpan data ke database
			$this->model_data_skdp->tambah_skdp($data, 'sys_detail_skdp');

			// Set pesan berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menambah Data SKDP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// Redirect ke halaman data SKDP
			redirect('data_skdp/tampil_data_skdp');
		}
	}

	public function edit_detail_skdp($id_detail_skdp)
	{
		$get_data = $this->model_data_skdp->get_skdp($id_detail_skdp);

		$data = [
			'id_detail_skdp' => $this->input->post('id_detail_skdp') ?? $get_data->id_detail_skdp,
			'nomor_skdp' => $this->input->post('nomor_skdp') ?? $get_data->nomor_skdp,
			'periode_awal' => $this->input->post('periode_awal') ?? $get_data->periode_awal,
			'periode_akhir' => $this->input->post('periode_akhir') ?? $get_data->periode_akhir,
			'keterangan' => $this->input->post('keterangan') ?? $get_data->keterangan,
		];
		$where = ['id_detail_skdp' => $this->input->post('id_detail_skdp')];
		$insert = $this->model_data_skdp->edit_skdp($where, $data, 'sys_detail_skdp');

		if ($insert) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengedit Data SKDP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('data_skdp/tampil_data_skdp');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Mengedit Data SKDP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('data_skdp/tampil_data_skdp');
		}

		// redirect ke halaman data SKDP
		redirect('data_skdp/tampil_data_skdp');
	}

	public function hapus_skdp($id_detail_skdp)
	{
		log_message('debug', 'Menghapus ID: ' . $id_detail_skdp); // Menambahkan log
		$where = ['id_detail_skdp' => $id_detail_skdp];

		$return = $this->model_data_skdp->hapus_skdp($where, 'sys_detail_skdp');
		if (!$return) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Menghapus Data SKDP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('data_skdp/tampil_data_skdp');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data SKDP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('data_skdp/tampil_data_skdp');
	}


	public function edit_skdp_aksi()
	{
		// Validasi input
		$this->form_validation->set_rules('nomor_skdp', 'Nomor SKDP', 'required|trim|max_length[50]', [
			'required' => 'Nomor SKDP Tidak Boleh Kosong!',
			'max_length' => 'Nomor SKDP Maksimal 50 Karakter!'
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

		$data = [
			'nomor_skdp' => $this->input->post('nomor_skdp'),
			'nama_kantor' => $this->input->post('nama_kantor'),
			'alamat_kantor' => $this->input->post('alamat_kantor'),
			'nama_kepala_kantor' => $this->input->post('nama_kepala_kantor'),
			'periode_awal' => $this->input->post('periode_awal') ?: NULL,
			'periode_akhir' => $this->input->post('periode_akhir')
		];

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke form input
			$this->edit_detail_skdp($this->input->post('id_detail_skdp'));
		} else {
			// Simpan data ke database
			$this->model_data_skdp->edit_skdp($data, 'sys_detail_skdp');

			// Set pesan berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Mengedit Data SKDP<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// Redirect ke halaman data SKDP
			redirect('data_skdp/tampil_data_skdp');
		}
	}

	public function upload_dokumen()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
		$config['max_size'] = 100048;

		$this->load->library('upload', $config);

		// cek apakah ada file yang diupload
		$file = $_FILES['dokumen'];

		if ($file['name'] == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> File Tidak Boleh Kosong!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('data_skdp/tampil_data_skdp');
		} else {
			if ($this->upload->do_upload('dokumen')) {
				$data = $this->upload->data();
				$data = [
					"dokumen_path" => $data['file_name'],
					"dokumen_uploaded_at" => date('Y-m-d H:i:s'),
				];

				$callback = $this->model_data_skdp->upload_dokumen($this->input->post('id'), $data);
				if ($callback) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Upload Dokumen SKDP Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('data_skdp/tampil_data_skdp');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Upload Dokumen SKDP Gagal! Pastikan File yang Diupload Berformat PDF, JPG, JPEG, PNG, DOC, atau DOCX dan Maksimal 100MB!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('data_skdp/tampil_data_skdp');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal!</strong> Upload Dokumen SKDP Gagal! Pastikan File yang Diupload Berformat PDF, JPG, JPEG, PNG, DOC, atau DOCX dan Maksimal 100MB!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('data_skdp/tampil_data_skdp');
			}
		}

		// redirect ke halaman data SKDP
		redirect('data_skdp/tampil_data_skdp');
	}

	public function previewFile()
	{
		$nomor_skdp = $this->input->get('nomorskdp');


		// get first data order by tanggal 
		$query = $this->db->query("SELECT * FROM sys_detail_skdp WHERE nomor_skdp = '$nomor_skdp' ORDER BY dokumen_uploaded_at DESC LIMIT 1");

		if ($query->num_rows() > 0) {
			$data = $query->row();
			// download
			$file = $data->dokumen_path;
			$path = './upload/' . $file;
			// check file exists
			if (file_exists($path)) {
				// get file content
				$data = file_get_contents($path);
				//force download
				header('Content-Type: application/pdf');
				header('Content-Disposition: inline; filename="' . $file . '"');
				readfile($path);
			} else {
				echo "<script>alert('Dokumen Tidak Ditemukan!')</script>";
				redirect('data_skdp/tampil_data_skdp');
			}
		} else {
			echo "<script>alert('Dokumen Tidak Ditemukan!')</script>";
			redirect('data_skdp/tampil_data_skdp');
		}
	}

	public function cek_dokumen_skdp()
	{
		$data = [
			'data' => $this->model_data_skdp->cek_dokumen_period(),
			'alamat' => $this->model_data_skdp->getAlamatAndKantor(),
			'getHeadKantor' => $this->model_data_skdp->getHeadKantor(),
		];

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/cek_skdp', $data);
		$this->load->view('templates_admin/footer');
	}
}
