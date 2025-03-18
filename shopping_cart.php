<?php
session_start();

// Connect to the database
$conn = new mysqli("localhost", "root", "", "fashion_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add to cart functionality
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $productID = $_POST['product_id'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Update quantity if the product already exists in the cart
    if (isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID]++;
    } else {
        $_SESSION['cart'][$productID] = 1; // Add new item to the cart
    }
}

// Fetch products from the database
$sql = "SELECT * FROM Product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emmanuela Fashion Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header Section with Cart Icon -->
    <header>
        <div class="cart-container">
            <a href="cart.php">
                <img src="images/cart-icon.png" alt="Cart" class="cart-icon">
                <span class="cart-count"><?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?></span>
            </a>
        </div>
    </header>

    <!-- Product Display Section -->
    <section id="product-section">
        <h2>Our Products</h2>
        <div class="product-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product-card">
                    <img src="images/<?php echo $row['Image']; ?>" alt="<?php echo $row['Name']; ?>" class="product-image">
                    <h3><?php echo $row['Name']; ?></h3>
                    <p>Price: KSh <?php echo $row['Price']; ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?php echo $row['ProductID']; ?>">
                        <button type="submit" class="add-to-cart-button">Add to Cart</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</body>
</html>
