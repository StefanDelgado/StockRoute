<?php
session_start();  // Start session to manage user login state

// Database connection
$servername = "localhost";
$username = "root";  // Change this to your MySQL username
$password = "";  // Change this to your MySQL password
$dbname = "your_database_name";  // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if password matches (use password_verify for hashed passwords)
        if (password_verify($password, $user['password'])) {
            // Login successful: set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];  // Store the role in the session

            // Redirect based on user role
            if ($user['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } elseif ($user['role'] == 'owner') {
                header("Location: owner_dashboard.php");
            } elseif ($user['role'] == 'supplier') {
         

