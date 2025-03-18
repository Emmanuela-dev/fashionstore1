<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Emmanuela Fashion Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section id="contact-section">
        <h2>Contact Us</h2>
        <p>If you have any questions, feedback, or inquiries, please feel free to reach out to us. We are here to help!</p>
        
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo "<p class='success-message'>Thank you for your comment! We appreciate your feedback.</p>";
            } else if ($_GET['status'] == 'error') {
                echo "<p class='error-message'>There was an error submitting your comment. Please try again.</p>";
            }
        }
        ?>

        <form action="submit_comment.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
