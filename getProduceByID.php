<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<?php

echo form_open("ProduceController/getProduceByID");
echo "Enter description";
echo form_input('description');
</br>
echo form_submit('submitproduceCode', "Submit!");
echo form_close();

?>
<?php
	$this->load->view('footer'); 
?>


