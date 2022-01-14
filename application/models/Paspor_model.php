<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paspor_model extends CI_Model
{
    private $_table = "paspor";

    public $id_pemohonpaspor;
    public $np_paspor;
    public $tglpermohonan;
    public $tglcetak;
    public $noregistrasi;
    public $nama;
    public $jkelamin;
    public $jpermohonan;
    public $no_paspor;
    public $mksdkeberangkatan;
    public $lokasi;
    public $file = "default.pdf";
    
    public function rules()
    {
        return [
            ['field' => 'np_paspor',
            'label' => 'NP',
            'rules' => 'required'],

            ['field' => 'tglpermohonan',
            'label' => 'Tanggal Permohonan',
            'rules' => 'date'],

            ['field' => 'tglcetak',
            'label' => 'Tanggal Cetak',
            'rules' => 'date'],

            ['field' => 'noregistrasi',
            'label' => 'Nomor Registrasi',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'jkelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'],

            ['field' => 'jpermohonan',
            'label' => 'Jenis Permohonan',
            'rules' => 'required'],

            ['field' => 'no_paspor',
            'label' => 'Nomor Paspor',
            'rules' => 'required'],

            ['field' => 'mksdkeberangkatan',
            'label' => 'Maksud Keberangkatan',
            'rules' => 'required'],

            ['field' => 'lokasi',
            'label' => 'Lokasi Penyimpanan Arsip Fisik',
            'rules' => 'required'],
            
            
        ];
    }
    

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pemohonpaspor" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_pemohonpaspor = uniqid();
        $this->np_paspor = $post["np_paspor"];
        $this->tglpermohonan = $post["tglpermohonan"];
        $this->tglcetak = $post["tglcetak"];
        $this->noregistrasi = $post["noregistrasi"];
        $this->nama = $post["nama"];
        $this->jkelamin = $post["jkelamin"];
        $this->jpermohonan = $post["jpermohonan"];
        $this->no_paspor = $post["no_paspor"];
        $this->mksdkeberangkatan = $post["mksdkeberangkatan"];
        $this->lokasi = $post["lokasi"];
        $this->file = $this->_uploadFile();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pemohonpaspor = $post["id"];
        $this->np_paspor = $post["np_paspor"];
        $this->tglpermohonan = $post["tglpermohonan"];
        $this->tglcetak = $post["tglcetak"];
        $this->noregistrasi = $post["noregistrasi"];
        $this->nama = $post["nama"];
        $this->jkelamin = $post["jkelamin"];
        $this->jpermohonan = $post["jpermohonan"];
        $this->no_paspor = $post["no_paspor"];
        $this->mksdkeberangkatan = $post["mksdkeberangkatan"];
        $this->lokasi = $post["lokasi"];

        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_uploadFile();
        } else {
            $this->file = $post["old_file"];
        }

        return $this->db->update($this->_table, $this, array('id_pemohonpaspor' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete($this->_table, array("id_pemohonpaspor" => $id));
    }

    private function _uploadFile()
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


    private function _deleteFile($id)
    {
    $paspors = $this->getById($id);
    if ($paspors->file != "default.pdf") {
	    $file_name = explode(".", $paspors->file)[0];
		return array_map('unlink', glob(FCPATH."upload/paspors/$file_name.*"));
        }
    }

}