<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PaymentController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PaymentModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{	$this->load->view('index');
	}
	public function viewPayment($customerNumber)
    {	$data['view_data']= $this->PaymentModel->drilldown($customerNumber);
		$this->load->view('PaymentView', $data);
    }
public function handleInsert(){
		if ($this->input->post('submitInsert')){

			
			$this->form_validation->set_rules('cardType', 'Card Type', 'required');
			$this->form_validation->set_rules('cardNumber', 'Card Number', 'required');
			$this->form_validation->set_rules('cardName', 'Card Name', 'required');	
			$this->form_validation->set_rules('expiryDate', 'Expiry Date', 'required');
			$this->form_validation->set_rules('CVV', 'CVV', 'required');
			

			//get values from post
			$aPayment['cardType'] = $this->input->post('cardType');
			$aPayment['cardNumber'] = $this->input->post('cardNumber');
			$aPayment['cardName'] = $this->input->post('cardName');
			$aPayment['expiryDate'] = $this->input->post('expiryDate');
			$aPayment['CVV'] = $this->input->post('CVV');
			
			
			//check if the form has passed validation
			if (!$this->form_validation->run()){
				//validation has failed, load the form again
				$this->load->view('insertPaymentView', $aPayment);
				return;
			}

			//check if insert is successful
			if ($this->PaymentModel->insertPaymentModel($aPayment)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}
			
			//load the view to display the message
			$this->load->view('displayMessageView', $data);
			
			return;
		}
		$aPayment['cardType'] = "";
		$aPayment['cardNumber'] = "";
		$aPayment['cardName'] = "";
		$aPayment['expiryDate'] = "";
		$aPayment['CVV'] = "";

		//load the form
		$this->load->view('insertPaymentView', $aPayment);
	}

	public function listPayments() 
	{	$data['payment_info']=$this->PaymentModel->get_all_payments();
		$this->load->view('PaymentListView',$data);
	}

	public function editPayment($customerNumber)
    {	$data['edit_data']= $this->PaymentModel->drilldown($customerNumber);
		$this->load->view('updatePaymentView', $data);
    }
}