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
		$data['Content'] = "Kategori/KategoriTambah";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitBaru()
	{
		$record = array('nama' => $this->input->post('nmkategori'),
						'keterangan' => $this->input->post('ktkategori'),
						'status' => 1 
		);

		$result = $this->mKategori->_TambahKategori($record);
		if ($result) { redirect(base_url('Mkategori_c/index')); } else { return false; }
	}

	public function Edit($idkategori)
	{
		$data['DataKategori'] = $this->mKategori->getKategoriID($idkategori);
		$data['Content'] = "Kategori/KategoriEdit";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitEdit()
	{
		$idkategori = $this->input->post('idkategori');
		$record = array('nama' => $this->input->post('nmkategori'),
						'keterangan' => $this->input->post('ktkategori'),
						'status' => 1
		);

		$result = $this->mKategori->_UpdateKategori($idkategori,$record);
		if ($result) { redirect(base_url('Mkategori_c/index')); } else { return false; }
	}

	public function Hapus($idkategori)
	{
		$result = $this->mKategori->_HapusKategori($idkategori);
		if ($result) { redirect(base_url('Mkategori_c/index')); } else { return false; }
	}
}


?>