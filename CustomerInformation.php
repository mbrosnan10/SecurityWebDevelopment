<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('Customerheader'); 
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
			<th align="left" width="50">bulkSalePrice</th>
			<th align="left" width="50">photo</th>
	

		</tr>

		<?php foreach($product_info as $row){?>
		<tr>
			<td><?php echo $row->customerNumber;?></td>
			<td><?php echo $row->customerName;?></td>
			<td><?php echo $row->contactLastName;?></td>
			<td><?php echo $row->contactFirstName;?></td>
			<td><?php echo $row->phone;?></td>
			<td><?php echo $row->addessLine1;?></td>
			<td><?php echo $row->addressLine2;?></td>
			<td><?php echo $row->city;?></td>
			<td><?php echo $row->postalCode;?></td>
			<td><?php echo $row->country;?></td>
			<td><?php echo $row->creditLimit;?></td>
			<td><?php echo $row->email;?></td>
				<td><?php echo $row->password;?></td>
			
			

<td><button type="button" ><?php echo anchor('CustomerProductController/orderProduct/'.$row->produceCode, 'order');
			

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