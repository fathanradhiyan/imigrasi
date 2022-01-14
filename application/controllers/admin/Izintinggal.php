<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Izintinggal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Izintinggal_model");
        $this->load->library('form_validation');
        $this->load->model("User_model");
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
    }

    public function index()
    {
        $data["izintinggal"] = $this->Izintinggal_model->getAll();
        $this->data['jenislayanan'] = $this->Izintinggal_model->get_layanan();
        $this->load->view("admin/izintinggals/list", $data);
        

    }

    public function add()
    {
        $izintinggals = $this->Izintinggal_model;
        $validation = $this->form_validation;
        $validation->set_rules($izintinggals->rules());
        $data['jenislayanan'] = $this->Izintinggal_model->get_layanan();

        if ($validation->run()) {
            $izintinggals->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/izintinggals/add_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/izintinggal');
       
        $izintinggals = $this->Izintinggal_model;
        $validation = $this->form_validation;
        $validation->set_rules($izintinggals->rules());
        $data['jenislayanan'] = $this->Izintinggal_model->get_layanan();

        if ($validation->run()) {
            $izintinggals->update();
            $this->session->set_flashdata('success', 'Berhasil diedit');
        }

        $data["izintinggals"] = $izintinggals->getById($id);
        if (!$data["izintinggals"]) show_404();
        
        $this->load->view("admin/izintinggals/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Izintinggal_model->delete($id)) {
            redirect(site_url('admin/izintinggal'));
        }
    }

    public function _uploadFile()
    {
    $config['upload_path']          = './upload/izintinggals/';
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
    $izintinggals = $this->Izintinggal_model->getById($id);
    if ($izintinggals->file != "default.pdf") {
	    $file_name = explode(".", $izintinggals->file)[0];
		return array_map('unlink', glob(FCPATH."upload/izintinggals/$file_name.*"));
        }
    }

    function file(){
        $name = $this->uri->segment(3);
        $data = file_get_contents("./upload/izintinggals/".$name);
        force_download($name, $data);
    }

    
}