<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Function_Controller extends CI_Controller {
	
    public function function_authenticate() {
        $this->form_validation->set_rules('txtUsername', 'Username', 'required');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect(base_url(''));
        } else {
            $username = $this->input->post('txtUsername');
            $password = $this->input->post('txtPassword');
            $user = $this->function->mode_authenticate($username, $password);

            if ($user) {
                $session_data = array(
                    'user_id' => $user->user_id, 
                    'username' => $user->username, 
                    'user_type' => $user->user_type,
                    'logged_in' => TRUE
                );
                    $this->session->set_userdata($session_data);
                    redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Invalid account please contract System Administrator.');
                redirect(base_url(''));
            }
        }
    }
    public function function_newsalesrep(){
        $data = array(
            'full_name' => strip_tags($this->input->post('txtforms_fullname')),
            'commission_rate' => strip_tags($this->input->post('txtforms_commission')),
            'tax_rate' => strip_tags($this->input->post('txtforms_taxrate')),
            'bonus' => $this->input->post('txtforms_bonus')
        );
        $result = $this->function->submitsalesrep($data);
            if ($result) {
                $this->session->set_flashdata('success', 'New Sales Representative successfully added.');
                redirect(base_url('add-salesrep'));
            } else {
                $this->session->set_flashdata('error', 'Failed to add new Sales Representative.');
                redirect(base_url('add-salesrep'));
            }
        
    }
    public function logout() {
        $this->session->unset_userdata('useruser_id_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url(''));
    }

}
