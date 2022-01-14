<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
		$this->load->model("User_model");
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
	}

	public function index()
	{
        // load view op/overview.php
        $this->load->view("op/overview");
	}
}