<?php
	$this->load->view('Customerheader'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
<h1 class="main"> Insert New Customer </h1>
<?php echo form_open_multipart('CustomerController/handleInsert');

	echo '<br><br>';
	echo 'Enter Customer Number :';
	echo form_input('customerNumber', $customerNumber);

	echo '</br></br>Enter Customer Name:';
	echo form_input('customerName', $customerName);

	echo '</br></br>Enter LastName :';
	echo form_input('contactLastName', $contactLastName);

	echo '</br></br>Enter FirstName :';
	echo form_input('contactFirstName', $contactFirstName);
	
	echo '</br></br>Enter phone Number:';
	echo form_input('phone', $phone);

	echo '</br></br>Enter Line1 :';
	echo form_input('addressLine1', $addressLine1);

	echo '</br></br>Enter Line 2  :';
	echo form_input('addressLine2', $addressLine2);
	
echo '</br></br>Enter City :';
	echo form_input('city', $city);

	echo '</br></br> Enter PostalCode :';
	echo form_input('postalCode', $postalCode);

	echo '</br></br>Enter country:';
	echo form_input('country', $country);

	echo '</br></br>Enter Credit Limit :';
	echo form_input('creditLimit', $creditLimit);

	echo '</br></br>Enter Email :';
	echo form_input('email', $email);
	

	echo '</br></br>Enter Password :';
	echo form_input('password', $password);




	echo '</br></br>';
	
	echo form_submit('submitInsert', "Submit!");

	echo form_close();
	echo validation_errors();
?>

<?php
	$this->load->view('footer'); 
?>