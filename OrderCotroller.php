<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('OrderModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}
	public function index()
	{	$this->load->view('index');
	}

	public function viewOrder($orderNumber)
    {	$data['view_data']= $this->OrderModel->drilldown($orderNumber);
		$this->load->view('OrderView', $data);
    }

	public function listOrders() 
	{	$data['order_info']=$this->OrderModel->get_all_orders();
		$this->load->view('OrderListView',$data);
	}


	public function editOrder($orderNumber)
    {	$data['edit_data']= $this->OrderModel->drilldown($orderNumber);
		$this->load->view('updateOrderView', $data);
    }

	
    public function updateOrder($orderNumber)
    {	

		//set validation rules
		$this->form_validation->set_rules('orderNumber', 'Order Number', 'required');
		$this->form_validation->set_rules('orderDate', 'Order Date', 'required');
		$this->form_validation->set_rules('requiredDate', 'Required Date', 'required');	
		$this->form_validation->set_rules('shippedDate', 'Shipped Date', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('comments', 'Comments', 'required');	
		$this->form_validation->set_rules('customerNumber', 'Customer Number', 'required');
	
		//get values from post
		$orderNumber = $this->input->post('orderNumber');
		$anOrder['orderDate'] = $this->input->post('orderDate');
$anOrder['requiredDate'] = $this->input->post('requiredDate');
$anOrder['shippedDate'] = $this->input->post('shippedDate');
$anOrder['status'] = $this->input->post('status');
$anOrder['comments'] = $this->input->post('comments');
$anOrder['customerNumber'] = $this->input->post('customerNumber');


		if (!$this->form_validation->run()){
			$this->load->view('updateOrderView', $anOrder);
			return;
		}
		if ($this->OrderModel->updateOrderModel($anOrder, $orderNumber)) {
			redirect('OrderController/listOrders');
		}
		else {
			$data['message']="Uh oh ... problem on update";
		}
    }

	public function handleInsert(){
		if ($this->input->post('submitInsert')){

			
	
			$this->form_validation->set_rules('orderNumber', 'Order Number', 'required');
			$this->form_validation->set_rules('orderDate', 'Order Date', 'required');
			$this->form_validation->set_rules('requiredDate', 'Required Date', 'required');	
			$this->form_validation->set_rules('shippedDate', 'Shipped Date', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('comments', 'Comments', 'required');	
			$this->form_validation->set_rules('customerNumber', 'Customer Number', 'required');

				$orderNumber['orderNumber'] = $this->input->post('orderNumber');
		$anOrder['orderDate'] = $this->input->post('orderDate');
$anOrder['requiredDate'] = $this->input->post('requiredDate');
$anOrder['shippedDate'] = $this->input->post('shippedDate');
$anOrder['status'] = $this->input->post('status');
$anOrder['comments'] = $this->input->post('comments');
$anOrder['customerNumber'] = $this->input->post('customerNumber');
			
			//check if the form has passed validation
			if (!$this->form_validation->run()){
				//validation has failed, load the form again
				$this->load->view('insertOrderView', $anOrder);
				return;
			}

			//check if insert is successful
			if ($this->OrderModel->insertOrderModel($anOrder)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}
			
			//load the view to display the message
			$this->load->view('displayMessageView', $data);
			
			return;
		}
		$anOrder['orderNumber'] = "";
		$anOrder['orderDate'] = "";
		$anOrder['requiredDate'] = "";
		$anOrder['shippedDate'] = "";
		$anOrder['status'] = "";
		$anOrder['comments'] = "";
		$anOrder['customerNumber'] = "";

		//load the form
		$this->load->view('insertOrderView', $anOrder);
	}

	
	
}