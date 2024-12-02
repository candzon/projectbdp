<?php
class Login extends CI_Controller
{

	public function index()
	{

		$this->form_validation->set_rules('nama_akun', 'Nama_akun', 'required', [
			'required' => 'Nama Akun Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('kata_sandi', 'Kata_sandi', 'required', [
			'required' => 'Kata Sandi Tidak Boleh Kosong!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('admin/login');
			$this->load->view('templates_admin/footer');
		} else {
			$this->proses_login();
		}
	}

	public function proses_login()
	{

		$nama_akun = htmlspecialchars($this->input->post('nama_akun', true));
		$kata_sandi = htmlspecialchars($this->input->post('kata_sandi', true));

		$result = $this->db->get_where('sys_akun', ['nama_akun' => $nama_akun])->row_array();

		if ($result) {

			$result2 = $this->db->get_where('sys_akun', ['kata_sandi' => $kata_sandi])->row_array();

			if (password_verify($kata_sandi, $result['kata_sandi'])) {
				session_start();
				//membuat data session
				$data = [
					'id' => $result['id'],
					'nama' => $result['nama'],
					'level' => $result['level'],
					'nama_akun' => $result['nama_akun'],
				];
				$this->session->set_userdata($data);

				if ($data['level'] == 'admin') {
					redirect('dashboard_admin/index');
				} else if ($data['level'] == 'building') {
					redirect('dashboard_user/index');
				} else if ($data['level'] == 'procurement') {
					redirect('dashboard_procurement/index');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong> Kata Sandi Salah!</strong> Silakan Coba Lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');


				$this->session->set_userdata($data);
				redirect('login/index');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Nama Akun Tidak Terdaftar!</strong> Silakan Coba Lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');

			redirect('login/index');
		}
	}

	public function logout()
	{

		$this->session->sess_destroy();

		$this->load->view('templates_admin/header');
		$this->load->view('admin/login');
		$this->load->view('templates_admin/footer');
	}
}
