<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Area</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #background-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <video autoplay muted loop id="background-video">
        <source src="images/20422317-hd_1920_1080_25fps.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <nav class="bg-purple-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="flex items-center space-x-3">
                <img src="images/bloglogo-removebg-preview_1.jpg" alt="Logo" class="h-12">
                <span class="text-2xl font-semibold">Community</span>
            </div>
            <ul class="hidden md:flex space-x-6">
                <li><a href="index.php" class="hover:underline">Home</a></li>
                <li><a href="#" class="hover:underline">About</a></li>
                <li><a href="#" class="hover:underline">Contact</a></li>
            </ul>
        </div>
    </nav>

    <main class="flex justify-center items-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8 w-1/3">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center" id="form-title">Sign In</h1>
            <form id="auth-form" action="connect.php" method="post">
                <div class="form-group mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your email" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="w-full bg-purple-800 text-white py-2 rounded-lg hover:bg-purple-900">Sign In</button>
            </form>
            <div class="mt-4 text-center">
                <p class="text-gray-600">Don't have an account? <a href="#" id="toggle-link" onclick="toggleForm()" class="text-purple-800 hover:underline">Sign Up</a></p>
            </div>
        </div>
    </main>

    <script>
        function toggleForm() {
            const formTitle = document.getElementById('form-title');
            const authForm = document.getElementById('auth-form');
            const toggleLink = document.getElementById('toggle-link');

            if (formTitle.textContent === 'Sign In') {
                formTitle.textContent = 'Sign Up';
                authForm.innerHTML = `
                    <div class="form-group mb-4">
                        <label for="username" class="block text-gray-700 font-semibold">Username</label>
                        <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email" class="block text-gray-700 font-semibold">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="block text-gray-700 font-semibold">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="role" class="block text-gray-700 font-semibold">Role</label>
                        <select id="role" name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                            <option value="visitor">Visitor</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-purple-800 text-white py-2 rounded-lg hover:bg-purple-900">Sign Up</button>
                `;
                toggleLink.textContent = 'Sign In';
            } else {
                formTitle.textContent = 'Sign In';
                authForm.innerHTML = `
                    <div class="form-group mb-4">
                        <label for="email" class="block text-gray-700 font-semibold">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="block text-gray-700 font-semibold">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="w-full bg-purple-800 text-white py-2 rounded-lg hover:bg-purple-900">Sign In</button>
                `;
                toggleLink.textContent = 'Sign Up';
            }
        }
    </script>
</body>
</html>
