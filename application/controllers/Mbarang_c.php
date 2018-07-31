<?php
defined('BASEPATH') or exit('No direct script are allowed');

class Mbarang_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mbarang_m','mBarang');
		$this->load->model('Mkategori_m','mKategori');
	}

    public function index()
	{
		$data = array();
		
        $data['DataBarang'] = $this->mBarang->getBarang();
		$data['Content'] = "Barang/index";
		$this->load->view('layouts/template',$data);
    }

	public function Tambah()
	{
		$this->load->model('Mkategori_m','mKategori');
		
		$data = array('id' => '',
					  'foto' => '',
					  'nama' => '',
					  'idkategori' => '',
					  'barcode' => ''
		);
		
		$data['Title'] = "Tambah Barang";
		$data['DataKategori'] = $this->mKategori->getKategori();
		$data['Content'] = "Barang/BarangManage";

		$this->load->view('layouts/template',$data);
	}

	public function Edit($idbarang)
	{
		$this->load->model('Mkategori_m','mKategori');
		$value = $this->mBarang->getBarangID($idbarang);

		$data = array('id' => $value->id,
					  'foto' => $value->foto,
					  'nama' => $value->nama,
					  'idkategori' => $value->idkategori,
					  'barcode'	=> $value->barcode,
					  'status' => $value->status

		);
		
		$data['Title'] = "Edit Barang";
		$data['DetailBarang'] = $this->mBarang->getBarangDetail($idbarang);
		$data['DataKategori'] = $this->mKategori->getKategori();
		$data['Content'] = "Barang/BarangManage";

		$this->load->view('layouts/template',$data);
	}

	public function Submit()
	{
		$idbarang = $this->input->post('idbarang');

		if($idbarang == null) {
			$recordBarang = array('foto' => null,
								  'nama' => $this->input->post('nmbarang'), 
							      'idkategori' => $this->input->post('idkategori'),
							      'status' => 1
			);

			$recordDetail = json_decode($this->input->post('detail_value'));

			$result = $this->mBarang->_TambahBarang($recordBarang,$recordDetail);
			if ($result) { redirect(base_url('mbarang_c/index')); } else { return false; }
		} else {
			$recordBarang = array('foto' => null,
								  'nama' => $this->input->post('nmbarang'), 
								  'idkategori' => $this->input->post('idkategori'),
								  'status' => 1
			);

			$recordDetail = json_decode($this->input->post('detail_value'));

			$result = $this->mBarang->_EditBarang($idbarang,$recordBarang,$recordDetail);

			if ($result) { redirect(base_url('mbarang_c/index')); } else { return false; }

		}		
	}

	public function hapusDetail($id)
	{
		$result = $this->mBarang->deleteDetail($id);
		if($result) { redirect($this->agent->referrer()); } else { return false; }
	}

	public function Hapus($id)
	{
		$result = $this->mBarang->HapusBarang($id);
		if($result) { redirect(base_url('mbarang_c/index')); } else { return false; }
	}

}

?>