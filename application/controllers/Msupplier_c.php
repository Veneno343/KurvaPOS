<?php
defined('BASEPATH') or exit ('No direct script are allowed');

class Msupplier_c extends CI_Controller
{
	function __construct()
	{
		parent :: __construct();
		$this->load->model('Msupplier_m','mSupplier');
	}

    public function index()
	{
		$data = array();

		$data['DataSupplier'] = $this->mSupplier->getSupplier();
		$data['Content'] = "Supplier/index";
		$this->load->view('layouts/template',$data);
	}

	public function Tambah()
	{
		$data['Content'] = "Supplier/SupplierTambah";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitBaru()
	{
		$record = array('nama' => $this->input->post('nmsupplier'),
						'alamat' => $this->input->post('adrsupplier'),
						'telepon' => $this->input->post('telpsupplier'),
						'email' => $this->input->post('emailsupplier'),
						'status' => 1 
		);

		$result = $this->mSupplier->_TambahSupplier($record);
		if ($result) { redirect(base_url('Msupplier_c/index')); } else { return false; }
	}

	public function Edit($idsupplier)
	{
		$data['DataSupplier'] = $this->mSupplier->getSupplierID($idsupplier);
		$data['Content'] = "Supplier/SupplierEdit";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitEdit()
	{
		$idSupplier = $this->input->post('idsupplier');
		$record = array('nama' => $this->input->post('nmsupplier'),
						'alamat' => $this->input->post('adrsupplier'),
						'telepon' => $this->input->post('telpsupplier'),
						'email' => $this->input->post('emailsupplier'),
						'status' => 1 
		);

		$result = $this->mSupplier->_UpdateSupplier($idSupplier,$record);
		if ($result) { redirect(base_url('Msupplier_c/index')); } else { return false; }
	}

	public function Hapus($idSupplier)
	{
		$result = $this->mSupplier->_HapusSupplier($idSupplier);
		if ($result) { redirect(base_url('Msupplier_c/index')); } else { return false; }
	}
}


?>