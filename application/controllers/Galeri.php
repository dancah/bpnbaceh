<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        /* cek session */
        if (empty(userSession('id'))) {
            redirect('auth');
        }
        // load model
        $this->load->model('M_galeri');
    }

    function index() {
        $data = array(
            'level'         => $this->session->userdata('level'),
            'user'          => 'admin',
            'title'         => 'Galeri',
            'konten'        => 'page/galeri/index',
            'breadcrumb'    => array('#'=>'Galeri','galeri'=>'List'),
            'data'          => $this->M_galeri->get_list_galeri()
        );
        $this->load->view('layout',$data);
    }

    function form($idGallery = "") {
        if ($idGallery) {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'Galeri',
                'konten'        => 'page/galeri/edit',
                'breadcrumb'    => array('#'=>'Galeri','galeri/form/'.$idGallery=>'Edit'),
                'result'        => $this->M_galeri->get_detail_galeri($idGallery)
            );
            $this->load->view('layout',$data);
        } else {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'Galeri',
                'konten'        => 'page/galeri/add',
                'breadcrumb'    => array('#'=>'Galeri','galeri/form'=>'Tambah'),
            );
            $this->load->view('layout',$data);
        }
    }

    function save() {
        if ($this->input->post('idGallery',TRUE)) {
            $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'url' => $this->input->post('url',TRUE),
            );
            $process = $this->M_galeri->update_galeri($data, array('idGallery' => $this->input->post('idGallery',TRUE)));
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil memperbarui data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal memperbarui data'));
            }
            redirect('galeri/form/'.$this->input->post('idGallery',TRUE));
        } else {
            $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'url' => $this->input->post('url',TRUE),
            );
            $process = $this->M_galeri->insert_galeri($data, array('idGallery' => $this->input->post('idGallery',TRUE)));
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menyimpan data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menyimpan data'));
            }
            redirect('galeri/form');
        }
    }

    function delete($idGallery) {
        $process = $this->M_galeri->delete_galeri(array('idGallery'=>$idGallery));
        if ($process) {
            $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menghapus data'));
        } else {
            $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menghapus data'));
        }
        redirect('galeri');
    }
}
