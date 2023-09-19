<?php
// Database connection settings
$host = '47.245.98.49';
$username = 'new_username';
$password = 'dc@ashu12AS';
$database = 'mydb';

// Create a connection to the database

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO users (name, email,password) VALUES ('$name', '$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the database connection
// $stmt->close();
$conn->close();

?>

