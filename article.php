<?php
session_start();
$connection = new mysqli('localhost', 'root', '', 'BloggerPress');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = intval($_GET['id']);

$stmt = $connection->prepare("SELECT articles.title, articles.content, articles.created_at, articles.likes, articles.views, users.username AS author FROM articles JOIN users ON articles.user_id = users.id WHERE articles.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $updateViews = $connection->prepare("UPDATE articles SET views = views + 1 WHERE id = ?");
    $updateViews->bind_param("i", $id);
    $updateViews->execute();
    $updateViews->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'])) {
    $updateLikes = $connection->prepare("UPDATE articles SET likes = likes + 1 WHERE id = ?");
    $updateLikes->bind_param("i", $id);
    $updateLikes->execute();
    $updateLikes->close();
    header("Location: article.php?id=$id");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    $newComment = htmlspecialchars($_POST['comment_text']);
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL; 

    $insertComment = $connection->prepare("INSERT INTO comments (article_id, user_id, content) VALUES (?, ?, ?)");
    $insertComment->bind_param("iis", $id, $user_id, $newComment);
    $insertComment->execute();
    $insertComment->close();
    header("Location: article.php?id=$id");
    exit;
}

$stmt_comments = $connection->prepare("SELECT users.username, comments.content, comments.created_at FROM comments JOIN users ON comments.user_id = users.id WHERE comments.article_id = ? ORDER BY comments.created_at DESC");
$stmt_comments->bind_param("i", $id);
$stmt_comments->execute();
$result_comments = $stmt_comments->get_result();
$comments = $result_comments->fetch_all(MYSQLI_ASSOC);
$stmt_comments->close();

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

    <nav class="bg-indigo-600 text-white p-4 flex justify-between">
        <a href="index.php" class="text-lg font-bold">BloggerPress</a>
    </nav>

    <main class="container mx-auto py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <article class="md:col-span-2 bg-white p-6 rounded shadow">
                <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($article['title']); ?></h1>
                <p class="text-gray-500 text-sm mb-6">By <?php echo htmlspecialchars($article['author']); ?> on <?php echo date("F j, Y", strtotime($article['created_at'])); ?></p>
                <div class="text-gray-800 leading-relaxed mb-4">
                    <?php echo nl2br(htmlspecialchars($article['content'])); ?>
                </div>
            </article>
            <aside class="bg-white p-6 rounded shadow">
                <div class="mb-4">
                    <form method="post">
                        <button type="submit" name="like" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Like (<?php echo $article['likes']; ?>)</button>
                    </form>
                </div>
                <div class="mb-6">
                    <p class="text-gray-500 text-sm">Views: <?php echo $article['views']; ?></p>
                </div>
                <div>
                    <h2 class="text-xl font-bold mb-2">Comments:</h2>
                    <?php if (count($comments) > 0): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="mb-4">
                                <p class="text-sm font-semibold"><?php echo htmlspecialchars($comment['username']); ?> says:</p>
                                <pre class="bg-gray-100 p-4 rounded"><?php echo nl2br(htmlspecialchars($comment['content'])); ?></pre>
                                <p class="text-xs text-gray-500">Posted on <?php echo date("F j, Y", strtotime($comment['created_at'])); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No comments yet. Be the first to comment!</p>
                    <?php endif; ?>
                    <form method="post" class="mt-4">
                        <textarea name="comment_text" class="w-full border rounded p-2" placeholder="Add a comment..." required></textarea>
                        <button type="submit" name="comment" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Submit</button>
                    </form>
                </div>
            </aside>
        </div>
    </main>

    <footer class="bg-indigo-600 text-white text-center py-4">
        <p>&copy; 2024 BloggerPress. All Rights Reserved.</p>
    </footer>

</body>
</html>
