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
        $data["users"] = $this->user_model->getAll();
        $this->load->view('index', $data);
    }

    public function laporan() 
    {
    	$tgl_awal = $this->input->post('tgl_awal');
    	$tgl_akhir = $this->input->post('tgl_akhir');

    	$data['users'] = $this->user_model->getByFilter($tgl_awal, $tgl_akhir);
    	$data['tgl_awal'] = $tgl_awal;
    	$data['tgl_akhir'] = $tgl_akhir;

    	$this->load->view('laporan', $data);	
    }

    public function form_json()
    {
    	$this->load->view('form_json');
    }

    public function upload_json()
    {
    	$config['upload_path']          = './upload/json/';
        $config['allowed_types']        = '*';
        $config['file_name']            = 'backup';
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('json')) {
            redirect('user/form_json');
        }

        $this->user_model->deleteAll();
        
        $temp = file_get_contents("./upload/json/backup.json");
        $users = json_decode($temp, true);

        foreach ($users['user'] as $user) {
            $this->user_model->insert($user);
        }

        unlink('./upload/json/backup.json');
    }
}
