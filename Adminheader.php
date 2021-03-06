<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->helper('url'); 
	$cssbase = base_url()."assets/css/";
	$jsbase = base_url()."assets/js/";
	$img_base = base_url()."assets/images/";
	$base = base_url() . index_page();
?>
<!DOCTYPE>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo $cssbase . "stye.css"?>" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo $jsbase."common.js"?>"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
<header>
		<img class="center-image" src="<?php echo $img_base . "site/logo.png"?>" />
<br>
<ul>
	 <li>  <?= anchor('AdminController/index', 'Home', 'title="Home"'); ?></li>
	&nbsp;&nbsp;&nbsp;
		<li><?= anchor('ProductController/handleInsert', 'Insert', 'title="Insert"'); ?></li>
			&nbsp;&nbsp;&nbsp;
  	<li><?= anchor('AdminController/listProducts', 'List', 'title="List"'); ?></li>
	    &nbsp;&nbsp;&nbsp;
	    	<li><?= anchor('OrderCotroller/listOrders', 'order', 'title="order"'); ?></li>
	    &nbsp;&nbsp;&nbsp;
	     <li> <?= anchor('AdminController/handleInsert', 'Register', 'title="Register"'); ?></li>
	    &nbsp;&nbsp;&nbsp;

<li>  <?= anchor('ProductController/index', 'Logout', 'title="logout"'); ?></li>

	  <li><?= anchor('', 'Purchase', 'title="Purchase"'); ?> </li>
	 &nbsp;&nbsp;&nbsp;
	 	 &nbsp;&nbsp;&nbsp;
	 	 	 &nbsp;&nbsp;&nbsp;

	 	 	 

</ul>
		
	</header>

	
</body>
</html>