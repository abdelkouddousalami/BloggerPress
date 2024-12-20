<?php
$connection = new mysqli('localhost', 'root', '', 'BloggerPress');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$result = $connection->query("SELECT articles.id, articles.title, articles.content, users.username AS author FROM articles JOIN users ON articles.user_id = users.id ORDER BY articles.created_at DESC");
$articles = $result->fetch_all(MYSQLI_ASSOC);

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloggerPress</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="images/bloglogo-removebg-preview_1.jpg" alt="Logo" class="h-12 w-12">
                <span class="text-2xl font-semibold text-blue-600">BloggerPress</span>
            </div>
            <ul class="hidden md:flex space-x-6 text-gray-700">
                <li><a href="index.php" class="hover:text-blue-600">Home</a></li>
                <li><a href="#" class="hover:text-blue-600">About</a></li>
                <li><a href="#" class="hover:text-blue-600">Contact</a></li>
            </ul>
            <a href="sign.php" class="bg-blue-600 text-white py-2 px-4 rounded-md shadow hover:bg-blue-700">Author Area</a>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-blue-600 to-blue-400 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <a href="admin.php">
                <h1 class="text-5xl font-bold mb-4">BloggerPress</h1>
            </a>
            <p class="text-lg">Your gateway to sharing stories, ideas, and creativity. Start blogging today with our simple, intuitive platform that puts you in control of your voice.</p>
            <div class="mt-6 flex justify-center space-x-4">
                <a href="sign.php" class="bg-white text-blue-600 font-medium py-2 px-6 rounded-md hover:bg-gray-100">Start Writing</a>
                <a href="login.php" class="bg-blue-700 font-medium py-2 px-6 rounded-md hover:bg-blue-800">Join Our Community</a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Latest Blogs</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($articles as $article): ?>
                <div class="bg-white rounded shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2 text-indigo-600 hover:underline cursor-pointer">
                            <?php echo htmlspecialchars($article['title']); ?>
                        </h2>
                        <p class="text-gray-700 mb-4">
                            <?php echo substr(htmlspecialchars($article['content']), 0, 100) . '...'; ?>
                        </p>
                        <p class="text-sm text-gray-500 mb-4">Written by: <?php echo htmlspecialchars($article['author']); ?></p>
                        <a href="article.php?id=<?php echo $article['id']; ?>" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 BloggerPress. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
