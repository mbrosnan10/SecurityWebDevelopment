<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
<h1 class="main">Payment </h1>
<?php echo form_open_multipart('PaymentController/handleInsert');

	echo '<br><br>';
	echo 'Enter Card Type :';
	echo form_input('cardType', $cardType);

	echo '</br></br>Enter Card Number:';
	echo form_input('cardNumber', $cardNumber);

	echo '</br></br>Enter Card Name :';
	echo form_input('cardName', $cardName);

	echo '</br></br>Enter Expiry Date :';
	echo form_input('expiryDate', $expiryDate);
	
	echo '</br></br>Enter CVV:';
	echo form_input('CVV', $CVV);

	


	echo '</br></br>';
	
	echo form_submit('submitInsert', "Submit!");

	echo form_close();
	echo validation_errors();
?>

<?php
	$this->load->view('footer'); 
?>