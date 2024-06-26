<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Function_Controller extends CI_Controller {
 
    // public function save_user() {
    //     $this->form_validation->set_rules('txtform_fullname', 'Fullname', 'required');
    //     $this->form_validation->set_rules('txtform_username', 'Username', 'required');
    //     $this->form_validation->set_rules('txtform_password', 'Password', 'required');
    //     $this->form_validation->set_rules('txtform_email', 'Email', 'required|valid_email');
        
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('accountsettings');
    //     } else {
    //         $data = array(
    //             'full_name' => $this->input->post('txtform_fullname'),
    //             'username' => $this->input->post('txtform_username'),
    //             'password' => md5($this->input->post('txtform_password')), 
    //             'email' => $this->input->post('txtform_email'),
    //             'user_type' => $this->input->post('useraccounttpe')
    //         );
    //         if ($this->function->insert_user($data)) {
    //             $this->session->set_flashdata('success', 'New User account registered');
    //             redirect(base_url('accountsettings'));
    //         } else {
    //             $this->session->set_flashdata('error', 'Failed to add account');
    //             redirect(base_url('accountsettings'));
    //         }
    //     }
    // }
    // public function function_authenticate() {
    //     $this->form_validation->set_rules('txtUsername', 'Username', 'required');
    //     $this->form_validation->set_rules('txtPassword', 'Password', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         redirect(base_url(''));
    //     } else {
    //         $username = $this->input->post('txtUsername');
    //         $password = md5($this->input->post('txtPassword'));
    //         $user = $this->function->mode_authenticate($username, $password);

    //         if ($user) {
    //             $session_data = array(
    //                 'user_id' => $user->user_id, 
    //                 'username' => $user->username, 
    //                 'user_type' => $user->user_type,
    //                 'logged_in' => TRUE
    //             );
    //                 $this->session->set_userdata($session_data);
    //                 redirect(base_url('dashboard'));
    //         } else {
    //             $this->session->set_flashdata('error', 'Invalid account please contract System Administrator.');
    //             redirect(base_url(''));
    //         }
    //     }
    // }
    public function save_user() {
        $this->form_validation->set_rules('txtform_fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('txtform_username', 'Username', 'required');
        $this->form_validation->set_rules('txtform_password', 'Password', 'required');
        $this->form_validation->set_rules('txtform_email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('accountsettings');
        } else {
            $password_hash = password_hash($this->input->post('txtform_password'), PASSWORD_DEFAULT);
            $data = array(
                'full_name' => $this->input->post('txtform_fullname'),
                'username' => $this->input->post('txtform_username'),
                'password' => $password_hash,
                'email' => $this->input->post('txtform_email'),
                'user_type' => $this->input->post('useraccounttpe')
            );
            if ($this->function->insert_user($data)) {
                $this->session->set_flashdata('success', 'New User account registered');
                redirect(base_url('accountsettings'));
            } else {
                $this->session->set_flashdata('error', 'Failed to add account');
                redirect(base_url('accountsettings'));
            }
        }
    }
    
    public function function_authenticate() {
        $this->form_validation->set_rules('txtUsername', 'Username', 'required');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url(''));
        } else {
            $username = $this->input->post('txtUsername');
            $password = $this->input->post('txtPassword');
            $user = $this->function->mode_authenticate($username);
    
            if ($user && password_verify($password, $user->password)) {
                $session_data = array(
                    'user_id' => $user->user_id, 
                    'username' => $user->username, 
                    'user_type' => $user->user_type,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Invalid account please contact System Administrator.');
                redirect(base_url(''));
            }
        }
    }
    // public function function_updateuseraccount(){
    //     $User_ID = $this->input->post('txtforms_id');
    //     $data = array(
    //         'full_name' => strip_tags($this->input->post('txtform_fullname')),
    //         'username' => strip_tags($this->input->post('txtform_username')),
    //         'email' => $this->input->post('txtform_email'),
    //         'user_type' => $this->input->post('useraccounttpe'),
    //     );
    //     $result = $this->function->updatesubmitaccount($User_ID,$data);
    //         if ($result) {
    //             $this->session->set_flashdata('success', 'Sales profile Representative successfully changed.');
    //             redirect(base_url('accountsettings'));
    //         } else {
    //             $this->session->set_flashdata('error', 'Failed to update Sales Representative profile.');
    //             redirect(base_url('accountsettings'));
    //         }
    // }
    public function function_updateuseraccount() {
        $this->form_validation->set_rules('txtforms_id', 'User ID', 'required');
        $this->form_validation->set_rules('txtform_fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('txtform_username', 'Username', 'required');
        $this->form_validation->set_rules('txtform_email', 'Email', 'required|valid_email');
    
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('accountsettings'));
        } else {
            $data = array(
                'full_name' => $this->input->post('txtform_fullname'),
                'username' => $this->input->post('txtform_username'),
                'email' => $this->input->post('txtform_email'),
                'user_type' => $this->input->post('useraccounttpe')
            );
    
            $new_password = $this->input->post('txtform_password');
            $confirm_password = $this->input->post('txtconfirmform_password');
    
            if (!empty($new_password) && !empty($confirm_password) && $new_password === $confirm_password) {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $data['password'] = $password_hash;
            }
            $user_id = $this->input->post('txtforms_id');
            $result = $this->function->updatesubmitaccount($user_id, $data);
            if ($result) {
                $this->session->set_flashdata('success', 'User account updated');
                redirect(base_url('accountsettings'));
            } else {
                $this->session->set_flashdata('error', 'Failed to update account');
                redirect(base_url('accountsettings'));
            }
        }
    }
    public function function_deleteduseraccount($user_id){
        $result = $this->function->submitdeleteuser($user_id);
            if ($result) {
                $this->session->set_flashdata('success', 'User Account successfully deleted.');
                redirect(base_url('accountsettings'));
            } else {
                $this->session->set_flashdata('error', 'Failed to delete User Account.');
                redirect(base_url('accountsettings'));
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
    public function function_updatesalesrep(){
        $User_ID = $this->input->post('txtforms_id');
        $data = array(
            'full_name' => strip_tags($this->input->post('txtforms_fullname')),
            'commission_rate' => strip_tags($this->input->post('txtforms_commission')),
            'tax_rate' => strip_tags($this->input->post('txtforms_taxrate')),
            'bonus' => $this->input->post('txtforms_bonus')
        );
        $result = $this->function->updatesubmitsalesrep($User_ID,$data);
            if ($result) {
                $this->session->set_flashdata('success', 'Sales profile Representative successfully changed.');
                redirect(base_url('add-salesrep'));
            } else {
                $this->session->set_flashdata('error', 'Failed to update Sales Representative profile.');
                redirect(base_url('add-salesrep'));
            }
    }
    public function function_deletedatesalesrep($salesrep_id){
        $result = $this->function->submitdeletesalesrep($salesrep_id);
            if ($result) {
                $this->session->set_flashdata('success', 'Sales profile Representative successfully deleted.');
                redirect(base_url('add-salesrep'));
            } else {
                $this->session->set_flashdata('error', 'Failed to delete Sales Representative profile.');
                redirect(base_url('add-salesrep'));
            }
    }
    

// AJAX
    public function check_salesrep_exists(){
        $fullname = $this->input->post('txtforms_fullname');
        $exists = $this->function->name_exists($fullname);
        echo json_encode(array('exists' => $exists));
    }
    public function fetch_bonus() {
        $repName = $this->input->post('repName');
        $bonus = $this->function->get_bonus_by_rep($repName);
        echo json_encode(['bonus' => $bonus]);
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
