<?php
	session_start();

//Load
	$products = array("Alaskan Hiking Vaction", "Bahamas Vacation", "Beach Vacation");
	$amounts = array("1900.00", "1500.00", "899.99");
	
	if(!isset($_SESSION["total"])){
		$_SESSION["total"] = 0;
			
		for($i = 0; $i < count($products); $i++){
			$_SESSION["qty"][$i] = 0;
			$_SESSION["amounts"][$i] = 0;
		}
	}
	
	//Add
	if ( isset($_GET["add"]) ){
		$i = $_GET["add"];

		$qty = $_SESSION["qty"][$i] + 1;

		$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
		$_SESSION["cart"][$i] = $i;
		$_SESSION["qty"][$i] = $qty;
	}
	
	 
 	//Reset
 	if(isset($_GET['reset'])){
 		if($_GET['reset'] == 'true'){
			unset($_SESSION["qty"]);
			unset($_SESSION["amounts"]);
			unset($_SESSION["total"]);
			unset($_SESSION["cart"]);
		}
 	}


	//delete
	if( isset($_GET["delete"])){
   		$i = $_GET["delete"];
   		$qty = $_SESSION["qty"][$i];
   		$qty--;
   		$_SESSION["qty"][$i] = $qty;

	 	if ($qty == 0) {
   				$_SESSION["amounts"][$i] = 0;
   				unset($_SESSION["cart"][$i]);
 		}
 		else {
   			$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
 		}
 	}
?>