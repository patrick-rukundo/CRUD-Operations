<?php
include 'connect.php';

// Check if ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare statement for safety
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully'); window.location.href='viewProduct.php';</script>";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No product ID provided";
}
?>
