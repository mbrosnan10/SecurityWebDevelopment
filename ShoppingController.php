<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShoppingController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');

    }

    /**
     * Add product to cart.
     */
	public function addToCart()
	{
	    $produceCode = $this->input->post('id');

	    $product = $this->ProductsModel->get($produceCode);
        $qty = 1;
	    if($this->input->post('qty'))
	    {
            $qty = $this->input->post('qty');
        }
       
        $data = array(
            'id'      => $products->id,
            'qty'     => $qty,
            'bulkSalePrice'   => $products->price,
            'description'    => $product->description,
           
        );

        $status = $this->cart->insert($data);
        if($status)
        {
            $this->session->set_flashdata('success', 'Product added to cart successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Failed to add product to cart');
        }


        redirect($_SERVER['HTTP_REFERER']);
        exit;

	}

    /**
     * Update cart
     */
	public function updateCart()
    {
        $input_cart = $product_id = $this->input->post('cart');
        $status = $this->cart->update($input_cart);

        if($status)
        {
            $this->session->set_flashdata('success', 'Cart updated successfully');
        }
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    public function removeItem(){
        $this->input->post("row_id");
    }

    public function show()
    {

        $data['cart'] = $this->cart->contents();



        $this->load->template('cart/cart',$data);
    }
}