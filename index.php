<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emmanuela Fashion Store</title>
    <link rel="stylesheet" href="index.css">
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(200, 200, 200, 0.6); 
            color: #333;
        }

        h2 {
            text-align: center;
            color: #444;
        }

        p {
            text-align: center;
            color: #666;
        }

        /* Section Styling */
        #welcome-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styling the welcome text */
        #welcome-section p {
            max-width: 60%;
            text-align: left;
            line-height: 1.5;
        }

        /* Login section */
        #log {
            max-width: 35%;
            margin-left: 20px;
            text-align: center;
            border-left: 2px solid #ddd;
            padding-left: 20px;
        }

        /* Button styling */
        .redirect-button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .redirect-button:hover {
            background-color: #45a049;
        }

        /* Responsive layout for smaller screens */
        @media (max-width: 768px) {
            #welcome-section {
                flex-direction: column;
                text-align: center;
            }

            #log {
                margin-left: 0;
                border-left: none;
                padding-left: 0;
                margin-top: 20px;
            }

            #welcome-section p {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <section id="welcome-section">
        <!-- Welcome message -->
        <div>
            <h2>WELCOME TO EMMANUELA FASHION STORE</h2>
            <p>Your one-stop shop for ladies' clothes, shoes, bags, and cosmetics in Siaya Town. <br>Explore our wide range of products and enjoy shopping with us!</p>
            <a href="login.php" class="redirect-button">Go to Login</a>
        </div>

        <!-- Login section -->
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
