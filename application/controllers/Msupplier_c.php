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
		$data = array('id' => '',
					  'nama' => '',
					  'alamat' => '',
					  'telepon' => '',
					  'email' => '',
		);


		$data['Title'] = "Tambah Supplier";
		$data['Content'] = "Supplier/SupplierManage";

		$this->load->view('layouts/template',$data);
	}

	public function Edit($idsupplier)
	{
		$value = $this->mSupplier->getSupplierID($idsupplier);
		$data = array('id' => $value->id,
					  'nama' => $value->nama, 
					  'alamat' => $value->alamat,
					  'telepon' => $value->telepon,
					  'email' => $value->email,
					  'status' => $value->status,
				);

		$data['Title'] = "Edit Supplier";
		$data['Content'] = "Supplier/SupplierManage";

		$this->load->view('layouts/template',$data);
	}

	public function Submit()
	{
		$idSupplier = $this->input->post('idsupplier');
		if($idSupplier == null) {
			$record = array('nama' => $this->input->post('nmsupplier'),
						'alamat' => $this->input->post('adrsupplier'),
						'telepon' => $this->input->post('telpsupplier'),
						'email' => $this->input->post('emailsupplier'),
						'status' => 1 
			);

			$result = $this->mSupplier->_TambahSupplier($record);
			if ($result) { redirect(base_url('msupplier_c/index')); } else { return false; }
		
		} else {
			$record = array('nama' => $this->input->post('nmsupplier'),
						'alamat' => $this->input->post('adrsupplier'),
						'telepon' => $this->input->post('telpsupplier'),
						'email' => $this->input->post('emailsupplier'),
						'status' => 1 
			);

			$result = $this->mSupplier->_UpdateSupplier($idSupplier,$record);
			if ($result) { redirect(base_url('msupplier_c/index')); } else { return false; }
		}
	}

	public function Hapus($idSupplier)
	{
		$result = $this->mSupplier->_HapusSupplier($idSupplier);
		if ($result) { redirect(base_url('msupplier_c/index')); } else { return false; }
	}
}


?>