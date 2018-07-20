<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Mkategori_m extends CI_Model
{
    public function getKategori()
    {
        $query = $this->db->query("SELECT * FROM mkategori WHERE status = '1'");    
        if($query->num_rows() >0) { return $query->result(); } else { return false; }
    }

    public function getKategoriID($idkategori)
    {
        $this->db->where('id',$idkategori);
        $query = $this->db->get('mkategori');
        if($query->num_rows() > 0) { return $query->row(); } else { return false; }
    }

    public function _TambahKategori($record)
    {
        $this->db->insert('mkategori',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }   
    }

    public function _UpdateKategori($idkategori,$record)
    {
        $this->db->where('id',$idkategori);
        $this->db->update('mkategori',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }

    public function _HapusKategori($idkategori)
    {
        $this->db->query("UPDATE mkategori SET status = 0 WHERE id = $idkategori");
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }    
}

?>