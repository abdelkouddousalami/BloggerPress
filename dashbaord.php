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
            <h2 class="text-2xl font-bold mb-8">Dashboard</h2>
            <nav class="space-y-4">
                <a href="#statistics" class="block py-2 px-4 rounded hover:bg-indigo-700">Statistiques</a>
                <a href="#manage-articles" class="block py-2 px-4 rounded hover:bg-indigo-700">Gestion des articles</a>
                <a href="#visualization" class="block py-2 px-4 rounded hover:bg-indigo-700">Visualisation des données</a>
            </nav>
        </aside>
        <main class="flex-1 p-6">
            <section id="statistics" class="mb-12">
                <h2 class="text-xl font-semibold mb-4">Statistiques des articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Vues</h3>
                        <p class="text-2xl font-bold text-indigo-600">1,234</p>
                    </div>
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Commentaires</h3>
                        <p class="text-2xl font-bold text-indigo-600">567</p>
                    </div>
                    <div class="p-4 bg-white rounded shadow">
                        <h3 class="text-lg font-medium">Likes</h3>
                        <p class="text-2xl font-bold text-indigo-600">890</p>
                    </div>
                </div>
            </section>
            <section id="manage-articles" class="mb-12">
                <h2 class="text-xl font-semibold mb-4">Gestion des articles</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded shadow">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-2">Titre</th>
                                <th class="px-4 py-2">Statut</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="px-4 py-2">Article 1</td>
                                <td class="px-4 py-2">Publié</td>
                                <td class="px-4 py-2">
                                    <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">Modifier</button>
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-4 py-2">Article 2</td>
                                <td class="px-4 py-2">Brouillon</td>
                                <td class="px-4 py-2">
                                    <button class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">Modifier</button>
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
