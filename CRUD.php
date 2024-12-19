<?php
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$connection = new mysqli('localhost', 'root', '', 'BloggerPress');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    if (!empty($title) && !empty($content)) {
        $stmt = $connection->prepare("INSERT INTO articles (user_id, title, content) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $title, $content);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Title and Content cannot be empty.";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($title) && !empty($content)) {
        $stmt = $connection->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $content, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Title and Content cannot be empty.";
    }
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $connection->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$result = $connection->query("SELECT * FROM articles ORDER BY created_at DESC");
$articles = $result->fetch_all(MYSQLI_ASSOC);

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="flex">
        <aside class="w-1/4 bg-indigo-600 text-white p-6 h-screen">
            <div class="flex items-center space-x-4 mb-8">
                <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-full w-12 h-12">
                <div>
                    <h3 class="text-lg font-bold"><?php echo $name; ?></h3>
                    <p class="text-sm text-indigo-200">Admin</p>
                </div>
            </div>
            <h2 class="text-2xl font-bold mb-8">Dashboard</h2>
            <nav class="space-y-4">
            <a href="dashbaord.php" class="block py-2 px-4 rounded hover:bg-indigo-700">Back To Dashboard</a>
                <a href="CRUD.php" class="block py-2 px-4 rounded hover:bg-indigo-700">Ajouter un article</a>
                <a href="CRUD.php" class="block py-2 px-4 rounded hover:bg-indigo-700">Gestion des articles</a>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <div class="bg-white p-6 rounded shadow mb-6">
                <h2 class="text-xl font-bold mb-4">Add New Article</h2>
                <form method="POST" class="space-y-4">
                    <input type="text" name="title" placeholder="Article Title" class="w-full p-2 border rounded" required>
                    <textarea name="content" rows="4" placeholder="Article Content" class="w-full p-2 border rounded" required></textarea>
                    <button type="submit" name="create" class="bg-indigo-600 text-white px-4 py-2 rounded">Add Article</button>
                </form>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Articles</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="border border-gray-300 p-2">Title</th>
                            <th class="border border-gray-300 p-2">Content</th>
                            <th class="border border-gray-300 p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td class="border border-gray-300 p-2"><?php  echo htmlspecialchars($article['title']); ?></td>
                                <td class="border border-gray-300 p-2"><?php  echo htmlspecialchars($article['content']); ?></td>
                                <td class="border border-gray-300 p-2">
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" class="p-1 border rounded">
                                        <input type="text" name="content" value="<?php echo htmlspecialchars($article['content']); ?>" class="p-1 border rounded">
                                        <button type="submit" name="update" class="bg-blue-500 text-white px-2 py-1 rounded">Update</button>
                                    </form>

                                    <a href="?delete=<?php echo $article['id']; ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure you want to delete this article?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
