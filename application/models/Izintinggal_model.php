<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Izintinggal_model extends CI_Model
{
    private $_table = "izintinggal";

    public $id_izintinggal;
    public $jlayanan;
    public $noregister;
    public $niora;
    public $nopermohonan;
    public $nama;
    public $kebangsaan;
    public $jkelamin;
    public $tgl_penyelesaian;
    public $no_paspor;
    public $tgl_habisberlakupaspor;
    public $layanan;
    public $perpanjangan;
    public $lokasi;
    public $file = "default.pdf";
    
    public function rules()
    {
        return [
            ['field' => 'nama_jlayanan',
            'label' => 'Jenis Layanan',
            'rules' => 'required'],

            ['field' => 'noregister',
            'label' => 'No. Register',
            'rules' => 'required'],

            ['field' => 'niora',
            'label' => 'Niora',
            'rules' => 'required'],

            ['field' => 'nopermohonan',
            'label' => 'Nomor Permohonan',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'kebangsaan',
            'label' => 'Kebangsaan',
            'rules' => 'required'],
            
            ['field' => 'jkelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'],

            ['field' => 'tgl_penyelesaian',
            'label' => 'Tanggal Penyelesaian',
            'rules' => 'date'],

            ['field' => 'no_paspor',
            'label' => 'Nomor Paspor',
            'rules' => 'required'],

            ['field' => 'tgl_habisberlakupaspor',
            'label' => 'Tanggal Habis Berlaku Paspor',
            'rules' => 'date'],

            ['field' => 'layanan',
            'label' => 'Layanan',
            'rules' => 'required'],

            ['field' => 'perpanjangan',
            'label' => 'Perpanjangan',
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
        return $this->db->get_where($this->_table, ["id_izintinggal" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_izintinggal = uniqid();
        $this->nama_jlayanan = $post["nama_jlayanan"];
        $this->noregister = $post["noregister"];
        $this->niora = $post["niora"];
        $this->nopermohonan = $post["nopermohonan"];
        $this->nama = $post["nama"];
        $this->kebangsaan = $post["kebangsaan"];
        $this->jkelamin = $post["jkelamin"];
        $this->tgl_penyelesaian = $post["tgl_penyelesaian"];
        $this->no_paspor = $post["no_paspor"];
        $this->tgl_habisberlakupaspor = $post["tgl_habisberlakupaspor"];
        $this->layanan = $post["layanan"];
        $this->perpanjangan = $post["perpanjangan"];
        $this->lokasi = $post["lokasi"];
        $this->file = $this->_uploadFile();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_izintinggal = $post["id"];
        $this->nama_jlayanan = $post["nama_jlayanan"];
        $this->noregister = $post["noregister"];
        $this->niora = $post["niora"];
        $this->nopermohonan = $post["nopermohonan"];
        $this->nama = $post["nama"];
        $this->kebangsaan = $post["kebangsaan"];
        $this->jkelamin = $post["jkelamin"];
        $this->tgl_penyelesaian = $post["tgl_penyelesaian"];
        $this->no_paspor = $post["no_paspor"];
        $this->tgl_habisberlakupaspor = $post["tgl_habisberlakupaspor"];
        $this->layanan = $post["layanan"];
        $this->perpanjangan = $post["perpanjangan"];
        $this->lokasi = $post["lokasi"];

        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_uploadFile();
        } else {
            $this->file = $post["old_file"];
        }

        return $this->db->update($this->_table, $this, array('id_izintinggal' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete($this->_table, array("id_izintinggal" => $id));
    }

    private function _uploadFile()
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


    private function _deleteFile($id)
    {
    $izintinggals = $this->getById($id);
    if ($izintinggals->file != "default.pdf") {
	    $file_name = explode(".", $izintinggals->file)[0];
		return array_map('unlink', glob(FCPATH."upload/izintinggals/$file_name.*"));
        }
    }

    public function get_layanan(){
        $query = $this->db->get('jenislayanan')->result();
        return $query;  
    }
}