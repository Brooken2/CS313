<?php
	include 'sessionHandle.php';
	include 'shopping-heading.php';
?>


 <?php
 if ( isset($_SESSION["cart"]) ) {
 ?>
 	
 	<h2>Cart</h2>
 	<table class ="table table-condensed">
	<thead>
	 <tr>
	 <th>Product</th>
 	<th width="10px">&nbsp;</th>
 	<th>Qty</th>
 	<th width="10px">&nbsp;</th>
 	<th>Amount</th>
 	<th width="10px">&nbsp;</th>
 	<th>Action</th>
	 </tr>
	 </thead>

 <?php
 $total = 0;
 foreach ( $_SESSION["cart"] as $i ) {
 ?>

	<thead>
	 <tr>
 	<td><?php echo($products[$_SESSION["cart"][$i]] ); ?></td>
 	<td width="10px">&nbsp;</td>
 	<td><?php echo( $_SESSION["qty"][$i] ); ?></td>
 	<td width="10px">&nbsp;</td>
 	<td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
 	<td width="10px">&nbsp;</td>
 	<td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
 	</tr>
	</thead>
 
 <?php
 $total =  $total + $_SESSION["amounts"][$i];
 }
 $_SESSION["total"] = $total;
 ?>
 
 	<tr>
 		<td colspan="7">Total : <?php echo($total); ?></td>
	 </tr>
</table>
	
<?php
 }
 else{
 ?>
 	<h2>Nothing in the cart</h2>
 
 <?php
 }
 ?>
 
 <div class="center">
	<a href="shopping.php" class="btn btn-info btn-lg">Continue Shopping</a>
	<a href="checkout.php" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-ok"></span> Check-Out</a>
</div>
 </body>
 </html>
 
 
