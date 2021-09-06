<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
    }

    function index() {
        $this->load->view('page/login');
    }

    function login() {
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $data_user = $this->M_auth->get_detail_user(array($username, $password));
        if ($data_user) {
            $data_session = array(
                'id' => $data_user['idUser'],
                'nama' => $data_user['nama'],
                'nohp' => $data_user['nohp'],
                'email' => $data_user['email'],
                'foto' => $data_user['foto'],
                'level' => '1'
            );
            $this->session->set_userdata($data_session);
            redirect('home');
        } else {
            $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Username atau password Anda salah'));
            redirect('auth');
        }
    }

    function logout () {
        // update status login
        $session = $this->session->userdata();
        // destroy session
        $this->session->sess_destroy();
        //
        redirect('auth','refresh');
    }

    function profile() {
        $data = array(
            'level'     => '1',
            'user'      => 'admin',
            'title'     => 'Profil',
            'breadcrumb'=> array('#'=>'Home','auth/profile'=>'Profil'),
            'konten'    => 'page/profil',
            'data'      => $this->M_auth->get_detail_user_by_id(userSession('id'))
        );

        $this->load->view('layout',$data);
    }

    function profile_save() {
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
                    'upload_path'   => FCPATH.'/uploads/user/',
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
            $process = $this->M_auth->update_user($data, array('idUser' => $this->input->post('idUser',TRUE)));
            if ($process) {
                $data_user = $this->M_auth->get_detail_user_by_id($this->input->post('idUser',TRUE));
                // refresh session
                $data_session = array(
                    'id'    => $data_user['idUser'],
                    'nama'  => $data_user['nama'],
                    'nohp'  => $data_user['nohp'],
                    'email' => $data_user['email'],
                    'foto'  => $data_user['foto'],
                    'level' => '1'
                );
                $this->session->set_userdata($data_session);
                //
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil memperbarui data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal memperbarui data'));
            }
            redirect('auth/profile');
        } 
    }

}
