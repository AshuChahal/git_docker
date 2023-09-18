<?php
// Database connection settings
$host = '47.245.98.49';
$username = 'new_username';
$password = 'dc@ashu12AS';
$database = 'mydb';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form and sanitize
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate and sanitize inputs (example)
$name = filter_var($name, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Hash the password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the database using prepared statements
$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $passwordHash);

if ($stmt->execute()) {
    // Data inserted successfully, redirect to another page
    header("Location: index.html");
    exit(); // Make sure to exit the script after the redirection
} else {
    // Log the error and display a user-friendly message
    error_log("Error: " . $sql . "\n" . $stmt->error, 0); // Log the error
    echo "Error: An error occurred while processing your request. Please try again later.";
}

// Close the database connection
$stmt->close();
$conn->close();



