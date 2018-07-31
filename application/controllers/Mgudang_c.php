<?php
defined('BASEPATH') or exit ('No direct script are allowed');

class Mgudang_c extends CI_Controller
{
	function __construct()
	{
		parent :: __construct();
		$this->load->model('MGudang_m','mGudang');
	}

    public function index()
	{
		$data = array();

		$data['DataGudang'] = $this->mGudang->getGudang();
		$data['Content'] = "Gudang/index";
		$this->load->view('layouts/template',$data);
	}

	public function Tambah()
	{
		$data = array(
			'id' => '',
			'nama' => '',
			'keterangan' => '',
			'status' => '',
		);
		$data['Title'] = "Tambah Gudang";
		$data['Content'] = "Gudang/GudangManage";

		$this->load->view('layouts/template',$data);
	}

	public function Submit()
	{
		$idGudang = $this->input->post('idgudang');

		if ($idGudang == null) {
			$record = array('nama' => $this->input->post('nmgudang'),
							'keterangan' => $this->input->post('ktgudang'),
							'status' => 1 
			);

			$result = $this->mGudang->_TambahGudang($record);
			if ($result) { redirect(base_url('mgudang_c/index')); } else { return false; }

		} else {
			$record = array('nama' => $this->input->post('nmgudang'),
							'keterangan' => $this->input->post('ktgudang'),
							'status' => 1
			);

			$result = $this->mGudang->_UpdateGudang($idGudang,$record);
			if ($result) { redirect(base_url('mgudang_c/index')); } else { return false; }

		}
		
	}

	public function Edit($idGudang)
	{
		$value = $this->mGudang->getGudangID($idGudang);

		if ($value) {
			$data = array(
				'id' => $value->id,
				'nama' => $value->nama,
				'keterangan' => $value->keterangan,
				'status' => $value->status,
			);
		}

		$data['Title'] = "Edit Gudang";
		$data['DataGudang'] = $this->mGudang->getGudangID($idGudang);
		$data['Content'] = "Gudang/GudangManage";

		$this->load->view('layouts/template',$data);
	}

	public function Hapus($idGudang)
	{
		$result = $this->mGudang->_HapusGudang($idGudang);
		if ($result) { redirect(base_url('mgudang_c/index')); } else { return false; }
	}
}


?>