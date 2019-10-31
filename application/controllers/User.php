<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        $data["users"] = $this->user_model->getAll();
        $this->load->view('index', $data);
    }

    public function laporan() 
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        if ($tgl_awal > $tgl_akhir) {
            $this->session->set_flashdata('message', 'Masukkan tanggal dengan benar');
            redirect("user/laporan");
        }

        $data['users'] = $this->user_model->getByFilter($tgl_awal, $tgl_akhir);
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        $this->load->view('laporan', $data);    
    }

    public function form_json()
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        $this->load->view('form_json');
    }

    public function form_foto($id)
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        $data['user'] = $this->user_model->getById($id);
        $this->load->view('form_foto', $data);
    }

    public function upload_foto($id)
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        date_default_timezone_set('Asia/Jakarta');
        $now = time();
        $pin = $id;
        $filename = $pin . '_' . $now;

        $config['upload_path']          = './upload/foto/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '2048';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $this->user_model->insertImage($pin, $this->upload->data('file_name'));
        }

        redirect('user');
    }

    public function show_foto($id)
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        $file_list = array();
        $dir = './upload/foto/';

        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {

            while (($file = readdir($dh)) !== false){
                if($file != '' && $file != '.' && $file != '..') {
                    if (substr($file, 0, 1) == $id) {
                        $file_path = $dir.$file;

                        if(!is_dir($file_path)){
                            $size = filesize($file_path);
                            $file_list[] = array('name'=>$file,'size'=>$size,'path'=>base_url('upload/foto/' . $file));
                        }
                    }
                }
            }
            closedir($dh);
            }
        }
        echo json_encode($file_list);
    }

    public function view_foto($filename)
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        $dir = "./upload/foto/" . $filename;
        if(file_exists($dir)){ 
          $mime = mime_content_type($dir);
          header('Content-Length: '.filesize($dir));
          header("Content-Type: $mime");
          header('Content-Disposition: inline; filename="'.$dir.'";');
          readfile($dir);
          die();
          exit;
        }
    }

    public function delete_foto()
    {
        if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
        $dir = './upload/foto/';
        $filename = $_POST['name'];
        $filepath = $dir.$filename;
        unlink($filepath);

        $this->user_model->deleteImage($filename);        
        exit;
    }

    public function sync_user()
    {
        $stream = $this->input->post('inputpost');
        $users = json_decode($stream, true);
        $result = "";

        foreach ($users as $user) {
            $result = $this->user_model->insertUser($user);
            if ($result != 'berhasil') {
                break;
            }
        }

        echo $result;
    }

    public function sync_scanlog()
    {
        $stream = $this->input->post('inputpost');
        $scanlogs = json_decode($stream, true);

        foreach ($scanlogs as $scanlog) {
            $result = $this->user_model->insertScanlog($scanlog);
            if ($result != 'berhasil') {
                break;
            }
        }
        echo $result;
    }
}
