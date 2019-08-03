<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    private $_table = "admin";

    public $email;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],
        ];
    }

    public function login_attempt($email, $password)
    {
        return $this->db->get_where($this->_table, ["email" => $email, "password" => $password]);
    }

    public function ubah_password($email, $password_baru)
    {
        $this->email = $email;
        $this->password = $password_baru;
        $this->db->update($this->_table, $this, array('email' => $email));        
    }
}