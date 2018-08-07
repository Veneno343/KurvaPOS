<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Tpembelian_m extends CI_Model 
{
    public function getPembelian() {
        $this->db->where('p.status',1);
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
        $this->db->where('idpembelian',$idPembelian);
        $this->db->select('brg.id AS idbarang,brg.nama AS namabarang,brgd.warna AS warna,brgd.ukuran AS ukuran,pd.harga AS harga,pd.kuantitas AS kuantitas,pd.total AS total');
        $this->db->from('tpembelian_detail pd');
        $this->db->join('mbarang_detail brgd','pd.idbarang_detail = brgd.id','inner');
        $this->db->join('mbarang brg','brgd.idbarang = brg.id');
        $query = $this->db->get();
        if($query->num_rows() > 0 ) { return $query->result(); } else { return false; }
    } 

    public function _TambahPembelian($record,$detail) {

        if($this->db->insert('tpembelian',$record)) {
            $idpembelian = $this->db->insert_id();

            foreach ($detail as $data) {
                $value = array();
                $value['id'] = null;
                $value['idpembelian'] = $idpembelian;
                
                $idbarang = $data[0];
                
                $warna = $data[2];
                $ukuran = $data[3];

                $takeID = $this->db->query("SELECT id FROM mbarang_detail WHERE idbarang = $idbarang AND warna = '$warna' AND ukuran = '$ukuran' ");
                $row = array();
                if ($takeID->num_rows() > 0){
                    $row = $takeID->row();   
                }
                $idbarang_detail = $row->id;

                $value['idbarang_detail'] = $idbarang_detail;
                $value['harga'] = $data[4];
                $value['kuantitas'] = $data[5];
                $value['total'] = $data[6];
                $value['status'] = 1;

                $this->db->insert('tpembelian_detail',$value);
            }

            return true;
        } else {
            return false;
        } 
    }

    public function _EditPembelian($id,$record,$detail) {
        $this->db->where('id',$id);
        if($this->db->update('tpembelian',$record)) {

            $this->db->where('idpembelian',$id);
            if($this->db->delete('tpembelian_detail')) {
                foreach ($detail as $data) {

                    $value = array();
                    $value['id'] = null;
                    $value['idpembelian'] = $id;

                    $idbarang = $data[0];

                    $warna = $data[2];
                    $ukuran = $data[3];
                    
                    $takeID = $this->db->query("SELECT id FROM mbarang_detail WHERE idbarang = $idbarang AND warna = '$warna' AND ukuran = '$ukuran' ");

                    $row = array();
                    if ($takeID->num_rows() > 0){
                        $row = $takeID->row();
                    }
                
                    $idbarang_detail = $row->id;
                    
                    $value['idbarang_detail'] = $idbarang_detail;
                    $value['harga'] = $data[4];
                    $value['kuantitas'] = $data[5];
                    $value['total'] = $data[6];
                    $value['status'] = 1;
    
                    $this->db->insert('tpembelian_detail',$value);
                }
            }

            return true;
        } else {
            return false;
        }
    }

    public function HapusPembelian($id) {
        $this->db->set('status',0);
        $this->db->where('id',$id);
        
        if($this->db->update('tpembelian')) { return true; } else { return false; }
    }
}
?>