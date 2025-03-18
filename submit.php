<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO comments (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Redirect to contact.php with a success message
        header("Location: contact.php?status=success");
        exit();
    } else {
        // Redirect to contact.php with an error message
        header("Location: contact.php?status=error");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
