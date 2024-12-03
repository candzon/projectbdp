<?php
class Dashboard_admin extends CI_Controller
{
	public function index()
	{

		$data['jumlah_akun'] = $this->model_data_akun->jumlah_akun();
		$data['jumlah_masa_sewa'] = $this->model_data_masa_sewa->jumlah_masa_sewa();
		$data['jumlah_skdp'] = $this->db->count_all('sys_detail_skdp');
		$data['jumlah_akta_sewa'] = $this->db->count_all('sys_detail_akta');
		$data['jumlah_pbb'] = $this->db->count_all('sys_detail_pbb');
		$data['get_id_skdp'] = $this->db->where('periode_akhir <', date('Y-m-d'))->get('sys_detail_skdp')->result();
		$data['get_id_akta'] = $this->db->where('periode_akhir <', date('Y-m-d'))->get('sys_detail_akta')->result();
		$data['get_id_pbb'] = $this->db->where('tanggal_pembayaran <', date('Y-m-d'))->get('sys_detail_pbb')->result();

		// echo json_encode($data['get_id_skdp']);
		// die;

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
