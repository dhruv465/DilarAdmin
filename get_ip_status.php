<?php
// Database connection parameters
$host = '156.67.222.1';
$username = 'u443752012_niriadmin';
$password = 'Niriadmin@2023';
$database = 'u443752012_niridb';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    http_response_code(500); // Internal Server Error
    exit('Error connecting to the database');
}

// Query to get the IP status
$sql = "SELECT IP_Status FROM Users LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the IP status from the result
    $row = mysqli_fetch_assoc($result);
    $ipStatus = $row['IP_Status'];
    
    // Send the IP status as a response
    echo $ipStatus;
} else {
    http_response_code(404); // Not Found
    echo 'IP Status not found';
}

// Close the connection
mysqli_close($conn);
?>
