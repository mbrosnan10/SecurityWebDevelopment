<?php
$this->load->view('header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>
<br>
<h1 class="main"> Update Product </h1>
<?php
foreach ($edit_data as $row) {
echo form_open_multipart('ProductController/updateProduct/'.$row->produceCode);
echo '</br></br>';
echo 'produceCode:';
echo form_input('produceCode', $row->produceCode, 'readonly');
echo '</br></br>Enter description :';
echo form_input('description', $row->description);
echo '</br></br>Enter productLine :';
echo form_input('productLine', $row->productLine);
echo '</br></br>Enter supplier :';
echo form_input('supplier', $row->supplier);
echo '</br></br>Enter quantityInStock :';
echo form_input('quantityInStock', $row->quantityInStock);
echo '</br></br>Enter bulkBuyPrice :';
echo form_input('bulkBuyPrice', $row->bulkBuyPrice);
echo '</br></br>Enter bulkSalePrice :';
echo form_input('bulkSalePrice', $row->bulkSalePrice);
echo '</br></br>Select File for Upload :';
echo form_upload('photo');
echo '</br></br>';
echo form_submit('submitUpdate', "Submit!");
echo form_close();
echo validation_errors();
}
?>
<?php
$this->load->view('footer');
?>