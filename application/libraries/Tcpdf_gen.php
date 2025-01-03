<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tcpdf_gen {
    public function __construct() {
        require_once APPPATH . '../vendor/tecnickcom/tcpdf/tcpdf.php'; // Sesuaikan path jika diperlukan
    }
}
