<?php

	$name = $email = $major = $comments = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$major = $_POST["major"];
		$comments = $_POST["comments"];
			
		echo "Name: $name <br/>";
		echo "<a href='mailto:$email'>$email</a><br/>";
		echo "Major: $major <br/>";
		echo "Comments: $comments <br/>";
		
		foreach($_POST['continent'] as $var){
			echo $var;
			echo "<br/>";
		}
	}
	else {
		echo "<h1> WHIFFF!!!! Please use Post.</h1><br/>";
	}	
	
$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
if (!empty($product_array)) { 
foreach($product_array as $key=>$value){
}}

case "add":
	if(!empty($_POST["quantity"])) {
		$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
		$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
		
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
break;

case "remove":
	if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($_GET["code"] == $k)	unset($_SESSION["cart_item"][$k]);				
			if(empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]);
		}
	}
break;
case "empty":
	unset($_SESSION["cart_item"]);
break;
	

?>