<?php

class User_model extends CI_Model
{
    private $_table = "user";

    public $id_user;
    public $username;
    public $full_name;
    public $password;
    public $email;
    public $role;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'full_name',
            'label' => 'Name',
            'rules' => 'required'],
			
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[3]'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        
        $this->username = $post["username"];
        $this->full_name = $post["full_name"];
        $this->email = $post["email"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->role = $post["role"] ? $post["role"] : "admin";
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id"];
        $this->username = $post["username"];
        $this->full_name = $post["full_name"];
        $this->email = $post["email"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->role = $post["role"] ? $post["role"] : "admin";
        $this->db->update($this->_table, $this, array('id_user' => $post['id']));
    }

    public function delete($id)
    {
        
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    public function doLogin(){
		$post = $this->input->post();
        
        $this->db->where('username', $post["username"]);
        $user = $this->db->get('user')->row();

        if($user){
            $isPasswordTrue = password_verify($post["password"], $user->password);
            $isAdmin = $user->role == "admin";
            
            if($isPasswordTrue && $isAdmin){ 
                $this->session->set_userdata(['user_logged' => $user]);
                $this->User_model->_updateLastLogin($user->id_user);
                return true;
               

            }
            $this->session->set_flashdata('danger', 'Username atau Password Anda salah!');
            return false;
            $this->load->view("login_page.php");
        }    
        
        
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function _updateLastLogin($id_user){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE id_user={$id_user}";
        $this->db->query($sql);
    }

}