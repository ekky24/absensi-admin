<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";
    private $_table_filter = "scanlog";
    private $_table_image = "image";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pin" => $id])->row();
    }

    public function getByFilter($tgl_awal, $tgl_akhir)
    {
        if ($tgl_awal == null) {
            $sql = "SELECT user.nama, COUNT(*) as count FROM `user` INNER JOIN `scanlog` ON user.pin = scanlog.pin GROUP BY scanlog.pin";
        }
        else {
            $sql = "SELECT user.nama, COUNT(*) as count FROM `user` INNER JOIN `scanlog` ON user.pin = scanlog.pin WHERE scanlog.scan_date >= '" . $tgl_awal . "' and scanlog.scan_date <= '" . $tgl_akhir . "' GROUP BY scanlog.pin";
        }
        
        return $this->db->query($sql)->result();
    }

    public function insertUser($user)
    {
        $data = array(
            "pin" => $user['pin'],
            "nama" => $user['nama'],
            "pwd" => $user['pwd'],
            "rfid" => $user['rfid'],
            "privilege" => $user['privilege'],
            "jenis_kelamin" => $user['jenis_kelamin'],
            "tanggal_lahir" => $user['tanggal_lahir'],
            "alamat" => $user['alamat'],
            "tlp1" => $user['tlp1'],
            "tlp2" => $user['tlp2'],
            "wa" => $user['wa'],
            "email" => $user['email'],
            "kategori" => $user['kategori'],
            "ceramah" => $user['ceramah'],
            "pujabakti" => $user['pujabakti'],
            "meditasi" => $user['meditasi'],
            "dana_makan" => $user['dana_makan'],
            "baksos" => $user['baksos'],
            "fung_shen" => $user['fung_shen'],
            "sunskul" => $user['sunskul'],
            "bursa" => $user['bursa'],
            "olahraga" => $user['olahraga'],
            "baca_parita" => $user['baca_parita'],
            "jenis_kendaraan" => $user['jenis_kendaraan'],
            "no_kendaraan" => $user['no_kendaraan'],
        );

        $this->db->insert($this->_table, $data);
    }

    public function insertScanlog($scanlog)
    {
        $data = array(
            "sn" => $scanlog['sn'],
            "scan_date" => $scanlog['scan_date'],
            "pin" => $scanlog['pin'],
            "verifymode" => $scanlog['verifymode'],
            "iomode" => $scanlog['iomode'],
            "workcode" => $scanlog['workcode'],
        );

        $this->db->insert($this->_table_filter, $data);
    }

    public function insertImage($pin, $filename)
    {
        $data = array(
            "pin" => $pin,
            "filename" => $filename,
        );

        $this->db->insert($this->_table_image, $data);
    }

    public function deleteImage($filename)
    {
        $this->db->delete($this->_table_image, array("filename" => $filename));
    }

    public function deleteAllUser()
    {
        $this->db->empty_table($this->_table);
    }

    public function deleteAllScanlog()
    {
        $this->db->empty_table($this->_table_filter);
    }
}