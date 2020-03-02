<?php
$this->load->view('header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?><?php


foreach ($view_data as $row){
	echo form_open();
	echo"</br></br>";
//	echo 'prodctCode:';
//echo form_input('prodctCode', $row->produceCode, 'readonly');
	echo"</br></br>";
	echo' description:';
	echo form_input('description', $row->description, 'readonly');
	echo"</br></br>";
	echo 'productLine:';
	echo form_input('productLine', $row->productLine, 'readonly');
	echo"</br></br>";
	echo 'supplier :';
	echo form_input('supplier', $row->supplier, 'readonly');
	echo"</br></br>";
		echo'description:';
	echo form_input('quantityInStock', $row->quantityInStock, 'readonly');
	echo"</br></br>";
	echo 'bulkBuyPrice:';
	echo form_input('bulkBuyPrice', $row->bulkBuyPrice, 'readonly');
	echo"</br></br>";
	echo 'bulkSalePrice :';
	echo form_input('bulkSalePrice', $row->bulkSalePrice, 'readonly');
	echo"</br></br>";
	echo'Photo';
		echo '<img src='. $img_base.'full/'.$row->photo.'>';
echo"</br></br>";
echo"</br></br>";
echo form_close();}
?>
<?php
$this->load->view('footer');?>
