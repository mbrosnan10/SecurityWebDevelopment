<?php
//sessions 2018
//new view for login
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
 
<?php echo validation_errors();
   
		echo form_open('AdminController/verify_login'); 
		
		echo"</br></br>";
		echo "Enter email";
		echo"</br></br>";
		echo form_input('email');
		
		echo "<br><br>";
		
		echo "Enter Password";
		echo form_password('password');
		
		echo "<br><br>";
		
		echo form_submit("Login", "Login!"); 
		echo"</br></br>";
		echo"</br></br>";
		echo"</br></br>";
	?>
<?php
	$this->load->view('footer'); 
?>
