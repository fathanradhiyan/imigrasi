<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('PasporGrafik_model');
		$this->load->model('User_model');
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
    }

	function index()
	{
	  $data['hasil']=$this->PasporGrafik_model->jumlahpaspor();
	  $this->load->view('admin/paspors/grafik',$data);
	}
}
?>