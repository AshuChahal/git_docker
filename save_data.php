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

// Retrieve data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    // Data inserted successfully, redirect to another page
    header("Location: index.html");
    exit(); // Make sure to exit the script after the redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>


