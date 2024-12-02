<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ManajemenDokumen extends CI_Controller {

    public function Index()
    {
         $data['title'] = 'Manajemen Dokumen';

         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('manajemen dokumen');
         $this->load->view('templates/footer');
    }
}

?>
