<?php
	include 'sessionHandle.php';

	$name = htmlspecialchars($_REQUEST['name']);
	$lastname = htmlspecialchars($_REQUEST['lastname']);
	$email = htmlspecialchars($_REQUEST['email']);
	$phone = htmlspecialchars($_REQUEST['phone']);
	$address = htmlspecialchars($_REQUEST['address']);

	$_SESSION["name"] = $name;
	$_SESSION["lastname"] = $lastname;
	$_SESSION["email"] = $email;
	$_SESSION["phone"] = $phone;
	$_SESSION["address"] = $address;
	
	$total = $_SESSION["total"];
	
	
	include 'shopping-heading.php';
 	if ( isset($_SESSION["cart"]) ) {
 ?>

 	<h2>Summary of Purchase</h2>
 	<table class="table table-condensed">
 		<tr>
 			<th>Product</th>
 			<th width="10px">&nbsp;</th>
 			<th>Qty</th>
 			<th width="10px">&nbsp;</th>
 			<th>Amount</th>
 			<th width="10px">&nbsp;</th>
 		</tr>
 <?php
 	foreach ( $_SESSION["cart"] as $i ) {
 ?>
 	<tr>
 		<td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
 		<td width="10px">&nbsp;</td>
 		<td><?php echo( $_SESSION["qty"][$i] ); ?></td>
 		<td width="10px">&nbsp;</td>
 		<td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
 		<td width="10px">&nbsp;</td>
 	</tr>
 <?php
 	}
 ?>
 	<tr>
 		<td colspan="7">Total : <?php echo($total); ?></td>
 	</tr>
 	</table>
 <?php
 	}
 ?>

	<h3>Shipping To: </h3>
	<p>Name:     <?php echo $name; ?>  <?php echo $lastname; ?><br>
    		   Email:      <?php echo $email; ?><br>
      	   Phone:    <?php echo $phone; ?><br>
       	   Address:  <?php echo $address; ?></p>
	<br>
</body>
</html>

