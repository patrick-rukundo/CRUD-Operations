<?php
include("connect.php"); 

$sql = "SELECT * FROM Products";  
$result = mysqli_query($conn, $sql); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Products - Restaurant</title>
    <style>
        body {
            font-family: Arial;
            background: #f8f8f8;
            padding: 30px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            background: white;
            box-shadow: 0px 0px 10px gray;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
        .home-btn {
    background-color: #1d3557; /* dark blue */
    color: white;
    padding: 10px 18px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    transition: 0.3s ease;
    text-align: center;
    margin-right: 30px;

}

.home-btn:hover {
    background-color: #457b9d; 
    transform: scale(1.05);
}a{
    text-decoration: none;

}
.btn{
    display: flex;
    margin-left: 400px;

}


    </style>
</head>
<body>
    <h2>🍽️ All Products</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price (RWF)</th>
            <th>Edit</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td><a href='deleteProduct.php?id=" . $row['product_id'] . "' 
                           onclick='return confirm(\"Are you sure you want to delete this product?\")'>delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='updateProduct.php'>Update</a></td>";

                echo "</tr>";
               
            }
        } else {
            echo "<tr><td colspan='4'>No products found.</td></tr>";
        }
        
        ?>
         <tr>
 


    </table>
    <br><br>
    <br><br>
     
       
        
        <div class="btn">
            <div> <a href="home.php" 
                  onclick="return confirm('Are you sure you want to go back to home?')" 
                  class="home-btn">
                  Back TO Home
                 </a></div>
            <div> <a href="addProduct.php" class="home-btn">
                 New Product
                 </a>
            </div>
        </div>
    
</body>
</html>

<?php
mysqli_close($conn);
?>
