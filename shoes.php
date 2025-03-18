<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes - Emmanuela Fashion Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section id="shoes-section">
        <h2>Shoes</h2>
        <div class="products-grid">
            <?php
            $result = $conn->query("SELECT * FROM Products WHERE Category='Shoes'");

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

