<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('Adminheader'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>

<div class="list">
	<br><br>
	<h1 class="main">List of Product</h1>
	<br>
	<table>
		<tr>
			<th align="left" width="50">produceCode</th>
			<th align="left" width="50">description</th>
			<th align="left" width="50">productLine</th>
			<th align="left" width="50">supplier</th>
			<th align="left" width="50">quantityInStock</th>
			<th align="left" width="50">bulkBuyPrice</th>
			<th align="left" width="50">bulkSalePrice</th>
			<th align="left" width="50">photo</th>
	

		</tr>
<?php echo form_open_multipart('ProductController/handleSearch');
			
				echo '<br><br>';
				echo 'Search for  product by  Product Name :<br>';
				echo form_input('Search', );
				echo form_submit('submitSearch', "Submit!");
				echo form_close();
					?>
		<?php foreach($product_info as $row){?>
		<tr>
			<td><?php echo $row->produceCode;?></td>
			<td><?php echo $row->description;?></td>
			<td><?php echo $row->productLine;?></td>
			<td><?php echo $row->supplier;?></td>
			<td><?php echo $row->quantityInStock;?></td>
			<td><?php echo $row->bulkBuyPrice;?></td>
			<td><?php echo $row->bulkSalePrice;?></td>
			<td><img src="<?php echo $img_base.'thumbs/'.$row->photo;?>"></td>
			
			<td><button type="button" ><?php echo anchor('ProductController/editProduct/'.$row->produceCode, 'Update');
			?>
			</td>
		</button>
			`<td><button type="button" ><?php echo anchor('ProductController/viewProduct/'.$row->produceCode, 'View');
			?>
			</td>
			</button>
			<td><button type="button" ><?php echo anchor('ProductController/deleteProduct/'.$row->produceCode
,'Delete','onclick = "return checkDelete()"');?>
			</td>
		</button>
<td><button type="button" ><?php echo anchor('ShoppingController/billing_view/'.$row->produceCode, 'order');
			

?></td>
</button>
		</tr>     
		<?php }?>  
   </table>
   <br><br>
</div>

<?php
	$this->load->view('footer'); 
?>