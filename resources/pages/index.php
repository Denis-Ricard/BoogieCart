<?php

/**
 * @author Denis Ricard
 * @copyright 2011
 */

// Shopping cart
if(!empty($_POST)) {

	if(is_array(@$_SESSION['cart'])){
		$max = count($_SESSION['cart']);
		$_SESSION['cart'][$max]['id'] = $_POST['id'];
		$_SESSION['cart'][$max]['color'] = $_POST['color'];
		$_SESSION['cart'][$max]['qty'] = $_POST['qty'];
	} else {
		$_SESSION['cart'] = array();
		$_SESSION['cart'][0]['id'] = $_POST['id'];
		$_SESSION['cart'][0]['color'] = $_POST['color'];
		$_SESSION['cart'][0]['qty'] = $_POST['qty'];
	}
	
	echo "<h2>Product added to cart</h2>";
	
}
print_r($_SESSION['cart']);
?>

<div id="content">
    
    <h2>Accueil</h2>
    
    <ul>
    <?php foreach($products as $product) { ?>
		<li style="list-style:none;">
			<strong><?php echo $product->name; ?></strong> (<?php echo $product->price; ?>$)
			<br>Color: <?php echo $product->color; ?>
			<br> 
			<form name="addToCart" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				Quantity: <input type="text" name="qty" style="width: 20px;">
				<br>
				<input type="submit" name="action" value="Add to cart">
				<input type="hidden" name="id" value="<?php echo $product->id; ?>">
				<input type="hidden" name="color" value="<?php echo $product->color; ?>">
			</form>
			<hr>
		</li>
    <?php } ?>
    </ul>
    
    <h2>Cart</h2>
    <?php 
    foreach($_SESSION['cart'] as $item) { 
    	echo $item['id'] . ' (' . $item['qty'] . ') : color: ' . $item['color'] . '<br>';
    }
    ?>
    
</div>


