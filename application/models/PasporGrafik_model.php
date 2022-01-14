<?php
Class PasporGrafik_model extends CI_Model
{
  function jumlahpaspor()
    {
        $this->db->group_by('jpermohonan');
        $this->db->select('jpermohonan');
        $this->db->select("count(*) as total");
        return $this->db->from('paspor')
          ->get()
          ->result();
    }
}
?>