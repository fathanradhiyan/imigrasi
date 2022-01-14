<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('form_validation');
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
    }

    public function index()
    {
        $data["user"] = $this->User_model->getAll();
        $this->load->view("admin/users/list", $data);
    }

    public function register()
    {
        $users = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->simpan();
            $this->session->set_flashdata('success', 'User Berhasil disimpan');
        }

        $this->load->view("admin/users/register");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/user');
       
        $users = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->update();
            $this->session->set_flashdata('success', 'User Berhasil diedit');
        }

        $data["users"] = $users->getById($id);
        if (!$data["users"]) show_404();
        
        $this->load->view("admin/users/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->User_model->delete($id)) {
            redirect(site_url('admin/user'));
        }
    }

    
}