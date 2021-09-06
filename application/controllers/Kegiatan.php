<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        /* cek session */
        if (empty(userSession('id'))) {
            redirect('auth');
        }
        // load model
        $this->load->model('M_kegiatan');
    }

    function index() {
        $data = array(
            'level'         => $this->session->userdata('level'),
            'user'          => 'admin',
            'title'         => 'Kegiatan',
            'konten'        => 'page/kegiatan/index',
            'breadcrumb'    => array('#'=>'Kegiatan','kegiatan'=>'List'),
            'data'          => $this->M_kegiatan->get_list_kegiatan()
        );
        $this->load->view('layout',$data);
    }

    function form($idKegiatan = "") {
        if ($idKegiatan) {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'Kegiatan',
                'konten'        => 'page/kegiatan/edit',
                'breadcrumb'    => array('#'=>'Kegiatan','kegiatan/form/'.$idKegiatan=>'Edit'),
                'result'        => $this->M_kegiatan->get_detail_kegiatan($idKegiatan)
            );
            $this->load->view('layout',$data);
        } else {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'Kegiatan',
                'konten'        => 'page/kegiatan/add',
                'breadcrumb'    => array('#'=>'Kegiatan','kegiatan/form'=>'Tambah'),
            );
            $this->load->view('layout',$data);
        }
    }

    function save() {
        if ($this->input->post('idKegiatan',TRUE)) {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE) ? $this->input->post('tanggal',TRUE) : date('Y-m-d'),
                'lat' => $this->input->post('lat',TRUE),
                'lng' => $this->input->post('lng',TRUE),
            );
            if ($_FILES['foto']['tmp_name']) {
                $config = array(
                    'upload_path'   => FCPATH.'/uploads/media/',
                    'allowed_types' => 'png|jpg|jpeg|gif',
                    'file_name'     => 'kegiatan_'.bin2hex(openssl_random_pseudo_bytes(6))
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('foto');
                if ($upload) {
                    $data = array_merge($data, array('foto' => $this->upload->data('file_name')));
                }
            }
            $process = $this->M_kegiatan->update_kegiatan($data, array('idKegiatan' => $this->input->post('idKegiatan',TRUE)));
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil memperbarui data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal memperbarui data'));
            }
            redirect('kegiatan/form/'.$this->input->post('idKegiatan',TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE) ? $this->input->post('tanggal',TRUE) : date('Y-m-d'),
                'lat' => $this->input->post('lat',TRUE),
                'lng' => $this->input->post('lng',TRUE),
            );
            if ($_FILES['foto']['tmp_name']) {
                $config = array(
                    'upload_path'   => FCPATH.'/uploads/media/',
                    'allowed_types' => 'png|jpg|jpeg|gif',
                    'file_name'     => 'kegiatan_'.bin2hex(openssl_random_pseudo_bytes(6))
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('foto');
                if ($upload) {
                    $data = array_merge($data, array('foto' => $this->upload->data('file_name')));
                }
            }
            $process = $this->M_kegiatan->insert_kegiatan($data, array('idKegiatan' => $this->input->post('idKegiatan',TRUE)));
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menyimpan data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menyimpan data'));
            }
            redirect('kegiatan/form');
        }
    }

    function delete($idKegiatan) {
        $result = $this->M_kegiatan->get_detail_kegiatan($idKegiatan);
        $process = $this->M_kegiatan->delete_kegiatan(array('idKegiatan'=>$idKegiatan));
        if ($process) {
            if ($result['gambar']!='no-image.jpg') {
                $file = 'uploads/media/'.$result['gambar'];
                if (file_exists($file)) unlink($file);
            }
            $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menghapus data'));
        } else {
            $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menghapus data'));
        }
        redirect('kegiatan');
    }
}
