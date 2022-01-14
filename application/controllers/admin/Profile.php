<?php

class Profile extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
		$this->load->model("Profile_model");
        $this->load->model("User_model");
        $this->load->library('form_validation');
		if($this->User_model->isNotLogin()) redirect(site_url('Login'));
	}

    public function index(){
        
      $data['user'] = $this->Profile_model->getAll();
        $this->load->view("admin/profiles/profile", $data);
       
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/Profile');
       
        $profiles = $this->Profile_model;
        $validation = $this->form_validation;
        $validation->set_rules($profiles->rules());

        if ($validation->run()) {
            $profiles->update();
            $this->session->set_flashdata('success', 'Profil Berhasil diedit');
        }

        $data["user"] = $profiles->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("admin/profiles/edit_form", $data);
    }

    public function _uploadFile()
    {
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            = $this->full_name;
        $config['overwrite']			= true;
        $config['max_size']             = 10240; // 10MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }
    
        return "user_no_image.jpg";
    }

}