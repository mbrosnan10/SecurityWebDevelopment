<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->helper('url'); 
    $cssbase = base_url()."assets/css/";
    $jsbase = base_url()."assets/js/";
    $img_base = base_url()."assets/images/";
    $base = base_url() . index_page();
?>
<h2>Order Status</h2>
<p class="ord-succ">Your order has been placed successfully.</p>

<!-- Order status & shipping info -->
<div class="row col-lg-12 ord-addr-info">
    <div class="col-sm-6 adr">
        <div class="hdr">Shipping Address</div>
        <p><?php echo $order['name']; ?></p>
        <p><?php echo $order['email']; ?></p>
        <p><?php echo $order['phone']; ?></p>
        <p><?php echo $order['address']; ?></p>
    </div>
    <div class="col-sm-6 info">
        <div class="hdr">Order Info</div>
        <p><b>Reference ID</b> #<?php echo $order['id']; ?></p>
        <p><b>Total</b> <?php echo '$'.$order['grand_total'].' USD'; ?></p>
    </div>
</div>

<!-- Order items -->
<div class="row ord-items">
    <?php if(!empty($order['items'])){ foreach($order['items'] as $item){ ?>
    <div class="col-lg-12 item">
        <div class="col-sm-2">
            <div class="img" style="height: 75px; width: 75px;">
                <?php $imageURL = !empty($item["image"])?base_url('uploads/product_images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                <img src="<?php echo $imageURL; ?>" width="75"/>
            </div>
        </div>
        <div class="col-sm-4">
            <p><b><?php echo $item["name"]; ?></b></p>
            <p><?php echo '$'.$item["price"].' USD'; ?></p>
            <p>QTY: <?php echo $item["quantity"]; ?></p>
        </div>
        <div class="col-sm-2">
            <p><b><?php echo '$'.$item["sub_total"].' USD'; ?></b></p>
        </div>
    </div>
    <?php } } ?>
</div>