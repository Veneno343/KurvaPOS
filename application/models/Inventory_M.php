<?php
defined('BASEPATH')or exit('No direct script allowed');

class Inventory_M extends CI_Model
{
    /**
     * Model Barang
     * Khusus manipulasi data Barang
     */
    public function getBarang()
    {
        $query = $this->db->query("SELECT brg.id as idbrg,brg.nama as namabrg,kt.nama as katbrg FROM mbarang as brg INNER JOIN mkategori as kt ON brg.idkategori = kt.id WHERE brg.status = '1' ");
        if($query->num_rows() > 0) { return $query->result(); } else { return false; }
    }

    public function _TambahBarang($record)
    {
        $this->db->insert('mbarang',$record);
        if ($this->db->affected_rows() > 0 ) { return true; } else { return false; }
    }
    /*  */
}

?>