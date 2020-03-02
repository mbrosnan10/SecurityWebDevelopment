<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('CustomerModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		
		//sessions 2018
		$this->load->library('session');
	}



		public function viewProduct($produceCode)
	{
	$data ['view_data']= $this->ProductModel->drilldown($produceCode);
	$this->load->view('ProductView',$data);
	}
	public function listProducts() 
	{	$data['product_info']=$this->CustomerModel->get_all_Products();
		$this->load->view('CustomerProductListView',$data);
	}
	 function index() {
		if($this->session->userdata('logged_in'))
			redirect('CustomerController/home');
		else
			//user isn't logged in -> display login form
			$this->load->view('login_view');
		echo '</br></br>Hello:';
	}

	//sessions 2018
	//successfully logged in so display home page
	function home() {
		//if the user is logged in
		if($this->session->userdata('logged_in')) {
			//get the session data
			$session_data = $this->session->userdata('logged_in');
			//get the username from the session and put it in $data
			$data['email'] = $session_data['email'];
			//load index/home view with the username included in $data
			$this->load->view('Customerindex', $data);
		}
		else {
			//if no session, redirect to login page
			$this->load->view('login_view');
		}
	}
		
	//sessions 2018
	function verify_login() {
		//set the validation rules for the login form
		//This code ensures that both the username and password
		//	are trimed of extra spaces at the beginning and end and	are required fields
		//The check_database function is also called
		//callback_ allows you to write your own form validation code
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

		if($this->form_validation->run() == false) {
			//validation failed -> display login form
			$this->load->view('login_view');
		} else { 
			//validation passed (inc a call to check_database() via a callback) -> display secret content
			redirect('CustomerController/home');
		}
	}
	
	//sessions 2018
	//my callback function to validate the users credentials
	function check_database($password) {
		//only get here if form validation succeeded. now validate the users details against the DB
		$email = $this->input->post('email');
	   //query the DB
	   $result = $this->CustomerModel->login($email, $password);
	   //if a valid user write their id & name to session data
		if($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'customerNumer' => $row->customerNumber,
					'email' => $row->email
				);
				$this->session->set_userdata('logged_in', $sess_array);				
			}
			//return true -> we have a valid user
			return true;
		}
		else {
			//return false ->we have an invalid user
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
		public function handleInsert(){
		if ($this->input->post('submitInsert')){
	
$this->form_validation->set_rules('customerNumber', 'customerNumber', 'required');
$this->form_validation->set_rules('customerName', 'customerName', 'required');
$this->form_validation->set_rules('contactLastName', 'contactLastName', 'required');
$this->form_validation->set_rules('contactFirstName', 'contactFirstName', 'required');
$this->form_validation->set_rules('phone', 'phone', 'required');
$this->form_validation->set_rules('addressLine1', 'addressLine1', 'required');
$this->form_validation->set_rules('addressLine2', 'addressLine2', 'required');
$this->form_validation->set_rules('city', 'city', 'required');
$this->form_validation->set_rules('postalCode', 'postalCode', 'required');
$this->form_validation->set_rules('country', 'country', 'required');
$this->form_validation->set_rules('creditLimit', 'creditLimit', 'required');
$this->form_validation->set_rules('email', 'email', 'required');
$this->form_validation->set_rules('password', 'password', 'required');


$acustomerNumber['customerName'] = $this->input->post('customerName');
$acustomerNumber['contactLastName'] = $this->input->post('contactLastName');
$acustomerNumber['contactFirstName'] = $this->input->post('contactFirstName');
$acustomerNumber['phone'] = $this->input->post('phone');
$acustomerNumber['addressLine1'] = $this->input->post('addressLine1');
$acustomerNumber['addressLine2'] = $this->input->post('addressLine2');
$acustomerNumber['city'] = $this->input->post('city');
$acustomerNumber['postalCode'] = $this->input->post('postalCode');
$acustomerNumber['country'] = $this->input->post('country');
$acustomerNumber['creditLimit'] = $this->input->post('creditLimit');
$acustomerNumber['email'] = $this->input->post('email');
$acustomerNumber['password'] = $this->input->post('password');

			
			if (!$this->form_validation->run()){
				$this->load->view('insertCustomerView', $acustomerNumber);
				return;
			}

			//check if insert is successful
			if ($this->CustomerModel->insertCustomerModel($acustomerNumber)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}
			
			//load the view to display the message
			$this->load->view('displayMessageView', $data);
			
			return;
		}
		$acustomerNumber['customerNumber'] = "";
		$acustomerNumber['customerName'] = "";
		$acustomerNumber['contactLastName'] = "";
		$acustomerNumber['contactFirstName'] = "";
		$acustomerNumber['phone']= "";
		$acustomerNumber['addressLine1'] = "";
		$acustomerNumber['addressLine2'] = "";
		$acustomerNumber['city'] = "";
	    $acustomerNumber['postalCode']= "";
		$acustomerNumber['country'] = "";
		$acustomerNumber['creditLimit'] = "";
		$acustomerNumber['email'] = "";
		$acustomerNumber['password'] = "";

		//load the form
		$this->load->view('insertCustomerView', $acustomerNumber);
	}
	//sessions 2018
	function logout() {
		//unset the session data
		$this->session->unset_userdata('logged_in');
		//destroy the session
		$this->session->sess_destroy();
		//load the login page
		$this->load->view('login_view');
	}
	
	function getCustomerByID() {
        if ($this->input->post('submitcustomerNumber')) {
            $data = $this->AuthorModel->getAuthorByID();

			//sessions 2018
			$this->session->set_userdata('id', $data['customerNumber']); 
			$this->session->set_userdata('fname', $data['contactLastName']); 
			$this->session->set_userdata('lname', $data['contactFirstName']); 
			echo '</br></br>Hello:';
			//link should appear in view
			//echo is only here to keep the example concise
			echo "<br>Session has been saved! <a href='" . 
				site_url('CustomerController/displaySessionData') . 
				"'>  Get the session from other page  </a>";
            return;
        }
        $this->load->view('getCustomerByID');
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
		echo "Customer Number: " 				. $sessionData['id'] 		. "<br>"; 
		echo "Customer First Name: " 	. $sessionData['fname']  	. "<br>"; 
		echo "Customer Last Name: " 		. $sessionData['lname']  	. "<br>"; 
	}
}
