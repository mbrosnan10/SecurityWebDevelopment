<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		
		//sessions 2018
		$this->load->library('session');
	}
	
		public function viewProduct($produceCode)
	{
	$data ['view_data']= $this->AdminModel->drilldown($produceCode);
	$this->load->view('AdminProductView',$data);
	}
	public function listProducts() 
	{	$data['product_info']=$this->AdminModel->get_all_Products();
		$this->load->view('AdminProductListVie',$data);
	}
	 function index() {
		//check if the user is already logged in
		if($this->session->userdata('logged_in'))
			redirect('AdminController/home');
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
			$this->load->view('Adminindex', $data);
		}
		else {
			//if no session, redirect to login page
			$this->load->view('login_view');
		}
	}
		
	//sessions 2018
	function adminverify_login() {

		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

		if($this->form_validation->run() == false) {
			//validation failed -> display login form
			$this->load->view('adminlogin_view');
		} else { 
			//validation passed (inc a call to check_database() via a callback) -> display secret content
			redirect('AdminController/home');
		}
	}
	
	//sessions 2018
	//my callback function to validate the users credentials
	function check_database($password) {
		//only get here if form validation succeeded. now validate the users details against the DB
		$email = $this->input->post('email');
	   //query the DB
	   $result = $this->AdminModel->login($email, $password);
	   //if a valid user write their id & name to session data
		if($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'adminNumber' => $row->adminNumber,
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
		if ($this->input->post('submitAdminInsert')){
	
$this->form_validation->set_rules('adminNumber', 'adminNumber', 'required');
$this->form_validation->set_rules('FirstName', 'FirstName', 'required');
$this->form_validation->set_rules('
	LastName', '
	LastName', 'required');
$this->form_validation->set_rules('email', 'email', 'required');
$this->form_validation->set_rules('password', 'password', 'required');


$anadminNumber['FirstName'] = $this->input->post('FirstName');
$anadminNumber['LastName'] = $this->input->post('LastName');

$anadminNumber['email'] = $this->input->post('email');
$anadminNumber['password'] = $this->input->post('password');

			
			if (!$this->form_validation->run()){
				$this->load->view('insertAdminView', $anadminNumber);
				return;
			}

			//check if insert is successful
			if ($this->AdminModel->insertAdminModel($anadminNumber)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}
			
			//load the view to display the message
			$this->load->view('displayMessageView', $data);
			
			return;
		}
		$anadminNumber['adminNumber'] = "";
		$anadminNumber['FirstName'] = "";
		$anadminNumber['LastName'] = "";
		$anadminNumber['email'] = "";
		$anadminNumber['password'] = "";

		//load the form
		$this->load->view('insertAdminView', $anadminNumber);
	}
	//sessions 2018
	function logout() {
		//unset the session data
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();

		$this->load->view('adminlogin_view');
	}
	
	function getAdminByID() {
        if ($this->input->post('submitadminNumber')) {
            $data = $this->AuthorModel->getAuthorByID();

			//sessions 2018
			$this->session->set_userdata('id', $data['adminNumber']); 
			$this->session->set_userdata('fname', $data['FirstName']); 
			$this->session->set_userdata('lname', $data['LastName']); 
			echo '</br></br>Hello:';
			//link should appear in view
			//echo is only here to keep the example concise
			echo "<br>Session has been saved! <a href='" . 
				site_url('AdminController/displaySessionData') . 
				"'>  Get the session from other page  </a>";
            return;
        }
        $this->load->view('getAdminByID');
    }
	
	//sessions 2018
	function displaySessionData() {
		//$sessionData = $this->session->all_userdata();
		$sessionData = $this->session->userdata();
	
		echo "Data currently stored in the session<br>";
		echo "Session ID: " 			. session_id() 				. "<br>";
		echo "IP Address: " 			. $_SERVER['REMOTE_ADDR'] 	. "<br>";
		echo "User Agent Info: " 		. $this->input->user_agent(). "<br>";
		echo "Admin Number: " 				. $sessionData['id'] 		. "<br>"; 
		echo "Admin First Name: " 	. $sessionData['fname']  	. "<br>"; 
		echo "Admin Last Name: " 		. $sessionData['lname']  	. "<br>"; 
	}
}
