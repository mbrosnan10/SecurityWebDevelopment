<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutController extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load form library & helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model('ProductModel');
        $this->controller = 'checkout';
    }
    
    function index(){
        // Redirect if the cart is empty
        if($this->cart->total_items() <= 0){
            redirect('products/');
        }
        
        $custData = $data = array();
        
        // If order request is submitted
        $submit = $this->input->post('placeOrder');
        if(isset($submit)){
            // Form field validation rules
            $this->form_validation->set_rules('contactName', 'contactName', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('address1', 'Address1', 'required');
            
            // Prepare customer data
            $custData = array(
                'contactName'     => strip_tags($this->input->post('contactName')),
                'email'     => strip_tags($this->input->post('email')),
                'phone'     => strip_tags($this->input->post('phone')),
                'address1'=> strip_tags($this->input->post('address1'))
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert customer data
                $insert = $this->product->insertCustomerView($custData);
                
                // Check customer data insert status
                if($insert){
                    // Insert order
                    $order = $this->placeOrder($insert);
                    
                    // If the order submission is successful
                    if($order){
                        $this->session->set_userdata('success_msg', 'Order placed successfully.');
                        redirect($this->controller.'/orderSuccess/'.$order);
                    }else{
                        $data['error_msg'] = 'Order submission failed, please try again.';
                    }
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        // Customer data
        $data['custData'] = $custData;
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        
        // Pass products data to the view
        $this->load->view($this->controller.'/index', $data);
    }
    
    function placeOrder($customerNumner){
        // Insert order data
        $ordData = array(
            'customerNumber' => $customerNumber,
            'total' => $this->cart->total()
        );
        $insertOrder = $this->product->insertOrderView($ordData);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['orderNumber']     = $insertOrder;
                $ordItemData[$i]['produceCode']     = $item['id'];
                $ordItemData[$i]['quantityOrder']     = $item['quantityOrder'];
                $ordItemData[$i]['priceEach']     = $item["priceEach"];
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->product->insertOrderItems($ordItemData);
                
                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy();
                    
                    // Return order ID
                    return $insertOrder;
                }
            }
        }
        return false;
    }
    
    function orderSuccess($orderNumber){
        // Fetch order data from the database
        $data['orderdetails'] = $this->product->getOrder($orderNumber);
        
        // Load order details view
        $this->load->view($this->controller.'/order-success', $data);
    }
    
}