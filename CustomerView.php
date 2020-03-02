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
			<th align="left" width="50">Customer Number</th>
			<th align="left" width="50">Customer Name</th>
			<th align="left" width="50">Contact Last Name</th>
			<th align="left" width="50">Contact FirstName</th>
		</tr>

		<?php foreach($customer_info as $row){?>
		<tr>
			<td><?php echo $row->customerNumber;?></td>
			<td><?php echo $row->customerName;?></td>
			<td><?php echo $row->contactLastName;?></td>
			<td><?php echo $row->ContactFirstName;?></td>
			
					</tr>     
		<?php }?>  
   </table>
   <br><br>
</div>

<?php
	$this->load->view('footer'); 
?>