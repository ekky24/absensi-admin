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

	public function login()
	{
		$this->load->view('login');
	}

	public function attempt()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$validation = $this->form_validation;
        $validation->set_rules($this->user_model->rules());

		$cek = $this->user_model->login_attempt($email, $password)->num_rows();
		
		if($cek > 0){
	 
			$data_session = array(
				'email' => $email,
			);
	 
			$this->session->set_userdata($data_session);
			redirect("overview");
		} else {
			$this->session->set_flashdata('message', 'Email atau Password Salah');
			redirect("user/login");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("user/login");
	}

	public function ubah_password() 
	{
		$this->load->view('ubah_password');
	}

	public function simpan_password() 
	{
		$password_lama = md5($this->input->post('password_lama'));
		$password_baru = md5($this->input->post('password_baru'));
		$konfirmasi = md5($this->input->post('konfirmasi'));

		$data = $this->user_model->login_attempt($this->session->userdata('email'), $password_lama)->row();

		if ($password_lama == $data->password) {
			if ($password_baru == $konfirmasi) {
				echo "string";
				$this->user_model->ubah_password($this->session->userdata('email'), $password_baru);
			}
			else {
				echo "lalala";
				$this->session->set_flashdata('message', 'Password baru dan konfirmasi tidak sama');
				redirect("user/ubah_password");
			}
		}
		else {
			echo "asdasd";
			$this->session->set_flashdata('message', 'Password lama salah');
			redirect("user/ubah_password");
		}

		$this->session->set_flashdata('success', 'Password berhasil diubah');
		redirect("overview");
	}	
}