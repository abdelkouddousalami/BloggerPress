<?php
session_start();
$connection = new mysqli('localhost', 'root', '', 'BloggerPress');


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        die("All fields are required.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $connection->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);

    if ($stmt->execute()) {
        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;

        if ($user['role'] === 'author') {
            header("Location: dashbaord.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'author') {
                header("Location: dashbaord.php");
            } else {
                header("Location: index.php");
            }
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}

if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);

    if (!isset($_SESSION['viewed_articles'])) {
        $_SESSION['viewed_articles'] = [];
    }

    if (!in_array($article_id, $_SESSION['viewed_articles'])) {
        $updateQuery = $connection->prepare("UPDATE articles SET views = views + 1 WHERE id = ?");
        $updateQuery->bind_param('i', $article_id);
        $updateQuery->execute();
        $updateQuery->close();

        $_SESSION['viewed_articles'][] = $article_id;
    }
}

$connection->close();
?>
