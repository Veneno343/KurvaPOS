<?php
defined('BASEPATH') or exit ('No direct script are allowed');

class Mpengguna_c extends CI_Controller
{
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Mpengguna_m','mPengguna');
	}

    public function index()
	{
		$data = array();

		$data['DataPengguna'] = $this->mPengguna->getPengguna();
		$data['Content'] = "Pengguna/index";
		$this->load->view('layouts/template',$data);
	}

	public function Tambah()
	{
		$data['Content'] = "Pengguna/PenggunaTambah";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitBaru()
	{
		$record = array('nama' => $this->input->post('nmpengguna'),
						'username' => $this->input->post('userpengguna'),
						'password' => $this->input->post('passpengguna'),
						'status' => 1 
		);

		$result = $this->mPengguna->_Tambahpengguna($record);
		if ($result) { redirect(base_url('Mpengguna_c/index')); } else { return false; }
	}

	public function Edit($idpengguna)
	{
		$data['DataPengguna'] = $this->mPengguna->getpenggunaID($idpengguna);
		$data['Content'] = "Pengguna/PenggunaEdit";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitEdit()
	{
		$idpengguna = $this->input->post('idpengguna');
		$record = array('nama' => $this->input->post('nmpengguna'),
						'username' => $this->input->post('userpengguna'),
						'status' => 1 
		);

		$result = $this->mPengguna->_Updatepengguna($idpengguna,$record);
		if ($result) { redirect(base_url('Mpengguna_c/index')); } else { return false; }
	}

	public function Hapus($idpengguna)
	{
		$result = $this->mPengguna->_Hapuspengguna($idpengguna);
		if ($result) { redirect(base_url('Mpengguna_c/index')); } else { return false; }
	}
}


?>