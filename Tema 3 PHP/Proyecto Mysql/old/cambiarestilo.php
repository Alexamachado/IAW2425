<?php
// Start the session
session_start();

// Check if the 'style' is set via a POST request and update the session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $style = $_POST['style'] ?? 'light'; // Default to 'light' if no style is passed

    // Set the session variable based on the selected style
    if ($style == 'dark') {
        $_SESSION['selectedStyle'] = 'templates/dark.css';
    } else {
        $_SESSION['selectedStyle'] = 'templates/light.css';
    }

    // Redirect back to the main page (index.php)
  //  header('Location: index.php');
    exit;
}
