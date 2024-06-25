
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


}