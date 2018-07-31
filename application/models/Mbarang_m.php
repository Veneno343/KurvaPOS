<?php
defined('BASEPATH')or exit('No direct script allowed');

class Mbarang_m extends CI_Model
{
    /**
     * Model Barang
     * Khusus manipulasi data Barang
     */

     /**
      * Format QRCODE : ID KATEGORI + TAHUN + BULAN + TGL + NO URUT (4DIGIT) 
      */
    public function getBarang()
    {
        $query = $this->db->query("SELECT brg.id as idbrg,brg.nama as namabrg,kt.nama as katbrg FROM mbarang as brg INNER JOIN mkategori as kt ON brg.idkategori = kt.id WHERE brg.status = '1' ");
        if($query->num_rows() > 0) { return $query->result(); } else { return false; }
    }

    public function getBarangID($idbarang)
    {
        $this->db->set('status',1);
        $this->db->where('id',$idbarang);
        $query = $this->db->get('mbarang');
        if($query->num_rows() > 0) { return $query->row(); } else  { return false; }
    }

    public function getBarangDetail($idbarang)
    {
        $query = $this->db->query("SELECT * FROM mbarang_detail WHERE status = 1 AND idbarang = $idbarang");
        if($query->num_rows() > 0) { return $query->result(); } else { return false; }
    }

    public function _TambahBarang($record,$detail)
    {
        if ($this->db->insert('mbarang',$record)) {
            $idbarang = $this->db->insert_id();

            foreach($detail as $row) {
                $data = array();

                $data['idbarang'] = $idbarang;
                $data['ukuran']   = $row[0];
                $data['warna']    = $row[1];
                $data['status']   = '1';

              $this->db->insert('mbarang_detail', $data);
            }

            return true;
        }

        return false;
    }

    public function _EditBarang($id,$record,$detail)
    {
        $this->db->where('id',$id);
        if ($this->db->update('mbarang',$record)) {
            
            $this->db->where('idbarang',$id);
            if($this->db->delete('mbarang_detail')) {
                foreach($detail as $row) {
                    $data = array();
    
                    $data['idbarang'] = $id;
                    $data['ukuran']   = $row[0];
                    $data['warna']    = $row[1];
                    $data['status']   = '1';
                
                    $this->db->insert('mbarang_detail', $data);
                }
            }

            return true;
        } else {
            return false;
        }

        
    }
    /*  */
    public function HapusBarang($id)
    {
        $this->db->set('status',0);
        $this->db->where('id',$id);
        if($this->db->update('mbarang')) { return true; } else { return false; }
    }
    public function deleteDetail($id)
    {
        $this->db->query("UPDATE mbarang_detail SET status = 0 WHERE id = $id");

        if($this->db->affected_rows() > 0) { return true; } else { return false; }
    }
}

?>