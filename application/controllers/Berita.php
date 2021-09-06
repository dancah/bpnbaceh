<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        /* cek session */
        if (empty(userSession('id'))) {
            redirect('auth');
        }
        // load model
        $this->load->model('M_berita');
    }

    function index() {
        $data = array(
            'level'         => $this->session->userdata('level'),
            'user'          => 'admin',
            'title'         => 'Berita',
            'konten'        => 'page/berita/index',
            'breadcrumb'    => array('#'=>'Berita','berita'=>'List'),
            'data'          => $this->M_berita->get_list_berita()
        );
        $this->load->view('layout',$data);
    }

    function form($idBerita = "") {
        if ($idBerita) {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'Berita',
                'konten'        => 'page/berita/edit',
                'breadcrumb'    => array('#'=>'Berita','berita/form/'.$idBerita=>'Edit'),
                'result'        => $this->M_berita->get_detail_berita($idBerita)
            );
            $this->load->view('layout',$data);
        } else {
            $data = array(
                'level'         => $this->session->userdata('level'),
                'user'          => 'admin',
                'title'         => 'Berita',
                'konten'        => 'page/berita/add',
                'breadcrumb'    => array('#'=>'Berita','berita/form'=>'Tambah'),
            );
            $this->load->view('layout',$data);
        }
    }

    function save() {
        if ($this->input->post('idBerita',TRUE)) {
            $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE) ? $this->input->post('tanggal',TRUE) : date('Y-m-d H:i:s'),
                'text' => $this->input->post('text',TRUE),
            );
            if ($_FILES['gambar']['tmp_name']) {
                $config = array(
                    'upload_path'   => FCPATH.'/uploads/media/',
                    'allowed_types' => 'png|jpg|jpeg|gif',
                    'file_name'     => 'berita_'.bin2hex(openssl_random_pseudo_bytes(6))
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('gambar');
                if ($upload) {
                    $data = array_merge($data, array('gambar' => $this->upload->data('file_name')));
                }
            }
            $process = $this->M_berita->update_berita($data, array('idBerita' => $this->input->post('idBerita',TRUE)));
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil memperbarui data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal memperbarui data'));
            }
            redirect('berita/form/'.$this->input->post('idBerita',TRUE));
        } else {
            $data = array(
                'judul' => $this->input->post('judul',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE) ? $this->input->post('tanggal',TRUE) : date('Y-m-d H:i:s'),
                'text' => $this->input->post('text',TRUE),
            );
            if ($_FILES['gambar']['tmp_name']) {
                $config = array(
                    'upload_path'   => FCPATH.'/uploads/media/',
                    'allowed_types' => 'png|jpg|jpeg|gif',
                    'file_name'     => 'berita_'.bin2hex(openssl_random_pseudo_bytes(6))
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('gambar');
                if ($upload) {
                    $data = array_merge($data, array('gambar' => $this->upload->data('file_name')));
                }
            }
            $process = $this->M_berita->insert_berita($data);
            if ($process) {
                $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menyimpan data'));
            } else {
                $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menyimpan data'));
            }
            redirect('berita/form');
        }
    }

    function delete($idBerita) {
        $result = $this->M_berita->get_detail_berita($idBerita);
        $process = $this->M_berita->delete_berita(array('idBerita'=>$idBerita));
        if ($process) {
            if ($result['gambar']!='no-image.jpg') {
                $file = 'uploads/media/'.$result['gambar'];
                if (file_exists($file)) unlink($file);
            }
            $this->session->set_flashdata(array('alert' => 'success', 'message' => 'Berhasil menghapus data'));
        } else {
            $this->session->set_flashdata(array('alert' => 'error', 'message' => 'Gagal menghapus data'));
        }
        redirect('berita');
    }

    function image_upload(){
        $this->load->library('upload');
        //
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './uploads/media/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/media/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './uploads/media/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'/uploads/media/'.$data['file_name'];
            }
        }
    }

    function image_delete(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name)){
            echo 'File Delete Successfully';
        }
    }
}
