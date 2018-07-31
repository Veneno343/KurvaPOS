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
	}

	function index()
	{
		$data['Content'] = "index";
		$this->load->view('layouts/template',$data);
	}
	
}

?>