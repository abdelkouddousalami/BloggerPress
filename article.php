<?php
$connection = new mysqli('localhost', 'root', '', 'BloggerPress');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = intval($_GET['id']);
$stmt = $connection->prepare("SELECT articles.title, articles.content, articles.created_at, users.username AS author FROM articles JOIN users ON articles.user_id = users.id WHERE articles.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <nav class="bg-indigo-600 text-white p-4 flex justify-between">
        <a href="index.php" class="text-lg font-bold">BloggerPress</a>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto py-6">
        <article class="bg-white p-6 rounded shadow">
            <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($article['title']); ?></h1>
            <p class="text-gray-500 text-sm mb-6">By <?php echo htmlspecialchars($article['author']); ?> on <?php echo date("F j, Y", strtotime($article['created_at'])); ?></p>
            <div class="text-gray-800 leading-relaxed">
                <?php echo nl2br(htmlspecialchars($article['content'])); ?>
            </div>
        </article>
    </main>

    <!-- Footer -->
    <footer class="bg-indigo-600 text-white text-center py-4">
        <p>&copy; 2024 BloggerPress. All Rights Reserved.</p>
    </footer>

</body>
</html>
