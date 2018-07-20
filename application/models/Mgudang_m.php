<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Mgudang_m extends CI_Model
{
    public function getGudang()
    {
        $query = $this->db->query("SELECT * FROM mgudang WHERE status = '1'");    
        if($query->num_rows() >0) { return $query->result(); } else { return false; }
    }

    public function getGudangID($idGudang)
    {
        $this->db->where('id',$idGudang);
        $query = $this->db->get('mgudang');
        if($query->num_rows() > 0) { return $query->row(); } else { return false; }
    }

    public function _TambahGudang($record)
    {
        $this->db->insert('mgudang',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }   
    }

    public function _UpdateGudang($idGudang,$record)
    {
        $this->db->where('id',$idGudang);
        $this->db->update('mgudang',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }

    public function _HapusGudang($idGudang)
    {
        $this->db->query("UPDATE mgudang SET status = 0 WHERE id = $idGudang");
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }    
}

?>