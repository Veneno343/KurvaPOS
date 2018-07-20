<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Msupplier_m extends CI_Model
{
    public function getSupplier()
    {
        $query = $this->db->query("SELECT * FROM msupplier WHERE status = '1'");    
        if($query->num_rows() >0) { return $query->result(); } else { return false; }
    }

    public function getSupplierID($idSupplier)
    {
        $this->db->where('id',$idSupplier);
        $query = $this->db->get('msupplier');
        if($query->num_rows() > 0) { return $query->row(); } else { return false; }
    }

    public function _TambahSupplier($record)
    {
        $this->db->insert('msupplier',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }   
    }

    public function _UpdateSupplier($idSupplier,$record)
    {
        $this->db->where('id',$idSupplier);
        $this->db->update('msupplier',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }

    public function _HapusSupplier($idSupplier)
    {
        $this->db->query("UPDATE msupplier SET status = 0 WHERE id = $idSupplier");
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }    
}

?>