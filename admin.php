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
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-sm w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-32 flex items-center justify-center">
            <div class="h-24 w-24 bg-white border-4 border-white rounded-full overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/150" alt="Profile Image" class="object-cover w-full h-full">
            </div>
        </div>
        <div class="p-6">
            <h2 class="text-center text-2xl font-semibold text-gray-800"><?php echo "$name";?></h2>
            <p class="text-center text-gray-600">Full Stack Developer</p>

            <div class="mt-6">
                <p class="text-gray-700 text-sm">Email: <span class="font-medium"><?php echo "$email";?></span></p>
                <p class="text-gray-700 text-sm">Phone: <span class="font-medium">0600000</span></p>
                <p class="text-gray-700 text-sm">Location: <span class="font-medium">Nador</span></p>
            </div>

            <div class="mt-6 flex justify-center">
                <a href="dashbaord.php" class="px-4 py-2 bg-indigo-500 text-white font-semibold rounded hover:bg-indigo-600 transition duration-200">
                    Access Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>
