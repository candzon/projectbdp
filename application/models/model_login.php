<?php class model_login extends CI_Model{
    public function cek_login($nama_akun,$kata_sandi){
        $this->db->where('nama_akun', $nama_akun);
        $this->db->where('kata_sandi', $kata_sandi);
        return $this->db->get('sys_akun');
    }

    public function getLoginData($user,$pass){
        $u=$user;
        $p=MD5($pass);

        $query = $this->db->get_where('sys_akun',array('nama_akun'=>$u,'kata_sandi'=>$p));
        if(count($query->result())>0){
            foreach($query->result() as $qck){
                foreach($query->result() as $ck){
                    $sess_data['logged_in'] = TRUE;
                    $sess_data['nama_akun'] = $ck->nama_akun;
                    $sess_data['kata_sandi'] = $ck->kata_sandi;
                    $sess_data['level'] = $ck->level;
                    $this->session->set_userdata($sess_data);
                }
                redirect('admin/dashboard');
            }
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> Nama Akun atau Kata Sandi Anda Salah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>');
            redirect('login');
        }
    }
}
?>