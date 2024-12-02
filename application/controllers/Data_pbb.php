<?php
class Data_pbb extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['model_data_pbb', 'model_data_alamat']);
	}

	public function tampil_data_pbb()
	{
		$data['data'] = $this->model_data_pbb->get_pbb();
		$data['kantor'] = $this->model_data_alamat->findAll();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pbb', $data);
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
		$data = $this->model_data_alamat->getAlamatDetailPbbById($nama_kantor);

		// return data as JSON
		echo json_encode($data);
	}

	public function tambah_pbb()
	{
		// check jenis
		$jenis = $this->input->post('jenis');
		if ($jenis == 'parent') {
			$data = [
				'nama_kantor' => $this->input->post('nama_kantor'),
				'nop' => $this->input->post('nop'),
				'luas' => $this->input->post('luas'),
			];
			$result = $this->model_data_pbb->tambah_pbb($data);

			if ($result === FALSE) {
				// Set pesan gagal
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong
				>Gagal!</strong> Nama Kantor Sudah Ada<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				// Redirect ke halaman data pbb
				return redirect('data_pbb/tampil_data_pbb');
			}

			// Set pesan berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong
			>Berhasil!</strong> Menambah Data pbb<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// Redirect ke halaman data pbb
			return redirect('data_pbb/tampil_data_pbb');
		} else if ($jenis == 'child') {
			// get id pbb
			$id_pbb = $this->input->post('id_pbb');
			$data = [
				'tahun' => $this->input->post('tahun'),
				'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran'),
				'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
			];
			$this->model_data_pbb->tambah_detail_pbb($id_pbb, $data);

			// Set pesan berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong
			>Berhasil!</strong> Menambah Data pbb<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// Redirect ke halaman data pbb
			redirect('data_pbb/tampil_data_pbb');
		} else {
			// redirect to previous page
			redirect(base_url('data_pbb/tampil_data_pbb'));
		}
	}

	public function edit_detail_pbb()
	{
		$id = $this->input->post('id');
		$data = [
			'tahun' => $this->input->post('tahun'),
			'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran'),
			'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
		];
		$result = $this->model_data_pbb->edit_detail_pbb($id, $data);

		if ($result === FALSE) {
			// Set pesan gagal
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong
			>Gagal!</strong> Data Tidak Ditemukan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// Redirect ke halaman data pbb
			return redirect('data_pbb/tampil_data_pbb');
		} else {
			// Set pesan berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong
			>Berhasil!</strong> Mengedit Data pbb<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// Redirect ke halaman data pbb
			return redirect('data_pbb/tampil_data_pbb');
		}
	}

	public function hapus_detail_pbb($id)
	{
		$where = array('id' => $id);
		$this->model_data_pbb->hapus_detail_pbb($where);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Menghapus Data pbb<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('data_pbb/tampil_data_pbb');
	}
}
