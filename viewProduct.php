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
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No products found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
