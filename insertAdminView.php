<?php
	$this->load->view('Adminheader'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
<h1 class="main"> Insert New Admin </h1>
<?php echo form_open_multipart('AdminController/handleInsert');

	echo '<br><br>';
	echo 'Enter Admin Number :';
	echo form_input('adminNumber', $adminNumber);


	echo '</br></br>Enter FirstName :';
	echo form_input('FirstName', $FirstName);

	echo '</br></br>Enter LastName :';
	echo form_input('LastName', $LastName);


	echo '</br></br>Enter Email :';
	echo form_input('email', $email);
	

	echo '</br></br>Enter Password :';
	echo form_input('password', $password);




	echo '</br></br>';
	
	echo form_submit('submitadminInsert', "Submit!");

	echo form_close();
	echo validation_errors();
?>

<?php
	$this->load->view('footer'); 
?>