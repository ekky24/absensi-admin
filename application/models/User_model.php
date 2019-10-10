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
        if (empty($user['pin'])) $user['pin'] = null;
        if (empty($user['nama'])) $user['nama'] = null;
        if (empty($user['pwd'])) $user['pwd'] = null;
        if (empty($user['rfid'])) $user['rfid'] = null;
        if (empty($user['privilege'])) $user['privilege'] = null;
        if (empty($user['jenis_kelamin'])) $user['jenis_kelamin'] = null;
        if (empty($user['tanggal_lahir'])) $user['tanggal_lahir'] = null;
        if (empty($user['alamat'])) $user['alamat'] = null;
        if (empty($user['tlp1'])) $user['tlp1'] = null;
        if (empty($user['tlp2'])) $user['tlp2'] = null;
        if (empty($user['wa'])) $user['wa'] = null;
        if (empty($user['email'])) $user['email'] = null;
        if (empty($user['kategori'])) $user['kategori'] = null;
        if (empty($user['ceramah'])) $user['ceramah'] = null;
        if (empty($user['pujabakti'])) $user['pujabakti'] = null;
        if (empty($user['meditasi'])) $user['meditasi'] = null;
        if (empty($user['dana_makan'])) $user['dana_makan'] = null;
        if (empty($user['baksos'])) $user['baksos'] = null;
        if (empty($user['fung_shen'])) $user['fung_shen'] = null;
        if (empty($user['sunskul'])) $user['sunskul'] = null;
        if (empty($user['bursa'])) $user['bursa'] = null;
        if (empty($user['olahraga'])) $user['olahraga'] = null;
        if (empty($user['baca_parita'])) $user['baca_parita'] = null;
        if (empty($user['diskusi_dhamma'])) $user['diskusi_dhamma'] = null;
        if (empty($user['seminar'])) $user['seminar'] = null;
        if (empty($user['kelas_dhamma'])) $user['kelas_dhamma'] = null;
        if (empty($user['jenis_kendaraan'])) $user['jenis_kendaraan'] = null;
        if (empty($user['no_kendaraan'])) $user['no_kendaraan'] = null;
        if (empty($user['status'])) $user['status'] = null;
        if (empty($user['tempat_lahir'])) $user['tempat_lahir'] = null;
        if (empty($user['goldar'])) $user['goldar'] = null;
        if (empty($user['nama_buddhist'])) $user['nama_buddhist'] = null;

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
            "diskusi_dhamma" => $user['diskusi_dhamma'],
            "seminar" => $user['seminar'],
            "kelas_dhamma" => $user['kelas_dhamma'],
            "jenis_kendaraan" => $user['jenis_kendaraan'],
            "no_kendaraan" => $user['no_kendaraan'],
            "status" => $user['status'],
            "tempat_lahir" => $user['tempat_lahir'],
            "goldar" => $user['goldar'],
            "nama_buddhist" => $user['nama_buddhist'],
        );

        $sql = $this->db->insert_string($this->_table, $data) . " ON DUPLICATE KEY UPDATE ";
        $sql = $sql . "nama='" . $user['nama'] . "',";
        $sql = $sql . "pwd='" . $user['pwd'] . "',";
        $sql = $sql . "rfid='" . $user['rfid'] . "',";
        $sql = $sql . "privilege='" . $user['privilege'] . "',";
        $sql = $sql . "jenis_kelamin='" . $user['jenis_kelamin'] . "',";
        $sql = $sql . "tanggal_lahir='" . $user['tanggal_lahir'] . "',";
        $sql = $sql . "alamat='" . $user['alamat'] . "',";
        $sql = $sql . "tlp1='" . $user['tlp1'] . "',";
        $sql = $sql . "tlp2='" . $user['tlp2'] . "',";
        $sql = $sql . "wa='" . $user['wa'] . "',";
        $sql = $sql . "email='" . $user['email'] . "',";
        $sql = $sql . "kategori='" . $user['kategori'] . "',";
        $sql = $sql . "ceramah='" . $user['ceramah'] . "',";
        $sql = $sql . "pujabakti='" . $user['pujabakti'] . "',";
        $sql = $sql . "meditasi='" . $user['meditasi'] . "',";
        $sql = $sql . "dana_makan='" . $user['dana_makan'] . "',";
        $sql = $sql . "baksos='" . $user['baksos'] . "',";
        $sql = $sql . "fung_shen='" . $user['fung_shen'] . "',";
        $sql = $sql . "sunskul='" . $user['sunskul'] . "',";
        $sql = $sql . "bursa='" . $user['bursa'] . "',";
        $sql = $sql . "olahraga='" . $user['olahraga'] . "',";
        $sql = $sql . "baca_parita='" . $user['baca_parita'] . "',";
        $sql = $sql . "diskusi_dhamma='" . $user['diskusi_dhamma'] . "',";
        $sql = $sql . "seminar='" . $user['seminar'] . "',";
        $sql = $sql . "kelas_dhamma='" . $user['kelas_dhamma'] . "',";
        $sql = $sql . "jenis_kendaraan='" . $user['jenis_kendaraan'] . "',";
        $sql = $sql . "no_kendaraan='" . $user['no_kendaraan'] . "',";
        $sql = $sql . "status='" . $user['status'] . "',";
        $sql = $sql . "tempat_lahir='" . $user['tempat_lahir'] . "',";
        $sql = $sql . "goldar='" . $user['goldar'] . "',";
        $sql = $sql . "nama_buddhist='" . $user['nama_buddhist'] . "'";

        $this->db->query($sql);
    }

    public function insertScanlog($scanlog)
    {
        if (empty($scanlog['sn'])) $scanlog['sn'] = null;
        if (empty($scanlog['scan_date'])) $scanlog['scan_date'] = null;
        if (empty($scanlog['pin'])) $scanlog['pin'] = null;
        if (empty($scanlog['verifymode'])) $scanlog['verifymode'] = null;
        if (empty($scanlog['iomode'])) $scanlog['iomode'] = null;
        if (empty($scanlog['workcode'])) $scanlog['workcode'] = null;
        if (empty($scanlog['status'])) $scanlog['status'] = null;

        $data = array(
            "sn" => $scanlog['sn'],
            "scan_date" => $scanlog['scan_date'],
            "pin" => $scanlog['pin'],
            "verifymode" => $scanlog['verifymode'],
            "iomode" => $scanlog['iomode'],
            "workcode" => $scanlog['workcode'],
            "status" => $scanlog['status'],
        );

        $sql = $this->db->insert_string($this->_table_filter, $data) . " ON DUPLICATE KEY UPDATE ";
        $sql = $sql . "sn='" . $scanlog['sn'] . "',";
        $sql = $sql . "scan_date='" . $scanlog['scan_date'] . "',";
        $sql = $sql . "pin='" . $scanlog['pin'] . "',";
        $sql = $sql . "verifymode='" . $scanlog['verifymode'] . "',";
        $sql = $sql . "iomode='" . $scanlog['iomode'] . "',";
        $sql = $sql . "workcode='" . $scanlog['workcode'] . "',";
        $sql = $sql . "status='" . $scanlog['status'] . "'";

        $this->db->query($sql);
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