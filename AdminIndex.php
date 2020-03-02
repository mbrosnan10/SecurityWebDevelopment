<?php
	$this->load->view('Adminheader'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
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
   <td></td>
</button>
<td></td>
</button>
    <td><button type="button" padding-left="50" align="middle" hspace="40" ><?= anchor('ProductController/handleInsert', 'Add To Order', 'title="Add To Order"'); ?></td>
</button>
<td><button type="button" padding-left="50" align="middle" hspace="40" ><?= anchor('ProductController/handleInsert', 'Add To Order', 'title="Add To Order"'); ?></td>
</button>
<td><button type="button" padding-left="50" align="middle" hspace="40" ><?= anchor('ProductController/handleInsert', 'Add To Order', 'title="Add To Order"'); ?></td>
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