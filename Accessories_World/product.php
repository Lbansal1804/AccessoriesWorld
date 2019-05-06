<?php
		session_start();
		$dbc = mysqli_connect('localhost', 'root', '', 'shopping');
		 if(isset($_POST["add_to_cart"]))
		 {
			 if(isset($_SESSION["shopping_cart"]))
			 {
				 
				 $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
				
				 if(!in_array($_GET["item_id"], $item_array_id))
				 {
					 $count = count($_SESSION["shopping_cart"]);
					 $item_array = array(
					 'item_id' => $_GET["item_id"],
					 'item_name' => $_POST["hidden_name"],
					 'item_price' => $_POST["hidden_price"],
					 'item_quantity' => $_POST["quantity"]
					 );
					 
					 $_SESSION["shopping_cart"][$count] = $item_array;
					 
					 
				 }
				 else
				 {
					 echo '<script>alert("Item Already Added")</script>';
					 echo '<script>window.location="product.php"</script>';
				 }
				
				 
			 }
			 else
			 {
				 $item_array = array(
				 
				 'item_id' => $_GET["item_id"],
				 'item_name' => $_POST["hidden_name"],
				 'item_price' => $_POST["hidden_price"],
				 'item_quantity' => $_POST["quantity"]
				 );
				 
				 $_SESSION["shopping_cart"][0] = $item_array;
				
				 
			 }
			 
			 
			 
		 }
		 
		
?>

<html>

	<head>
		<title>Php Project 1</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	
	
	<body>
		<br/>
		
		<div class = "container" style = "width:800px;">
			<h3 align="center"> Welcome to Accessories world</h3><br />
			
		
		<?php
		$q = "SELECT * FROM items ORDER BY item_id ASC";
		
		$r = @mysqli_query($dbc, $q);
		if(mysqli_num_rows($r) > 0)
		{
		
			while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				?>
				<div class = "col-md-4">
			
					<form method="POST" action="product.php?action=add&item_id=<?php echo $row["item_id"];?>">
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						
							<img src="images/<?php echo $row["imagep"]; ?>" class="img-responsive" /><br />
							
							<h4 class="show_list"><?php echo $row["productname"];?></h4> 
							
							<h4 class="text-danger">$ <?php echo $row["price"];?></h4>
							
							<input type="text" name="quantity" value="1" class="form-control" />
							
							<input type="hidden" name="hidden_name" value="<?php echo $row["productname"];?>"/>
							
							<input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>"/>
							
							<input type="submit" name="add_to_cart" style="margin-top:7px;" class="btn btn-success" value="Add to Cart"/>
							
						</div>
					</form>
					
				</div>
			
				<?php
			
			}
		}
		
		?>
		
		<div style="clear:both"></div>
		
		<br/>
		<div>
			<table>
				
				<?php
				if(!empty($_SESSION["shopping_cart"]))
				{
				
				?>
				<tr>
					<td> <input type="submit" name="checkout" value="Checkout" style="margin-top:5px;" class="btn btn-success" onclick= "window.open('demo.php', '_self');" /></td>
				</tr>
				<?php
					
				}
				
				?>	
			</table>
		</div>
		
		
		<br />
		
	</body>
</html>