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
		$data['Content'] = "Gudang/GudangTambah";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitBaru()
	{
		$record = array('nama' => $this->input->post('nmgudang'),
						'keterangan' => $this->input->post('ktgudang'),
						'status' => 1 
		);

		$result = $this->mGudang->_TambahGudang($record);
		if ($result) { redirect(base_url('Mgudang_c/index')); } else { return false; }
	}

	public function Edit($idGudang)
	{
		$data['DataGudang'] = $this->mGudang->getGudangID($idGudang);
		$data['Content'] = "Gudang/GudangEdit";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitEdit()
	{
		$idGudang = $this->input->post('idgudang');
		$record = array('nama' => $this->input->post('nmgudang'),
						'keterangan' => $this->input->post('ktgudang'),
						'status' => 1
		);

		$result = $this->mGudang->_UpdateGudang($idGudang,$record);
		if ($result) { redirect(base_url('Mgudang_c/index')); } else { return false; }
	}

	public function Hapus($idGudang)
	{
		$result = $this->mGudang->_HapusGudang($idGudang);
		if ($result) { redirect(base_url('Mgudang_c/index')); } else { return false; }
	}
}


?>