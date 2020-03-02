<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>

<?php 
	foreach ($view_data as $row) { 
		echo form_open();
		echo '</br></br>';
		
		echo 'Customer Number :';
		echo form_input('customerNumber', $row->customerNumber, 'readonly');
	
		echo '</br></br>Card Type :';
		echo form_input('cardType', $row->cardType, 'readonly');

		echo '</br></br>Card Number:';
		echo form_input('cardNumber', $row->cardNumber, 'readonly');

		echo '</br></br>Expiry Date:';
		echo form_input('expiryDate', $row->expiryDate, 'readonly');

		echo '</br></br>CVV :';
		echo form_input('CVV', $row->CVV, 'readonly');

		echo '</br></br>check Number:';
		echo form_input('checkNumber', $row->checkNumber, 'readonly');

		echo '</br></br>Payment Date:';
		echo form_input('paymentDate', $row->paymentDate, 'readonly');
	
		echo '</br></br>Amount:';
		echo form_input('amount', $row->amount, 'readonly');

		echo '</br></br>Order Number:';
		echo form_input('orderNumber', $row->orderNumber, 'readonly');



		echo '</br></br>';
		echo form_close();
	}
?>

<?php
	$this->load->view('footer'); 
?>