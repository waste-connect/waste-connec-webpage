<?php
include 'config.php';
// Login Logic
if (isset($_POST['login'])) {
    $loginEmail = $_POST['login_email'];
    $loginPassword = $_POST['login_password'];

    // Query to check if the user exists
    $sql = "SELECT * FROM `users` WHERE `email` = '$loginEmail' AND `password` = '$loginPassword'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // User found, start session and redirect or show success message
        session_start();
        $_SESSION['email'] = $loginEmail; // Store user email in session
        echo "<script>alert('Login Successful');</script>";
        // Redirect to another page or dashboard
        header("Location: user.html");
    } else {
        echo "<script>alert('Invalid email or password.');</script>";
    }
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Connect | Trash Pickup Services</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="header"></div>
    <header class="flex justify-between items-center p-4 bg-white shadow">
        <div class="flex items-center">
            <span class="ml-2 text-xl font-bold">Waste Connect</span>
        </div>
        <div class="flex items-center">
            <select class="border rounded p-1">
                <option>EN</option>
                <option>ES</option>
            </select>
            
        </div>
    </header>
    <main class="flex flex-col items-center p-2 mt-10">
        <form method="POST">
            <label for="address" class="block text-gray-700 mb-2">Email</label>
            <input type="text" name="login_email" placeholder="example@gmail.com" class="border pl-4 rounded w-full p-2" />
            <label for="address" class="block text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="login_password" placeholder="e.g. password" class="border pl-4 rounded w-full p-2" />
            <button name="login" type="submit" class="bg-green-600 w-full mt-4 text-white rounded-lg px-3 p-1">Login</button>
        </form>
    </main>

    <div id="footer"></div>

    <script>
        // Function to load HTML content
        function loadHTML(elementId, filePath) {
            fetch(filePath)
                .then(response => response.text())
                .then(data => {
                    document.getElementById(elementId).innerHTML = data;
                })
                .catch(error => console.error('Error loading HTML:', error));
        }

        // Load header and footer
        loadHTML('header', 'header.html');
        loadHTML('footer', 'footer.html');



        function toggleMenu() {
            const menu = document.getElementById('menu');
            if (menu.classList.contains('show')) {
                menu.classList.remove('show');
                setTimeout(() => {
                    menu.style.display = 'none'; // Hide after transition
                }, 500); // Match timeout with the CSS transition duration
            } else {
                menu.style.display = 'flex'; // Make it flex before adding class
                setTimeout(() => {
                    menu.classList.add('show');
                }, 10); // Small timeout to allow the display property to take effect
            }
        }

        // Close the menu when clicking outside
        window.onclick = function(event) {
            const menu = document.getElementById('menu');
            if (!event.target.matches('.toggle') && menu.classList.contains('show')) {
                menu.classList.remove('show');
                setTimeout(() => {
                    menu.style.display = 'none'; // Hide after transition
                }, 500); // Match timeout with the CSS transition duration
            }
        };
    </script>

    
</body>
</html>