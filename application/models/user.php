<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model
{
    function __construct() {
        $this->tableName = 'usersfb';
        $this->primaryKey = 'id';
    }

    public function checkUser($data = array())
    {
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = $this->waktu();
            $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
            // $data['created'] = date("Y-m-d H:i:s");
            // $data['modified'] = $this->waktu();
            $data['created'] = $this->waktu();
            $data['modified'] = $this->waktu();
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }

    public function waktu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $jam = date("H:i:s");
        return $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y")." ".$jam;
    }
}