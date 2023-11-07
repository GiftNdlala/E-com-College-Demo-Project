<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Assuming you have a database connection here, replace placeholders
    $servername = "localhost"; // Replace with your database server
    $dbusername = "root"; // Replace with your database username
    $dbpassword = ""; // Replace with your database password
    $dbname = "wizecollection"; // Replace with your database name
    
    // Create a database connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // SQL query to check if the username and password match
    $sql = "SELECT * FROM wizecollection WHERE email = '$username' AND password = '$password'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Authentication successful
        // You can redirect to a success page or set a session variable
        session_start();
        $_SESSION["root"] = $username;
        header("Location: welcome"); // Replace with the URL of your success page
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid username or password.";
    }
    
    $conn->close();
}
?>

<!-- The rest of your HTML code remains the same -->
