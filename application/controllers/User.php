<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        /* cek session */
        if (empty(userSession('id'))) {
            redirect('auth');
        }
        // load model
        $this->load->model('M_user');
    }

    function index() {
        $data = array(
            'level'         => $this->session->userdata('level'),
            'user'          => 'admin',
            'title'         => 'User',
            'konten'        => 'page/user/index',
            'breadcrumb'    => array('#'=>'User','user'=>'List'),
            'data'          => $this->M_user->get_list_user()
        );
        $this->load->view('layout',$data);
    }

    function form($idUser = "") {
        if ($idUser) {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'User',
                'konten'        => 'page/user/edit',
                'breadcrumb'    => array('#'=>'User','user/form/'.$idUser=>'Edit'),
                'result'        => $this->M_user->get_detail_user($idUser)
            );
            $this->load->view('layout',$data);
        } else {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'User',
                'konten'        => 'page/user/add',
                'breadcrumb'    => array('#'=>'User','user/form'=>'Tambah'),
            );
            $this->load->view('layout',$data);
        }
    }

    function save() {
        if ($this->input->post('idUser',TRUE)) {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'nohp' => $this->input->post('nohp',TRUE),
                'email' => $this->input->post('email',TRUE),
                'username' => $this->input->post('username',TRUE),
            );
            if ($this->input->post('password',TRUE)) {
                $data = array_merge($data,array('password'=>md5($this->input->post('nama',TRUE))));
            }
            if ($_FILES['foto']['tmp_name']) {
                $config = array(
                    'upload_path'   => FCPATH.'/uploads/media/',
                    'allowed_types' => 'png|jpg|jpeg|gif',
                    'file_name'     => 'user_'.bin2hex(openssl_random_pseudo_bytes(6))
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('foto');
                if ($upload) {
                    $data = array_merge($data, array('foto' => $this->upload->data('file_name')));
                }
            }
            $process = $this->M_user->update_user($data, array('idUser' => $this->input->post('idUser',TRUE)));
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil memperbarui data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal memperbarui data'));
            }
            redirect('user/form/'.$this->input->post('idUser',TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'nohp' => $this->input->post('nohp',TRUE),
                'email' => $this->input->post('email',TRUE),
                'username' => $this->input->post('username',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
            );
            if ($_FILES['foto']['tmp_name']) {
                $config = array(
                    'upload_path'   => FCPATH.'/uploads/media/',
                    'allowed_types' => 'png|jpg|jpeg|gif',
                    'file_name'     => 'user_'.bin2hex(openssl_random_pseudo_bytes(6))
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('foto');
                if ($upload) {
                    $data = array_merge($data, array('foto' => $this->upload->data('file_name')));
                }
            }
            $process = $this->M_user->insert_user($data, array('idUser' => $this->input->post('idUser',TRUE)));
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menyimpan data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menyimpan data'));
            }
            redirect('user/form');
        }
    }

    function delete($idUser) {
        $result = $this->M_user->get_detail_berita($idUser);
        $process = $this->M_user->delete_user(array('idUser'=>$idUser));
        if ($process) {
            if ($result['foto']!='no-photo.png') {
                $file = 'uploads/media/'.$result['foto'];
                if (file_exists($file)) unlink($file);
            }
            $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menghapus data'));
        } else {
            $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menghapus data'));
        }
        redirect('user');
    }
}
