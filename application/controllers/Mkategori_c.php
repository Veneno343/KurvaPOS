<?php
defined('BASEPATH') or exit ('No direct script are allowed');

class Mkategori_c extends CI_Controller
{
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Mkategori_m','mKategori');
	}

    public function index()
	{
		$data = array();

		$data['DataKategori'] = $this->mKategori->getKategori();
		$data['Content'] = "Kategori/index";
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

		$data['Title'] = "Tambah Kategori";
		$data['Content'] = "Kategori/KategoriManage";

		$this->load->view('layouts/template',$data);
	}

	public function Submit()
	{
		$idkategori = $this->input->post('idkategori');

		if ($idkategori == null) {
			$record = array('nama' => $this->input->post('nmkategori'),
						'keterangan' => $this->input->post('ktkategori'),
						'status' => 1 
			);

			$result = $this->mKategori->_TambahKategori($record);
			if ($result) { redirect(base_url('mkategori_c/index')); } else { return false; }
		} else { 
			$record = array('nama' => $this->input->post('nmkategori'),
						'keterangan' => $this->input->post('ktkategori'),
						'status' => 1
			);

			$result = $this->mKategori->_UpdateKategori($idkategori,$record);
			if ($result) { redirect(base_url('mkategori_c/index')); } else { return false; }
		}		
	}

	public function Edit($idkategori)
	{
		$value = $this->mKategori->getKategoriID($idkategori);

		$data = array(
			'id' => $value->id,
			'nama' => $value->nama,
			'keterangan' => $value->keterangan,
			'status' => $value->status,
		);
		
		$data['Title'] = "Edit Kategori";
		$data['Content'] = "Kategori/KategoriManage";

		$this->load->view('layouts/template',$data);
	}

	public function Hapus($idkategori)
	{
		$result = $this->mKategori->_HapusKategori($idkategori);
		if ($result) { redirect(base_url('mkategori_c/index')); } else { return false; }
	}
}


?>