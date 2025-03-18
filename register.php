<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Emmanuela Fashion Store</title>
    <link rel="stylesheet" href="styles.css">
    <style> 
          a{
            text-decoration: none;
            margin-left: 760px;
          }
          p{
            margin-left: 700px;
          }
    </style>
</head>
<body>
    <?php include 'header.php'; 
    ?>
    <section id="register-section">
        <h2>Register</h2>
        <form action="register_action.php" method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </section>
    <section id="login-section">
        <p>Already have an account?</p><a href="login.php"   style="font-size: 20px;" ><b>Login</b></a>
    </section>


</body>
</html>
