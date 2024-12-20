<?php
session_start();
$name = $_SESSION['username'];
$email = $_SESSION['email'];

$connection = new mysqli('localhost', 'root', '', 'BloggerPress');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT SUM(views) AS total_views, SUM(likes) AS total_likes, 
                 SUM(LENGTH(commentaire) - LENGTH(REPLACE(commentaire, '\n', '')) + 1) AS total_comments
          FROM articles";
$result = $connection->query($query);
$stats = $result->fetch_assoc();

$views = $stats['total_views'] ?? 0;
$likes = $stats['total_likes'] ?? 0;
$comments = $stats['total_comments'] ?? 0;

$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex flex-col md:flex-row">
        <aside class="w-full md:w-1/4 bg-indigo-600 text-white h-screen p-6">
            <div class="flex items-center space-x-4 mb-8">
                <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-full w-12 h-12">
                <div>
                    <h3 class="text-lg font-bold"><?php echo $name; ?></h3>
                    <p class="text-sm text-indigo-200">Admin</p>
                </div>
            </div>
            <h2 class="text-2xl font-bold mb-8">Dashboard</h2>
            <nav class="space-y-4">
                <a href="#statistics" class="block py-2 px-4 rounded hover:bg-indigo-700">Statistiques</a>
                <a href="CRUD.php" class="block py-2 px-4 rounded hover:bg-indigo-700">Ajouter un article</a>
                <a href="CRUD.php" class="block py-2 px-4 rounded hover:bg-indigo-700">Gestion des articles</a>
                <a href="#visualization" class="block py-2 px-4 rounded hover:bg-indigo-700">Visualisation des données</a>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <section id="statistics" class="mb-12">
                <h2 class="text-xl font-semibold mb-4">Statistiques des articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Vues</h3>
                        <p id="views-count" class="text-2xl font-bold text-indigo-600"><?php echo $views; ?></p>
                    </div>
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Commentaires</h3>
                        <p class="text-2xl font-bold text-indigo-600"><?php echo $comments; ?></p>
                    </div>
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Likes</h3>
                        <p id="likes-count" class="text-2xl font-bold text-indigo-600"><?php echo $likes; ?></p>
                    </div>
                </div>
            </section>

            <section id="visualization" class="mb-12">
                <h2 class="text-xl font-semibold mb-4">Visualisation des données</h2>
                <div class="p-6 bg-white rounded shadow">
                    <canvas id="statsChart" width="400" height="200"></canvas>
                </div>
            </section>
        </main>
    </div>

    <script>
        const data = {
            labels: ['Vues', 'Commentaires', 'Likes'],
            datasets: [{
                label: 'Statistiques des Articles',
                data: [<?php echo $views; ?>, <?php echo $comments; ?>, <?php echo $likes; ?>],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        };

        
        const ctx = document.getElementById('statsChart').getContext('2d');
        const statsChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
