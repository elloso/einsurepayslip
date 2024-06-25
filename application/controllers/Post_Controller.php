<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Controller extends CI_Controller {
	public function loginforms()
	{
		$this->load->view('auth/loginview');
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
			$this->load->view('template/header');
			$this->load->view('admin/create_payroll');
			$this->load->view('template/footer');
		}else{
			redirect(base_url(''));
		}
	}
}
