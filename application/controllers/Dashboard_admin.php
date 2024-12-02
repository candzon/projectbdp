<?php
class Dashboard_admin extends CI_Controller
{

	public function index()
	{

		$data['jumlah_akun'] = $this->model_data_akun->jumlah_akun();
		$data['jumlah_masa_sewa'] = $this->model_data_masa_sewa->jumlah_masa_sewa();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}


	public function tampil_data_skdp()
{
    // Memanggil data SKDP dari model
    $data['tampil_data_skdp'] = $this->model_data_skdp->tampil_data_skdp();

    // Memuat view dengan data yang diperoleh
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dashboard', $data); // Pastikan 'dashboard' menyesuaikan dengan nama view yang Anda gunakan
    $this->load->view('templates_admin/footer');
}

}
