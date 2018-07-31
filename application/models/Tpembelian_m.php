<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Tpembelian_m extends CI_Model 
{
    public function getPembelian() {
        $this->db->select('p.id as id,p.nopembelian as nop,p.tanggal as tgl,s.nama as supplier,g.nama as gudang,p.totalbarang as totalbrg,p.totalharga as totalharga');
        $this->db->from('tpembelian p');
        $this->db->join('msupplier s','s.id = p.idsupplier','inner');
        $this->db->join('mgudang g','g.id = p.idgudang','inner');
        $query = $this->db->get();
        if($query->num_rows() > 0) { return $query->result(); } else { return false; }
    }

    public function getWarnaDetail($idbarang) {
        $query = $this->db->query("SELECT warna FROM mbarang_detail WHERE idbarang  = $idbarang");
        if($query->num_rows() > 0 ) { return $query->result(); } else { return false; }
    }

    public function getUkuranDetail($idbarang,$namawarna) {
        $query = $this->db->query("SELECT ukuran FROM mbarang_detail WHERE idbarang  = $idbarang AND warna = '$namawarna'");
        if($query->num_rows() > 0 ) { return $query->result(); } else { return false; }
    }

    public function getPembelianID($idPembelian) { 
        $this->db->set('status',1);
        $this->db->where('id',$idPembelian);
        $query = $this->db->get('tpembelian');
        if($query->num_rows() > 0 ) { return $query->row(); } else { return false; }
    }
    
    public function getPembelianDetailID($idPembelian) { 
        $query = $this->db->query("SELECT * FROM tpembelian_detail WHERE status = 1 AND idpembelian = $idPembelian");
        if($query->num_rows() > 0 ) { return $query->row(); } else { return false; }
    } 


}



?>