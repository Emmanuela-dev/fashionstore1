<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fashion_store');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize cart items
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Fetch product details for items in the cart
if (!empty($cartItems)) {
    $productIDs = implode(',', array_keys($cartItems)); // Create a comma-separated list of product IDs
    $sql = "SELECT * FROM Products WHERE ProductID IN ($productIDs)";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }
}

// Handle item removal
if (isset($_GET['remove'])) {
    $productID = $_GET['remove'];
    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]); // Remove item from session cart
        header('Location: cart.php'); // Redirect to update the cart display
        exit();
    }
}

// Handle quantity updates
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_quantity'])) {
    foreach ($_POST['quantity'] as $productID => $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$productID]); // Remove item if quantity is set to 0
        } else {
            $_SESSION['cart'][$productID] = $quantity; // Update quantity
        }
    }
    header('Location: cart.php'); // Redirect to refresh the cart
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>


table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
}

table th, table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

table th {
  background-color: #f2f2f2;
}

.cart-summary {
  text-align: right;
  margin-top: 20px;
}

.cart-summary h3 {
  font-size: 20px;
  margin-bottom: 10px;
}

button, .remove-item {
  background: #007bff;
  color: white;
  border: none;
  padding: 8px 12px;
  text-decoration: none;
  border-radius: 5px;
  cursor: pointer;
}

.remove-item {
  background: #ff0000;
}

button a {
  color: white;
}
</style>
<body>
    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <main>
        <h1>Your Shopping Cart</h1>
        <?php if (!empty($cartItems) && isset($result) && $result->num_rows > 0): ?>
            <form method="POST" action="">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0; // Initialize total cost
                        while ($row = $result->fetch_assoc()):
                            $productID = $row['ProductID'];
                            $quantity = $cartItems[$productID];
                            $subtotal = $row['Price'] * $quantity;
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td>KSh <?php echo number_format($row['Price'], 2); ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $productID; ?>]" value="<?php echo $quantity; ?>" min="1">
                                </td>
                                <td>KSh <?php echo number_format($subtotal, 2); ?></td>
                                <td>
                                    <a href="cart.php?remove=<?php echo $productID; ?>" class="remove-item">Remove</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="cart-summary">
                    <h3>Total: KSh <?php echo number_format($total, 2); ?></h3>
                    <button type="submit" name="update_quantity">Update Quantities</button>
                    <button class="checkout-btn"><a href="checkout.php">Checkout</a></button>
                </div>
            </form>
        <?php else: ?>
            <p>Your cart is empty. <a href="index.php">Shop now!</a></p>
        <?php endif; ?>
    </main>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
