<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct() {
        parent::__construct();
         /* cek session */
        if (empty(userSession('id'))) {
            redirect('auth');
        }
        $this->load->model('M_berita');
        $this->load->model('M_kegiatan');
    }

    function index() {
        $data = array(
            'level'     => '0',
            'user'      => 'guest',
            'title'     => 'Beranda',
            'breadcrumb'=> array('#'=>'Home','home'=>'Overview'),
            'konten'    => 'page/home',
            'berita'    => $this->M_berita->get_list_berita_display(array(0,5)),
            'kegiatan'  => $this->M_kegiatan->get_list_kegiatan_display(array(0,5)),
        );

        $this->load->view('layout',$data);
    }

}
