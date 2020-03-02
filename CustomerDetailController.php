<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerDetailController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('CustomerDetailModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

		public function viewCustomer($customerNumber)
    {	$data['view_data']= $this->CustomerDetailModel->drilldown($customerNumber);
		$this->load->view('CustomerView', $data);
    }
    
}