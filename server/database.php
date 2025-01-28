<?php
include 'config.php';

// SQL to create table
// $sql = "CREATE TABLE Users (
//     id INT(222) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(222) NOT NULL,
//     email VARCHAR(222) NOT NULL,
//     phone_no VARCHAR(222) NOT NULL,
//     password VARCHAR(222) NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     service VARCHAR(222) NOT NULL,
//     address VARCHAR(222) NOT NULL

// )";

// SQL to create table
// $sql = "CREATE TABLE Admin (
//     id INT(222) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(222) NOT NULL,
//     email VARCHAR(222) NOT NULL,
//     phone_no VARCHAR(222) NOT NULL,
//     password VARCHAR(222) NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";

// // SQL to create table
// $sql = "CREATE TABLE Agent (
//     id INT(222) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(222) NOT NULL,
//     email VARCHAR(222) NOT NULL,
//     phone_no VARCHAR(222) NOT NULL,
//     password VARCHAR(222) NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


?>