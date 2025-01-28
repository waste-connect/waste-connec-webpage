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
</head>
<body>
    <main class="flex flex-col md:flex-row md:items-center p-2 md:p-0 mt-10 md:mt-0">
        <div class="login_img"></div>
        <div class="flex flex-1 flex-col justify-start items-center">
            <div class="mb-10">
                <img src="/images/waste-connect-logo2.jpeg" style="height: 70px;" class="h-[50px] w-[50px]" alt="">
            </div>
            <form id="loginForm" class="login_form md:w-2/3 flex gap-4 flex-col">
                <div>
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" class="border pl-4 rounded w-full p-4" />
                    <p id="emailError" class="text-red-500 text-sm hidden">Email is required.</p>
                </div>

                <div>
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="e.g. password" class="border pl-4 rounded w-full p-4" />    
                    <p id="passwordError" class="text-red-500 text-sm hidden">Password is required.</p>
                </div>
                <button type="submit" class="bg-green-600 w-full mt-4 text-white rounded-lg p-4">Login</button>
            </form>  
        </div>
    </main>

    <script>
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');

        loginForm.addEventListener('submit', (event) => {
            event.preventDefault();

            // Reset error messages
            emailError.classList.add('hidden');
            passwordError.classList.add('hidden');

            const email = emailInput.value.trim();
            const password = passwordInput.value.trim();
            let isValid = true;

            // Check if email is filled
            if (!email) {
                emailError.classList.remove('hidden');
                isValid = false;
            }

            // Check if password is filled
            if (!password) {
                passwordError.classList.remove('hidden');
                isValid = false;
            }

            // If valid, proceed
            if (isValid) {
                window.location.href = "dashboard.html";
            }
        });
    </script>
</body>
</html>
