<?php
session_start();
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $connection = new mysqli('localhost', 'root', '', 'BloggerPress');

    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    } else {
        $stmt = $connection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header("Location: admin.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }

    $connection->close();
} else {
    die("Please fill in all the fields.");
}
?>
