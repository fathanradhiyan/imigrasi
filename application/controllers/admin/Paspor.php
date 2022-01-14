<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paspor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Paspor_model");
        $this->load->library('form_validation');
        $this->load->model("User_model");
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
    }

    public function index()
    {
        $data["paspor"] = $this->Paspor_model->getAll();
        $this->load->view("admin/paspors/list", $data);
       
    }

    public function add()
    {
        $paspors = $this->Paspor_model;
        $validation = $this->form_validation;
        $validation->set_rules($paspors->rules());

        if ($validation->run()) {
            $paspors->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/paspors/add_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/paspor');
       
        $paspors = $this->Paspor_model;
        $validation = $this->form_validation;
        $validation->set_rules($paspors->rules());

        if ($validation->run()) {
            $paspors->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["paspors"] = $paspors->getById($id);
        if (!$data["paspors"]) show_404();
        
        $this->load->view("admin/paspors/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Paspor_model->delete($id)) {
            redirect(site_url('admin/paspor'));
        }
    }

    public function _uploadFile()
    {
    $config['upload_path']          = './upload/paspors/';
    $config['allowed_types']        = 'pdf|docx|zip|rar';
    $config['file_name']            = $this->nama;
    $config['overwrite']			= true;
    $config['max_size']             = 10240; // 10MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
        return $this->upload->data("file_name");
    }
    
    return "default.pdf";
    }

    public function _deleteFile($id)
    {
    $paspors = $this->Paspor_model->getById($id);
    if ($paspors->file != "default.pdf") {
	    $file_name = explode(".", $paspors->file)[0];
		return array_map('unlink', glob(FCPATH."upload/paspors/$file_name.*"));
        }
    }

    function file(){
        $name = $this->uri->segment(3);
        $data = file_get_contents("./upload/paspors/".$name);
        force_download($name, $data);
    }
}