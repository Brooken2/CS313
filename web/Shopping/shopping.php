<?php
	include 'sessionHandle.php';
	include 'shopping-heading.php';
?>
<body>
<h2>List of All Products</h2>
	
 	<table class ="table table-condensed">
	<thead>
  		 <tr>
   		<th>Product</th>
   		<th width="10px">&nbsp;</th>
   		<th>Amount</th>
   		<th width="10px">&nbsp;</th>
   		<th>Action</th>
   		</tr>
	</thead>
 
 <?php
 for ($i=0; $i< count($products); $i++) {
   ?>
   		<tbody>
 		 		<tr>
   				<td><?php echo($products[$i]); ?></td>
   				<td width="10px">&nbsp;</td>
   				<td><?php echo($amounts[$i]); ?></td>
   				<td width="10px">&nbsp;</td>
   				<td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
   				</tr>
		</tbody>
<?php
 }
 ?>
 
 	 <tr>
 	<td colspan="5"></td>
 	</tr>
 	<tr>
 	<td colspan="5"><a href="?reset=true">Reset Cart</a></td>
 	</tr>
 	</table>

</body>
</html>

