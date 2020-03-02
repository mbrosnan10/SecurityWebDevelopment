<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProduceController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ProduceModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		
		//sessions 2018
		$this->load->library('session');
	}
	
	function index(){
        $this->load->view('getProduceByID');		
	}

	function getProduceByID() {
        if ($this->input->post('submitproduceCode')) {
            $data = $this->ProduceModel->getProduceByID();

			//sessions 2018
			$this->session->set_userdata('produceCode', $data['produceCode']); 
			$this->session->set_userdata('description', $data['description']); 
			$this->session->set_userdata('productLine', $data['productLine']); 
			$this->session->set_userdata('supplier', $data['supplier']); 
			$this->session->set_userdata('quantityInStock', $data['quantityInStock']); 
			$this->session->set_userdata('bulkBuyPrice', $data['bulkBuyPrice']); 
			$this->session->set_userdata('bulkSalePrice', $data['bulkSalePrice']); 
			//link should appear in view
			//echo is only here to keep the example concise
			echo "<br>Session has been saved! <a href='" . 
				site_url('ProductController/listProducts') . 
				"'>  Get the session from other page  </a>";
            return;
        }
        $this->load->view('getProduceByID');
    }
	
	//sessions 2018
	function displaySessionData() {
		//$sessionData = $this->session->all_userdata();
		$sessionData = $this->session->userdata();
		//output should appear in view
		//its only here to keep the example concise
		echo "Data currently stored in the session<br>";
		echo "Session ID: " 			. session_id() 				. "<br>";
		echo "IP Address: " 			. $_SERVER['REMOTE_ADDR'] 	. "<br>";
		echo "User Agent Info: " 		. $this->input->user_agent(). "<br>";
		echo "Produce Code: " 				. $sessionData['produceCode'] 		. "<br>"; 
		echo "Produce Description: " 	. $sessionData['description']  	. "<br>"; 
		echo "Produce ProductLine: " 		. $sessionData['productLine']  	. "<br>"; 
		echo "Produce Supplier: " 				. $sessionData['supplier'] 		. "<br>"; 
		echo "Produce Quantity In Stock: " 	. $sessionData['quantityInStock']  	. "<br>"; 
		echo "Produce Bulk Buy Price: " 		. $sessionData['bulkBuyPrice']  	. "<br>";
	    echo "Produce Bulk Sale Price: " 		. $sessionData['bulkSalePrice']  	. "<br>"; 
	}
}
