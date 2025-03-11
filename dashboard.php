<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Get the user role from session
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

    <!-- Display role-based content -->
    <?php if ($role == 'admin'): ?>
        <h3>Admin Dashboard</h3>
        <p>Welcome to the Admin Dashboard. You can manage all system settings here.</p>
        <!-- Add more admin-specific content here -->
        <a href="admin_dashboard.php">Go to Admin Panel</a>

    <?php elseif ($role == 'owner'): ?>
        <h3>Owner Dashboard</h3>
        <p>Welcome to the Owner Dashboard. Manage your company settings here.</p>
        <!-- Add more owner-specific content here -->
        <a href="owner_dashboard.php">Go to Owner Panel</a>

    <?php elseif ($role == 'supplier'): ?>
        <h3>Supplier Dashboard</h3>
        <p>Welcome to the Supplier Dashboard. You can track and manage deliveries here.</p>
        <!-- Add more supplier-specific content here -->
        <a href="supplier_dashboard.php">Go to Supplier Panel</a>

    <?php else: ?>
        <h3>Unknown Role</h3>
        <p>Your role is not recognized. Please contact the system administrator.</p>
    <?php endif; ?>

    <br><br>
    <a href="logout.php">Logout</a>
</body>
</html>
