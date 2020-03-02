<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!DOCTYPE>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>

<script src="<?php echo $jsbase."common.js"?>"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>


</head>
</html>
</br></br></br>
<table>
  <tr>
    <th><img class="left-image"padding-left="50" align="middle" hspace="40" src="<?php echo $img_base . "carrots.jpg"?>" /></th>

    <th><img class="left-image" padding-left="50" align="middle" hspace="40" src="<?php echo $img_base . "carrots.jpg"?>"</th> 
    <th><img class="left-image" padding-left="50" align="middle" hspace="40"src="<?php echo $img_base . "eggs.jpg"?>"</th>
        <th><img class="left-image"padding-left="50" align="middle" hspace="40" src="<?php echo $img_base . "lettuce.jpg"?>"</th>
            <th><img class="left-image" padding-left="50" align="middle" hspace="40"src="<?php echo $img_base . "jam.jpg"?>"</th>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
   <td><button type="button" padding-left="50"  ><?= anchor('ProductController/handleInsert', '
   Add To Order', 'title="Add To Order"'); ?></td>
</button>
<td><button type="button" padding-left="50" align="middle" hspace="40"  ><?= anchor('ProductController/handleInsert', ' Add To Order', 'title="Add To Order"'); ?></td>
</button>
    <td><button type="button" padding-left="50" align="middle" hspace="40" ><?= anchor('ProductController/handleInsert', 'Add To Order', 'title="Add To Order"'); ?></td>
</button>
<td><button type="button" padding-left="50" align="middle" hspace="40" ><?= anchor('ProductController/handleInsert', 'Add To Order', 'title="Add To Order"'); ?></td>
</button>
<td><button type="button" padding-left="50" align="middle" hspace="40" ><?= anchor('ShoppingController/addToCart', 'Add To Chat', 'title="Add To Order"'); ?></td>
</button>
  </tr>
</table>
<br>

	</div>
	</body>
</html>
<?php
	$this->load->view('footer'); 
?>