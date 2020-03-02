<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
<h1 class="main"> Insert New Produce </h1>
<?php echo form_open_multipart('ProductController/handleInsert');

	echo '<br><br>';
	echo 'Enter Product ID :';
	echo form_input('produceCode', $produceCode);

	echo '</br></br>Enter descripition:';
	echo form_input('description', $description);

	echo '</br></br>Enter productLine :';
	echo form_input('productLine', $productLine);

	echo '</br></br>Enter supplier :';
	echo form_input('supplier', $supplier);
	
	echo '</br></br>Enter quantityInStock:';
	echo form_input('quantityInStock', $quantityInStock);

	echo '</br></br>Enter bulkBuyPrice :';
	echo form_input('bulkBuyPrice', $bulkBuyPrice);

	echo '</br></br>Enter bulkSalePrice  :';
	echo form_input('bulkSalePrice', $bulkSalePrice);
	
	echo '</br></br>Select File for Upload :';
    echo form_upload('userfile');


	echo '</br></br>';
	
	echo form_submit('submitInsert', "Submit!");

	echo form_close();
	echo validation_errors();
?>

<?php
	$this->load->view('footer'); 
?>