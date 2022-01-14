<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    private $_table = "user";

    public $id_user;
    public $username;
    public $full_name;
    public $password;
    public $email;
    public $role;
    public $photo = "user_no_image.jpg";

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'full_name',
            'label' => 'Full Namew',
            'rules' => 'required'],

            
            
            
        ];
    }
    
 
    

    public function getAll()
    {
        return $this->db->get($this->_table)->row_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id"];
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email = $post["email"];
        $this->full_name = $post["full_name"];
        $this->role = $post["role"] ?? "admin";
        

       /// if (!empty($_FILES["photo"]["name"])) {
           /// $this->photo = $this->_uploadFile();
        //} else {
           // $this->photo = $post["old_photo"];
       // }

        return $this->db->update($this->_table, $this, array('id_user' => $post['id']));
    }

    private function _uploadFile()
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