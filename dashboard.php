<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="index.css">
    <style>
        /* General Page Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
        }

        h1 {
         
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 24px;
        }

        h2 {
            color: #444;
            margin-top: 20px;
            font-size: 22px;
        }

        p {
            max-width: 80%;
            margin: 10px auto;
            color: #666;
            line-height: 1.6;
            font-size: 18px;
        }

        /* Dashboard Container */
        .dashboard-container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        
        

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                width: 90%;
            }

            h1 {
                font-size: 20px;
                padding: 10px;
            }

            h2 {
                font-size: 20px;
            }

            p {
                font-size: 16px;
                max-width: 95%;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome to your Dashboard, <?php echo htmlspecialchars($_SESSION['firstname']); ?>!</h1>

    <div class="dashboard-container">
        <h2>About Us</h2>
        <p>Welcome to Emmanuela Fashion Store! We are your one-stop shop for ladies' clothes, shoes, bags, and cosmetics in Siaya Town.</p>
        <p>Our mission is to provide high-quality products at affordable prices, ensuring that you always look and feel your best.</p>
        <p>Whether you're shopping for a special occasion or everyday essentials, we have something for everyone.</p>
        <p>Thank you for choosing Emmanuela Fashion Store!</p>

      
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
