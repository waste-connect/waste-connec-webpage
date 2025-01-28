<?php
include 'config.php';
// Login Logic
if (isset($_POST['login'])) {
    $loginEmail = $_POST['email'];
    $loginPassword = $_POST['password'];

    // Query to check if the user exists
    $sql = "SELECT * FROM `users` WHERE `email` = '$loginEmail'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // User found, fetch user data
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password']; // Get the hashed password from the database

        // Verify the password
        if (password_verify($loginPassword, $hashedPassword)) {
            // Password is correct, start session and redirect or show success message
            session_start();
            $_SESSION['email'] = $loginEmail; // Store user email in session
            echo '<div style="width: 450px;" class="alert transition-all fixed left-50 top-5 bg-white border-l-4 border-red-500 shadow-lg p-4" role="alert">
            <p class="font-bold text-red-700">Login Sucess!</p>
            <p>Redirecting you now....</p>
        </div>';
            // Redirect to another page or dashboard
            header("Location: user.html");
            exit(); // Always exit after header redirection
        } else {
            echo '<div style="width: 450px;" class="alert transition-all fixed left-50 top-5 bg-white border-l-4 border-red-500 shadow-lg p-4" role="alert">
                <p class="font-bold text-red-700">Invalid email or password!</p>
                <p>Redirecting you now....</p>
            </div>';
        }
    } else {
        echo '<div style="width: 450px;" class="alert transition-all fixed left-50 top-5 bg-white border-l-4 border-red-500 shadow-lg p-4" role="alert">
        <p class="font-bold text-red-700">Invalid email or password!</p>
        <p>Redirecting you now....</p>
    </div>';
    }
}

if (isset($_POST['Register'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $phoneno = $_POST['Phone'];
    $address = $_POST['Address'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Check if the email already exists
    $mailql = "SELECT * FROM `users` WHERE email = '$email'";
    $mailres = mysqli_query($conn, $mailql);

    if (mysqli_num_rows($mailres) > 0) {
        // Email already exists
        echo '<div style="width: 450px;" class="alert transition-all fixed left-50 top-5 bg-white border-l-4 border-red-500 shadow-lg p-4" role="alert">
                <p class="font-bold text-red-700">Email Already Exists!</p>
                <p>Redirecting you now....</p>
            </div>';
    } else {
        // Insert new user
        $sql = "INSERT INTO `users`(`name`, `email`, `phone_no`, `password`, `address`) VALUES ('$name','$email','$phoneno','$hashed_password','$address')";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo '<div style="width: 450px;" class="alert transition-all left-50 fixed top-5 bg-white border-l-4 border-green-500 shadow-lg p-4" role="alert">
                    <p class="font-bold text-green-700">Registration Success!</p>
                    <p>Redirecting you now....</p>
                </div>';
        } else {
            echo '<div style="width: 450px;" class="alert transition-all left-50 fixed top-5 bg-white border-l-4 border-red-500 shadow-lg p-4" role="alert">
                    <p class="font-bold text-red-700">Registration Failed!</p>
                    <p>Redirecting you now....</p>
                </div>';
        }
    }
}
?>