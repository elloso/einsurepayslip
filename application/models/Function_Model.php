
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Function_Model extends CI_Model
{
    public function mode_authenticate($username, $password) {
        $query = $this->db->get_where('tbl_users', array('username' => $username, 'password' => $password));

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function submitsalesrep($data) {
        return $this->db->insert('tbl_salesreplist', $data);
    }

    

}