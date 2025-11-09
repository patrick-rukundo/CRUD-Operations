
<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Product - Restaurant</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial;
        }
        .container {
            width: 400px;
            margin: 100px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Product</h2>
        <form action="" method="POST">
            <label>Product Name:</label>
            <input type="text" name="ProductName" required>

            <label>Category:</label>
            <input type="text" name="Category" required>

            <label>Price:</label>
            <input type="text" name="Price" step="0.01" required>

            <input type="submit" value="Add Product">
        </form>
    </div>
    <?php
// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ProductName = $_POST['ProductName'];
    $Category = $_POST['Category'];
    $Price = $_POST['Price'];

    // Insert into table
    $sql = "INSERT INTO Products (product_name, category, price)
            VALUES ('$ProductName', '$Category', '$Price')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Product added successfully!'); window.location='viewProduct.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>

</body>
</html>
