<?php
defined('BASEPATH') or exit ('No direct script are allowed');

class Mpengguna_C extends CI_Controller
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
		$data = array('id' => '', 
					  'nama' => '',
					  'password' => '',
					  'status' => ''
				);
		$data['Content'] = "Pengguna/PenggunaTambah";

		$this->load->view('layouts/template',$data);
	}

	public function Submit()
	{
		$idpengguna = $this->input->post('idpengguna');

		if($idpengguna == null) {
			$record = array('nama' => $this->input->post('nmpengguna'),
						'username' => $this->input->post('userpengguna'),
						'password' => $this->input->post('passpengguna'),
						'status' => 1 
			);

			$result = $this->mPengguna->_Tambahpengguna($idpengguna);
			if ($result) { redirect(base_url('mpengguna_C/index')); } else { return false; }
		
		} else {
			$record = array('nama' => $this->input->post('nmpengguna'),
						'username' => $this->input->post('userpengguna'),
						'password' => $this->input->post('passpengguna'),
						'status' => 1 
			);

			$result = $this->mPengguna->_Updatepengguna($idpengguna,$record);
			if ($result) { redirect(base_url('mpengguna_C/index')); } else { return false; }
		}
	}

	public function Edit($idpengguna)
	{
		$value = $this->mPengguna->getpenggunaID($idpengguna);
		
		$data = array ('id' => $value->id,
					   'nama' => $value->nama,
					   'username' => $value->username,
					   'password' => '',
					   'status' => $value->status
		);

		$data['Title'] = "Edit Pengguna";
		$data['Content'] = "Pengguna/PenggunaManage";

		$this->load->view('layouts/template',$data);
	}

	public function Hapus($idpengguna)
	{
		$result = $this->mPengguna->_Hapuspengguna($idpengguna);
		if ($result) { redirect(base_url('mpengguna_C/index')); } else { return false; }
	}
}

?>