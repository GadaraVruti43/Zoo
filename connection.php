<?php
// Define connection variables for XAMPP (default)
$servername = "localhost";  // Default for XAMPP
$username = "root";         // Default username for MySQL in XAMPP
$password = "";             // Default password is empty in XAMPP
$dbname = "data";           // Database name ('data')

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data from the POST request
    $visit_date = $_POST['visit_date'];
    $current_tim = $_POST['current_tim'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $phone_number = $_POST['phone_number'];
    $town = $_POST['town'];
    $aadhar = $_POST['aadhar'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO book (visit_date, current_tim, first_name, last_name, adults, children, phone_number, town, aadhar) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the placeholders (s for string, i for integer)
    $stmt->bind_param("ssssiiiss", $visit_date, $current_tim, $first_name, $last_name, $adults, $children, $phone_number, $town, $aadhar);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Booking confirmed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>