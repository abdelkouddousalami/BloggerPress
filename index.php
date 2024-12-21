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
    <style>
        .animated-button:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-purple-50 text-gray-800">
    <nav class="bg-purple-700 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="images/bloglogo-removebg-preview_1.jpg" alt="Logo" class="h-12 w-12">
                <span class="text-2xl font-semibold text-white">BloggerPress</span>
            </div>
            <button class="md:hidden text-white" id="menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <ul class="hidden md:flex space-x-6 text-white" id="menu">
                <li><a href="index.php" class="hover:underline">Home</a></li>
                <li><a href="#" class="hover:underline">About</a></li>
                <li><a href="#" class="hover:underline">Contact</a></li>
            </ul>
            <a href="sign.php" class="bg-gray-100 text-purple-700 py-2 px-4 rounded-md shadow hover:bg-gray-200 animated-button">Author Area</a>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-purple-500 to-purple-700 text-white mx-auto px-6 py-12 w-4/5 my-6">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-4">Welcome to BloggerPress</h1>
            <p class="text-lg mb-6">Unleash your creativity. Share your stories. Join a community of passionate writers.</p>
            <div class="flex justify-center space-x-4">
                <a href="sign.php" class="bg-white text-purple-700 font-medium py-2 px-6 rounded-md hover:bg-gray-100 animated-button">Start Writing</a>
                <a href="login.php" class="bg-purple-900 text-white font-medium py-2 px-6 rounded-md hover:bg-purple-800 animated-button">Join Us</a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12 w-4/5">
        <h2 class="text-3xl font-semibold text-gray-800 mb-10 text-center">Blogs</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($articles as $article): ?>
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-purple-700 hover:underline">
                            <?php echo htmlspecialchars($article['title']); ?>
                        </h3>
                        <p class="text-gray-700 mb-4">
                            <?php echo substr(htmlspecialchars($article['content']), 0, 100) . '...'; ?>
                        </p>
                        <p class="text-sm text-gray-500 mb-4">Author: <?php echo htmlspecialchars($article['author']); ?></p>
                        <a href="article.php?id=<?php echo $article['id']; ?>" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 animated-button">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 BloggerPress. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
