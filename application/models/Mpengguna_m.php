<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Mpengguna_m extends CI_Model
{
    public function getPengguna()
    {
        $query = $this->db->query("SELECT * FROM mpengguna WHERE status = '1'");    
        if($query->num_rows() >0) { return $query->result(); } else { return false; }
    }

    public function getPenggunaID($idPengguna)
    {
        $this->db->where('id',$idPengguna);
        $query = $this->db->get('mPengguna');
        if($query->num_rows() > 0) { return $query->row(); } else { return false; }
    }

    public function _TambahPengguna($record)
    {
        $name = $record['nama'];
        $username = $record['username'];
        $password = $record['password'];
        $status = $record['status'];

        $this->db->query("INSERT INTO mpengguna VALUES(null,'$name','$username',MD5('$password'),'$status') ");
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }   
    }

    public function _UpdatePengguna($idPengguna,$record)
    {
        $this->db->where('id',$idPengguna);
        $this->db->update('mPengguna',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }

    public function _HapusPengguna($idPengguna)
    {
        $this->db->query("UPDATE mPengguna SET status = 0 WHERE id = $idPengguna");
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }    
}

?>