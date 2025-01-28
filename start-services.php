<?php
include "config.php";
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Get selected services
    $services = isset($_POST['service']) ? implode(", ", $_POST['service']) : '';

    if (empty($services)) {
        echo "<script>alert('Please select at least one service.');</script>";
    } else {
        $sql = "INSERT INTO `users`(`type`, `address`, `name`, `email`, `phone`, `password`) VALUES ('$services','$address','$name','$email','$phone','$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Registration Successful')</script>";
            echo "<script>window.location.href = './services.php'</script>";
        } else {
            echo "<script>alert('Registration Failed')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/start-service.css">
    <script defer src="/script/start.js"></script>
    <title>Start Services</title>
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

    <form method="POST" id="serviceForm">
        <main class="flex flex-col items-center p-4 mt-10">
            <h1 class="text-2xl font-bold mb-4">Choose Your Waste Solution</h1>
            <p class="text-gray-600 text-sm mb-6">Enter your information to start service or get a quote.</p>

            <div class="flex flex-col w-full max-w-md">
                <label class="flex items-center gap-14 p-4 border border-green-300 bg-[#c8e6c9] rounded-lg mb-4 cursor-pointer service-option" data-service="home">
                    <div class="flex items-center gap-3">
                        <div>
                            <svg width="4em" height="4em" viewBox="0 0 55 49.344" class="pa-4 green-svg"><path d="M46.294,19.122,26.221,5.221a1.761,1.761,0,0,0-1.924,0L4.225,19.122a1.1,1.1,0,0,0-.5.867V44.984A1.321,1.321,0,0,0,5.2,46.128c4.853-.052,20.055.035,20.055.035s15.2-.087,20.055-.035a1.333,1.333,0,0,0,1.473-1.144V19.989A1.077,1.077,0,0,0,46.294,19.122ZM30.919,24.34h9.707V46.111l-9.707.024Zm-15.6,13.693H8.558V32.139h6.76Zm0-7.8H8.558V24.34h6.76Zm8.84,7.8H17.4V32.139h6.76Zm0-7.8H17.4V24.34h6.76Zm1.3-11.093a3.9,3.9,0,1,1,3.9-3.9A3.906,3.906,0,0,1,25.459,19.139Z" transform="translate(2.4 3.182)"></path></svg>
                        </div>
                        <span class="text-2xl">For Your Home</span>
                    </div>
                    <input type="checkbox" name="service[]" value="home" class="service-checkbox" />
                </label>

                <label class="flex items-center p-4 border border-blue-600 rounded-lg cursor-pointer service-option" data-service="business">
                    <div class="flex items-center gap-3">
                        <div>
                            <svg width="4em" height="4em" viewBox="0 0 55 53.926" class="pa-4 blue-svg"><path d="M44.7,40.833V28.512H34.016V49.98h-.807c-9.013,0-18.026-.034-27.039.029A2.414,2.414,0,0,1,3.592,47.4q0-8.326,0-16.652c0-3.068,0-6.136,0-9.292a2.158,2.158,0,0,1-2.429.277,1.99,1.99,0,0,1-1.05-2.462C1.2,16.157,2.323,13.06,3.358,9.934A12.072,12.072,0,0,0,3.6,7.669a11.461,11.461,0,0,1,.411-1.938,6.691,6.691,0,0,1,1.952-.7q21.5-.058,43,0a5.146,5.146,0,0,1,1.652.6,4.032,4.032,0,0,1,.421.222c.093.278.294.57.261.833-.273,2.211.588,4.176,1.29,6.177.731,2.086,1.447,4.178,2.21,6.253a2.023,2.023,0,0,1-.377,2.357,2.137,2.137,0,0,1-2.476.27c-.18-.092-.372-.16-.623-.266v1.058c0,8.33-.023,16.659.023,24.989a2.446,2.446,0,0,1-2.5,2.488c-1.324-.127-2.67-.031-4.085-.068a.977.977,0,0,0-.167-.1c-.007-2.91-.015-5.819.016-8.812A.608.608,0,0,0,44.7,40.833ZM27.356,43.192a2.6,2.6,0,0,0,.029-.278q0-6.948,0-13.9c0-.177-.03-.354-.044-.5H10.207c0,4.927,0,9.814.015,14.817a1.783,1.783,0,0,0,.542.19q7.972.016,15.944,0C26.888,43.52,27.068,43.346,27.356,43.192ZM5.407,15.478c-.258.873-.535,1.741-.769,2.62a7.546,7.546,0,0,0-.466,2.194,2.921,2.921,0,0,0,2.822,2.589,2.888,2.888,0,0,0,3.08-2.436c.085-.448.113-.907.209-1.352.563-2.626,1.139-5.249,1.71-7.871H6.713C6.272,12.626,5.842,13.994,5.407,15.478Zm10-2.371c-.257,1.589-.538,3.174-.763,4.767a11.005,11.005,0,0,0-.2,2.718,2.766,2.766,0,0,0,2.771,2.29,2.859,2.859,0,0,0,2.978-2.222c.183-.951.2-1.935.291-2.9.132-1.364.275-2.728.4-4.093.072-.8.115-1.611.173-2.448h-5.3C15.641,11.821,15.527,12.4,15.408,13.107Zm33.661.7c-.232-.737-.447-1.479-.709-2.206-.06-.168-.275-.4-.422-.4-1.635-.028-3.271-.018-4.981-.018.327,1.52.652,2.961.945,4.408.329,1.627.671,3.254.927,4.893a3.142,3.142,0,0,0,3.508,2.378A3.031,3.031,0,0,0,50.73,19.41C50.2,17.575,49.628,15.754,49.069,13.81ZM29,22.465a2.85,2.85,0,0,0,1.479-2.654c-.021-1.185-.093-2.369-.135-3.554-.053-1.513-.082-3.026-.164-4.537-.01-.185-.284-.506-.441-.51-1.611-.038-3.224-.023-5.041-.023,0,1.349.031,2.645-.008,3.94-.048,1.6-.245,3.2-.211,4.8A2.98,2.98,0,0,0,29,22.465Zm5.139-8.144c.184,1.921.4,3.839.542,5.763a2.938,2.938,0,0,0,3.116,2.8,2.863,2.863,0,0,0,2.808-2.924,36.509,36.509,0,0,0-.548-3.689c-.28-1.694-.578-3.384-.861-5.036H33.9C33.984,12.247,34.061,13.219,34.139,14.321Z" transform="translate(0 3.909)"></path></svg>
                        </div>
                        <span class="text-2xl">For Business & Organizations</span>
                    </div>
                    <input type="checkbox" name="service[]" value="business" class="service-checkbox" />
                </label>
            </div>

            <div class="mt-6 w-full max-w-md">
                <label for="address" class="block text-gray-700 mb-2">Address</label>
                <i class='bx bxs-location-plus'></i>
                <input type="text" id="address" name="address" placeholder="e.g. 123 Main Street, NW, New York" class="border pl-8 rounded w-full p-2" required />
                <label for="name" class="block text-gray-700 mb-2">Name</label>
                <i class='bx bxs-user'></i>
                <input type="text" id="name" name="name" placeholder="e.g. John Doe" class="border pl-8 rounded w-full p-2" required />
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <i class='bx bxs-envelope'></i>
                <input type="email" id="email" name="email" placeholder="e.g. example@gmail.com" class="border pl-8 rounded w-full p-2" required />
                <label for="phone" class="block text-gray-700 mb-2">Phone</label>
                <i class='bx bxs-phone'></i>
                <input type="text" id="phone" name="phone" placeholder="e.g. +234" class="border pl-8 rounded w-full p-2" required />
                <label for="password" class="block text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="e.g. password" class="border pl-8 rounded w-full p-2" required />
                <button name="register" type="submit" class="bg-green-600 w-full mt-4 text-white rounded-lg px-3 p-1">Submit</button>
            </div>
        </main>
    </form>

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
    </script>
</body>
</html>