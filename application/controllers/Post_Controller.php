<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Controller extends CI_Controller {
	public function loginforms()
	{
		$this->load->view('auth/loginview');
	}
	public function accountlist()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['Users'] = $this->post->showuseraccount();
			$this->load->view('template/header',$data);
			$this->load->view('admin/accountlist');
			$this->load->view('template/footer');
		}else{
			redirect(base_url(''));
		}
	}
	public function dashboardforms()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->load->view('template/header');
			$this->load->view('view-forms/dashboard');
			$this->load->view('template/footer');
		}else{
			redirect(base_url(''));
		}
	}
	public function new_salesrep()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['lists'] = $this->post->showlistsalesrep();
			$this->load->view('template/header',$data);
			$this->load->view('admin/list_salesrep');
			$this->load->view('template/footer');
		}else{
			redirect(base_url(''));
		}
	}
	public function create_payrollforms()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['Users'] = $this->post->showlistsalesrep();
			$data['Details'] = $this->post->showspecificlistsalesrep();
			$this->load->view('template/header',$data);
			$this->load->view('admin/create_payroll');
			$this->load->view('template/footer');
		}else{
			redirect(base_url(''));
		}
	}
//AJAX
	public function fetch_data_salesrep()
		{
			$salesrep_id = $this->input->post('salesrepid');
			$data['Data'] = $this->post->get_data_by_salesrep($salesrep_id); 
			$this->load->view('admin/edit_salesprofile', $data);
		}
	public function fetch_data_useraccount()
		{
			$salesrep_id = $this->input->post('accountid');
			$data['Data'] = $this->post->get_data_by_accountid($salesrep_id); 
			$this->load->view('admin/edit_userprofile', $data);
		}
}




