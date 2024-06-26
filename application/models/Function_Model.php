
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Function_Model extends CI_Model
{
    public function insert_user($data) {
        return $this->db->insert('tbl_users', $data);
    }
    public function mode_authenticate($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('tbl_users');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function updatesubmitaccount($User_id,$Data) {
        $this->db->where('md5(user_id)', $User_id);
        $this->db->update('tbl_users',$Data);
        return $this->db->affected_rows() > 0;
    }
    public function submitdeleteuser($salesrep_id) {
        $this->db->where('md5(user_id)', $salesrep_id);
        $this->db->delete('tbl_users');
        
        return $this->db->affected_rows();
    }
    public function submitsalesrep($data) {
        return $this->db->insert('tbl_salesreplist', $data);
    }
    public function updatesubmitsalesrep($User_id,$Data) {
        $this->db->where('md5(srep_userid)', $User_id);
        $this->db->update('tbl_salesreplist',$Data);
        return $this->db->affected_rows() > 0;
    }
    public function submitdeletesalesrep($salesrep_id) {
        $this->db->where('md5(srep_userid)', $salesrep_id);
        $this->db->delete('tbl_salesreplist');
        
        return $this->db->affected_rows();
    }
   
    //AJAX
    public function name_exists($fullname){
        $this->db->where('full_name', $fullname);
        $query = $this->db->get('tbl_salesreplist');
        return $query->num_rows() > 0;
    }
    public function get_bonus_by_rep($repName) {
        $this->db->select('bonus');
        $this->db->from('tbl_salesreplist');
        $this->db->where('full_name', $repName);
        $query = $this->db->get();
        return $query->row()->bonus;
    }
    //FPDF Data
    public function salesrep_data($Salerepname){
        $this->db->select('*'); 
        $this->db->where('full_name',$Salerepname);
        $query = $this->db->get('tbl_salesreplist');

        if ($query->num_rows() > 0) {
            return $query->row();
        } 
    }
}