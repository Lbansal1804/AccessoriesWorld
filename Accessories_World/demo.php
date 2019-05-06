<?php
	session_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'shopping');

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dbc = mysqli_connect('localhost', 'root', '', 'shopping');
		$errors = [];
		
		if(empty ($_POST['firstname'])){
		$errors[] = 'Please enter your Firstname.';
		} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
		}
		
		if(empty ($_POST['lastname'])){
		$errors[] = 'Please enter your Lastname.';
		} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
		}
		
		if(empty ($_POST['email'])){
		$errors[] = 'Please enter your Email Address.';
		} 
		
		else {
			$pattern = "/^[a-zA-Z]+[_|.|+]*[a-zA-Z]+[0-9]*(@).[a-zA-Z]+.[a-zA-Z]{1,5}+$/";
			//$e = mysqli_real_escape_string($dbc, trim($_POST['email']));	
		}
		
		if(empty ($_POST['payment'])){
		$errors[] = 'Please select one payment option.';
		} 
		
		else {
			$e = mysqli_real_escape_string($dbc, trim($_POST['payment']));			
		}
			
	
		if (empty($errors)){
			
			$q = 'INSERT INTO login (first_name, last_name, email_address, total_price) VALUES (?, ?, ?, ?)';
			$stmt = mysqli_prepare($dbc, $q);
			$total = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values)
					{
						
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
			
			mysqli_stmt_bind_param($stmt, 'sssi', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $total);
			
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
  			unset($_SESSION["shopping_cart"]);
			session_destroy();
			header('location: top.html');
			
		}else {
			
			echo '<p class="error" align="center" style="font-size:20px; color: red;";>The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg</br>\n";
		}		
		}
		mysqli_close($dbc);
	}
	
	
			 if(isset($_GET["action"]))
		 {
			 if($_GET["action"] == "delete")
			 {
				 foreach($_SESSION["shopping_cart"] as $keys => $values)
				 {
					 if($values["item_id"] == $_GET["item_id"])
					 {
						 unset($_SESSION["shopping_cart"][$keys]);
						 echo'<script>window.location="demo.php"</script>';
					 }
				 }
			 }
			 
			
		 }
?>




<html>
	<head>
		<title>Order Form</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			body {font-family: Arial, Helvetica, sans-serif;}
			* {box-sizing: border-box;}
			
			input[type=text] {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 6px;
			margin-bottom: 16px;
			resize: vertical;
			}
			
			input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			}

			input[type=submit]:hover {
			background-color: #1D5E1F;
			}
			
		</style>
		

	</head>
	<body>
		<h1 align="center">Order Form</h1> <br />
		
			<form action="demo.php" method="post">
			<div style = "width:50%; margin-left: 25%">
				<p><input type = "text" name = "firstname" placeholder = "Enter your firstname" value = "<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>"></p>
				<p><input type = "text" name = "lastname" placeholder = "Enter your lastname" value = "<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>"></p>
				<p><input type = "text" name = "email" placeholder = "Enter your email address" value = "<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
				<input type="radio" name="payment" value="credit"
				<?php if (isset($_POST['payment'])) echo 'checked="checked"';?>
				> Credit Card</br> 
				<input type="radio" name="payment" value="debit"
				<?php if (isset($_POST['payment'])) echo 'checked="checked"';?>
				> Debit Card </br>
				
			
				
				
				<h3>Order Details</h3>
				<div class="table-responsive">
				
				
					<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="20%">Total</th>
						<th width="5%">Action</th>
					</tr>
					
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
							<tr>
								<td><?php echo $values["item_name"]; ?></td>
								<td><?php echo $values["item_quantity"]; ?></td>
								<td>$ <?php echo $values["item_price"]; ?></td>
								<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
								
								<td><a href="demo.php?action=delete&item_id=<?php echo $values["item_id"]; ?>">Remove</td>
								
							</tr>
							<?php
								$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td>Total</td>
						<td>$ <?php echo number_format($total, 2); ?></td>
						
						
						
					</tr>
					<?php
						
					}
					
					?>
					
					
					
				</table>
				</div>
				
				<input type="submit" name="checkout" value="Place an Order"/>
				</div>
			</form>
		
	
	
	</body>
</html>