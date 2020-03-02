<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerProductController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('CustomerProductModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}
	public function index()
	{	$this->load->view('index');
	}
	public function viewProduct($produceCode)
	{
	$data ['view_data']= $this->CustomerProductModel->drilldown($produceCode);
	$this->load->view('CustomerProductView',$data);
	}
	public function listProducts() 
	{	$data['product_info']=$this->CustomerProductModel->get_all_Products();
		$this->load->view('CustomerProductListView',$data);
	}


}
