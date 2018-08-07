<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Tpembelian_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->model('Tpembelian_m','tPembelian');
		$this->load->model('Mbarang_m','mBarang');
		$this->load->model('Mkategori_m','mKategori');
		$this->load->model('Mgudang_m','mGudang');
		$this->load->model('Msupplier_m','mSupplier');
	}

    public function index()
	{
		$data = array();
		
        $data['DataPembelian'] = $this->tPembelian->getPembelian();
		$data['Content'] = "Pembelian/index";
		$this->load->view('layouts/template',$data);
	}
	
	public function getWarnaBarang($idbarang)
	{
		$detailWarna = $this->tPembelian->getWarnaDetail($idbarang);

		$listWarna = "<option value='' selected disabled>- Pilih Warna - </option>";
		foreach($detailWarna as $warna) { 
			$listWarna .= "<option class='form-control' value='".$warna->warna."'>".$warna->warna."</option>";
		}

		$resultWarna = array('list_warna'=>$listWarna);
		echo json_encode($resultWarna);
	}

	public function getUkuranBarang()
	{
		$idbrg = $this->input->post('idbarang');
		$nmwarna = $this->input->post('nmwarna');

		$detailUkuran = $this->tPembelian->getUkuranDetail($idbrg,$nmwarna);
		
		$listUkuran = "<option value='' selected disabled>- Pilih Ukuran - </option>";
		foreach($detailUkuran as $ukuran) { 
			$listUkuran .= "<option class='form-control' value='".$ukuran->ukuran."'>".$ukuran->ukuran."</option>";
		}

		$resultUkuran = array('list_ukuran'=>$listUkuran);
		echo json_encode($resultUkuran);
	}

	public function Tambah()
	{
		$data = array('id' => '',
					  'nopembelian' => '',
					  'tanggal' => '',
					  'idsupplier' => '',
					  'idgudang' => '',
					  'totalbarang' => '',
					  'totalharga' => ''
		);
		
		$data['Title'] = "Tambah Pembelian";
		$data['DataSupplier'] = $this->mSupplier->getSupplier();
		$data['DataGudang'] = $this->mGudang->getGudang();
		$data['DataBarang'] = $this->mBarang->getBarang();
		$data['Content'] = "Pembelian/PembelianManage";

		$this->load->view('layouts/template',$data);
	}

	public function Edit($idpembelian)
	{
		$value = $this->tPembelian->getPembelianID($idpembelian);

		$data = array('id' => $value->id,
					  'nopembelian' => $value->nopembelian,
					  'tanggal' => $value->tanggal,
					  'idsupplier' => $value->idsupplier,
					  'idgudang' => $value->idgudang,
					  'totalbarang' => $value->totalbarang,
					  'totalharga' => $value->totalharga
		);
		
		$data['Title'] = "Edit Pembelian";
		$data['DataSupplier'] = $this->mSupplier->getSupplier();
		$data['DataGudang'] = $this->mGudang->getGudang();
		$data['DataBarang'] = $this->mBarang->getBarang();
		$data['DetailPembelian'] = $this->tPembelian->getPembelianDetailID($idpembelian);
		$data['Content'] = "Pembelian/PembelianManage";

		$this->load->view('layouts/template',$data);
	}

	public function Submit()
	{
		$idpembelian = $this->input->post('idpembelian');

		if($idpembelian == null) {
			$recordPembelian = array('nopembelian' => null,
								  	 'tanggal' => $this->input->post('tanggal'), 
							      	 'idsupplier' => $this->input->post('idsupplier'),
									 'idgudang' => $this->input->post('idgudang'),
									 'totalharga' => $this->input->post('totalsemua'),
									 'totalbarang' => $this->input->post('totalbarang'),  
									 'status' => 1
			);

			$recordDetail = json_decode($this->input->post('detail_value'));

			$result = $this->tPembelian->_TambahPembelian($recordPembelian,$recordDetail);
			if ($result) { redirect(base_url('tPembelian_c/index')); } else { return false; }
		} else {
			$recordPembelian = array('nopembelian' => null,
								  	 'tanggal' => $this->input->post('tanggal'), 
							      	 'idsupplier' => $this->input->post('idsupplier'),
									 'idgudang' => $this->input->post('idgudang'),
									 'totalharga' => $this->input->post('totalsemua'),
									 'totalbarang' => $this->input->post('totalbarang'),  
									 'status' => 1
			);

			$recordDetail = json_decode($this->input->post('detail_value'));

			$result = $this->tPembelian->_EditPembelian($idpembelian,$recordPembelian,$recordDetail);

			if ($result) { redirect(base_url('tPembelian_c/index')); } else { return false; }

		}		
	}
	
	/* public function hapusDetail($id)
	{
		$result = $this->tPembelian->deleteDetail($id);
		if($result) { redirect($this->agent->referrer()); } else { return false; }
	} */
	
	public function Hapus($id)
	{
		$result = $this->tPembelian->HapusPembelian($id);
		if($result) { redirect(base_url('tPembelian_c/index')); } else { return false; }
	}
	
}

?>