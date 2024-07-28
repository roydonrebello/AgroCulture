<?php
session_start();
require 'db.php';

// Code for deleting a product by name
if (isset($_GET['delete_product_name'])) {
    $productName = $_GET['delete_product_name'];

    // Perform deletion query
    $sqlDelete = "DELETE FROM fproduct WHERE product='$productName'";
    $resultDelete = mysqli_query($conn, $sqlDelete);

    if ($resultDelete) {
        $_SESSION['message'] = "Product deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting product!";
    }

    header("Location: market.php"); // Redirect to your desired page after deletion
    exit();
}

// Rest of your code for product upload and other operations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Code for uploading a product
    if (isset($_POST['type']) && isset($_POST['pname']) && isset($_POST['pinfo']) && isset($_POST['price'])) {
        // Your existing upload code
    } else {
        $_SESSION['message'] = "Incomplete form data!";
        header("Location: Login/error.php");
        exit();
    }
}

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AgroCulture</title>
    <!-- Include your CSS and JavaScript files here -->
</head>
<body>

<?php require 'menu.php'; ?>

<section id="one" class="wrapper style1 align-center">
    <div class="container">
        <form method="POST" action="uploadProduct.php" enctype="multipart/form-data">
            <h2>Enter the Product Information here..!!</h2>
            <br>
            <!-- Your form inputs and elements -->
            <input type="file" name="productPic"></input>
            <br />
            <!-- Rest of your form elements -->
            <!-- Example delete link for each product -->
            <a href="uploadProduct.php?delete_product_name=banana">Delete Product 1</a>
            <a href="uploadProduct.php?delete_product_name=Product2">Delete Product 2</a>
            <!-- Add more delete links as needed, replacing Product1 and Product2 with actual product names -->
        </form>
    </div>
</section>

</body>
</html>
