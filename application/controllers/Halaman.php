<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller{

    public function __construct() {
        parent::__construct();
        // model
        $this->load->model('M_galeri');
        $this->load->model('M_berita');
        $this->load->model('M_kegiatan');
    }

    function index() {
        $data = array(
            'level'     => '0',
            'user'      => 'guest',
            'title'     => 'Beranda',
            'breadcrumb'=> array('#'=>'Home'),
            'konten'    => 'page/home',
            'berita'    => $this->M_berita->get_list_berita_display(array(0,5)),
            'kegiatan'  => $this->M_kegiatan->get_list_kegiatan_display(array(0,5)),
        );

        $this->load->view('layout',$data);
    }

    function profile() {
        $data = array(
            'level'     => '0',
            'user'      => 'guest',
            'title'     => 'Profile',
            'breadcrumb'=> array('halaman'=>'Home','halaman/profile'=>'Profile'),
            'konten'    => 'page/profile/index',
        );

        $this->load->view('layout',$data);
    }

    function galeri($offset = 0) {
        // pagination
        $config['base_url']     = site_url('guest/galeri');
        $config['total_rows']   = $this->M_galeri->get_total_galeri_display();
        $config['per_page']     = 10;
        $config['uri_segment']  = 3;
        $config = array_merge($config,$this->config->item('pagination'));
        $this->pagination->initialize($config);
        // data
        $data = array(
            'level'         => '0',
            'user'          => 'guest',
            'title'         => 'Galeri',
            'konten'        => 'page/galeri/display',
            'breadcrumb'    => array('halaman'=>'Home','halaman/galeri'=>'Galeri'),
            'data'          => $this->M_galeri->get_list_galeri_display(array(intval($offset), $config['per_page'])),
            'pagination'    => $this->pagination->create_links(),
            'nomor'         => $offset + 1
        );

        $this->load->view('layout',$data);
    }

    function kegiatan($offset = 0) {
        // pagination
        $config['base_url']     = site_url('halaman/kegiatan');
        $config['total_rows']   = $this->M_berita->get_total_berita_display();
        $config['per_page']     = 9;
        $config['uri_segment']  = 3;
        $config = array_merge($config,$this->config->item('pagination'));
        $this->pagination->initialize($config);
        // data
        $data = array(
            'level'         => '0',
            'user'          => 'guest',
            'title'         => 'Kegiatan',
            'konten'        => 'page/kegiatan/display',
            'breadcrumb'    => array('halaman'=>'Home','halaman/kegiatan'=>'Kegiatan'),
            'data'          => $this->M_kegiatan->get_list_kegiatan_display(array(intval($offset), $config['per_page'])),
            'pagination'    => $this->pagination->create_links(),
            'nomor'         => $offset + 1
        );

        $this->load->view('layout',$data);
    }

    function kegiatan_detail($idKegiatan) {
        // data
        $data = array(
            'level'         => '0',
            'user'          => 'guest',
            'title'         => 'Kegiatan',
            'konten'        => 'page/kegiatan/detail',
            'breadcrumb'    => array('halaman'=>'Home','halaman/kegiatan'=>'Kegiatan','halaman/kegiatan_detail/'.$idKegiatan=>'Detail'),
            'data'          => $this->M_kegiatan->get_detail_kegiatan(array($idKegiatan)),
        );

        $this->load->view('layout',$data);
    }

    function berita($offset = 0) {
        // pagination
        $config['base_url']     = site_url('halaman/berita');
        $config['total_rows']   = $this->M_berita->get_total_berita_display();
        $config['per_page']     = 9;
        $config['uri_segment']  = 3;
        $config = array_merge($config,$this->config->item('pagination'));
        $this->pagination->initialize($config);
        // data
        $data = array(
            'level'         => '0',
            'user'          => 'guest',
            'title'         => 'Berita',
            'konten'        => 'page/berita/display',
            'breadcrumb'    => array('halaman'=>'Home','halaman/berita'=>'Berita'),
            'data'          => $this->M_berita->get_list_berita_display(array(intval($offset), $config['per_page'])),
            'pagination'    => $this->pagination->create_links(),
            'nomor'         => $offset + 1
        );

        $this->load->view('layout',$data);
    }

    function berita_detail($idBerita) {
        // data
        $data = array(
            'level'         => '0',
            'user'          => 'guest',
            'title'         => 'Berita',
            'konten'        => 'page/berita/detail',
            'breadcrumb'    => array('halaman'=>'Home','halaman/berita'=>'Berita','halaman/berita_detail/'.$idBerita=>'Detail'),
            'data'          => $this->M_berita->get_detail_berita(array($idBerita)),
        );

        $this->load->view('layout',$data);
    }

    function peta () {
        // search
        $search = $this->session->userdata('search_peta');
        $tahun = $search['tahun'] ? $search['tahun'] : '%';
        // data
        $data = array(
            'level'         => '0',
            'user'          => 'guest',
            'title'         => 'Peta',
            'konten'        => 'page/kegiatan/peta',
            'breadcrumb'    => array('halaman'=>'Home','halaman/kegiatan'=>'Kegiatan','halaman/peta'=>'Peta'),
            'map_data'      => json_encode($this->M_kegiatan->get_data_peta($tahun)),
            'tahun'         => $this->M_kegiatan->get_tahun_kegiatan(),
            'search'        => $search
        );

        $this->load->view('layout',$data);
    }

    function peta_search() {
        $params = array(
            'tahun' => $this->input->post('tahun',TRUE),
        );
        $this->session->set_userdata('search_peta',$params);

        redirect('halaman/peta');
    }
}
