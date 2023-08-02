<?php
// Check if the request contains the transcript parameter
if (isset($_POST['transcript'])) {
    // Get the transcript from the POST request
    $transcript = $_POST['transcript'];

    // Database credentials
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'speech_to_text';

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert the transcript into the table
    $sql = "INSERT INTO speech_data (transcript) VALUES ('$transcript')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Transcript inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
