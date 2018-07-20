<?php 
defined('BASEPATH') or exit('No direct script are allowed!');

/**
 * 
 */
class Inventory_C extends CI_Controller
{		
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Inventory_M','mInven');
	}

	public function index()
	{
		$data = array();

		$data['Content'] = "index";
		$this->load->view('layouts/template',$data);

	}
       
	public function Barang()
	{
		$data = array();

		$data['DataBarang'] = $this->mInven->getBarang();
		$data['Content'] = "Inventory_V/Barang/index";

		$this->load->view('layouts/template',$data);
	}

	public function TambahBarang()
	{
		$data['DataKategori'] = $this->mInven->getKategori();
		$data['Content'] = "Inventory_V/Barang/BarangTambah";

		$this->load->view('layouts/template',$data);
	}

	public function SubmitBarangBaru()
	{
		$record = array('foto' => null,
						'nama' => $this->input->post('nmbarang'), 
						'idkategori' => $this->input->post('idkategori'),
						'status' => 1
		);

		$result = $this->mInven->_TambahBarang($record);
		if ($result) { redirect(base_url('Inventory_C/Barang')); } else { return false; }
	}
}

?>