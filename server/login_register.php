<?php
include 'config.php';

if (isset($_POST['Login'])) {
    // Handle login logic here
}

if (isset($_POST['Register'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $phoneno = $_POST['Phone'];
    $address = $_POST['Address'];

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
        $sql = "INSERT INTO `users`(`name`, `email`, `phone_no`, `password`, `address`) VALUES ('$name','$email','$phoneno','$password','$address')";
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