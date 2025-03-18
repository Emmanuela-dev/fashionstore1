<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Comments - Emmanuela Fashion Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section id="comments-section">
        <h2>Customer Comments</h2>
        <div class="comments-list">
            <?php
            include 'config.php';

            $result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='comment-item'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['message']) . "</p>";
                    echo "<small>Posted on: " . $row['created_at'] . "</small>";
                    echo "</div>";
                }
            } else {
                echo "<p>No comments found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
