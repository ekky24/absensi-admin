<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

	public function login()
	{
		$this->load->view('login');
	}

	public function attempt()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$validation = $this->form_validation;
        $validation->set_rules($this->admin_model->rules());

		$cek = $this->admin_model->login_attempt($email, $password)->num_rows();
		
		if($cek > 0){
	 
			$data_session = array(
				'email' => $email,
			);
	 
			$this->session->set_userdata($data_session);
			redirect("user");
		} else {
			$this->session->set_flashdata('message', 'Email atau Password Salah');
			redirect("admin/login");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("admin/login");
	}

	public function ubah_password() 
	{
		if(empty($this->session->userdata('email'))) {
            redirect('admin/login');
        }
		$this->load->view('ubah_password');
	}

	public function simpan_password() 
	{
		$password_lama = md5($this->input->post('password_lama'));
		$password_baru = md5($this->input->post('password_baru'));
		$konfirmasi = md5($this->input->post('konfirmasi'));

		$data = $this->admin_model->login_attempt($this->session->userdata('email'), $password_lama)->row();

		if ($password_lama == $data->password) {
			if ($password_baru == $konfirmasi) {
				$this->admin_model->ubah_password($this->session->userdata('email'), $password_baru);
			}
			else {
				$this->session->set_flashdata('message', 'Password baru dan konfirmasi tidak sama');
				redirect("admin/ubah_password");
			}
		}
		else {
			$this->session->set_flashdata('message', 'Password lama salah');
			redirect("admin/ubah_password");
		}

		$this->session->set_flashdata('success', 'Password berhasil diubah');
		redirect("user");
	}	
}