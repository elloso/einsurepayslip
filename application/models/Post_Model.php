
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_Model extends CI_Model
{
    public function showlistsalesrep(){
        $query = $this->db->get('tbl_salesreplist');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function showspecificlistsalesrep(){
        $query = $this->db->get('tbl_salesreplist');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function showuseraccount(){
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//AJAX
public function get_data_by_salesrep($dataid) {
    $this->db->select('*'); 
    $this->db->from('tbl_salesreplist');
    $this->db->where('srep_userid', $dataid); 
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row(); 
    } else {
        return false; 
    }
}
public function get_data_by_accountid($userid) {
    $this->db->select('*'); 
    $this->db->from('tbl_users');
    $this->db->where('user_id', $userid); 
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row(); 
    } else {
        return false; 
    }
}


    


}