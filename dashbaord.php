<?php
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex flex-col md:flex-row">
        <aside class="w-full md:w-1/4 bg-indigo-600 text-white h-screen p-6">
            <div class="flex items-center space-x-4 mb-8">
                <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-full w-12 h-12">
                <div>
                    <h3 class="text-lg font-bold">Abdo</h3>
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
                        <p id="views-count" class="text-2xl font-bold text-indigo-600">1234</p>
                    </div>
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Commentaires</h3>
                        <p class="text-2xl font-bold text-indigo-600">567</p>
                    </div>
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Likes</h3>
                        <p id="likes-count" class="text-2xl font-bold text-indigo-600">890</p>
                    </div>
                </div>
            </section>

            <section id="visualization">
                <h2 class="text-xl font-semibold mb-4">Visualisation des données</h2>
                <div class="p-6 bg-white rounded shadow">
                    <p>Graphiques et données en temps réel seront affichés ici.</p>
                </div>
            </section>
        </main>
    </div>
</body>

</html>