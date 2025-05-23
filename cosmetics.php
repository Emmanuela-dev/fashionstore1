<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetics - Emmanuela Fashion Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $productID = $_POST['product_id'];

    // Initialize the cart session if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the product to the cart or update the quantity
    if (isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID]++;
    } else {
        $_SESSION['cart'][$productID] = 1;
    }

    // Redirect back to the current page
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<body>
    <?php include 'header.php'; ?>

    <section id="cosmetics-section">
        <h2>Cosmetics</h2>
        <div class="products-grid">
            <?php
            $result = $conn->query("SELECT * FROM Products WHERE Category='Cosmetics'");

            while($row = $result->fetch_assoc()) {
                echo "<div class='product-item'>";
                echo "<img src='{$row['Image']}' alt='{$row['Name']}'>";
                echo "<h3>{$row['Name']}</h3>";
                echo "<p>Price: KSh {$row['Price']}</p>";
                echo "<button>Add to Cart</button>";
                echo "</div>";
            }
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
