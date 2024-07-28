<?php
	session_start();
	require 'db.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pid = $_POST['pid'];
		$productName = $_POST['productName'];
		$productInfo = $_POST['productInfo'];
		$productPrice = $_POST['productPrice'];

		$sqlUpdate = "UPDATE fproduct SET product = '$productName', pinfo = '$productInfo', price = '$productPrice' WHERE pid = '$pid'";
		$resultUpdate = mysqli_query($conn, $sqlUpdate);
		if ($resultUpdate) {
			$_SESSION['message'] = "Product updated successfully!";
			header("Location: market.php"); // Redirect to market page after update
			exit();
		} else {
			$_SESSION['message'] = "Error updating product!";
			header("Location: Login/error.php"); // Redirect to error page if update fails
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>AgroCulture: Product</title>
	<meta lang="eng">
	<meta charset="UTF-8">
		<title>AgroCulture</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="Blog/commentBox.css" />
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
</head>
<body>
	<!-- Add your HTML content here -->
	<?php require 'menu.php'; ?>

	<!-- Edit Product form -->
	<div class="container">
		<h2>Edit Product</h2>
		<form method="POST" action="">
			<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>"> <!-- Hidden input to pass product ID -->
			<label for="productName">Product Name:</label>
			<input type="text" id="productName" name="productName" value="<?= $productName ?>" required>
			<label for="productInfo">Product Info:</label>
			<textarea id="productInfo" name="productInfo" required><?= $productInfo ?></textarea>
			<label for="productPrice">Product Price:</label>
			<input type="text" id="productPrice" name="productPrice" value="<?= $productPrice ?>" required>
			<button type="submit">Update Product</button>
		</form>
	</div>
</body>
</html>
