<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("User_model");
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
	}

	public function index()
	{
        // load view admin/overview.php
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
		$this->load->view("admin/overview", $data);
	}
}