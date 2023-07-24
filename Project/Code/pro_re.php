<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $location = $_POST["location"];

    // TODO: Validate and sanitize the data (e.g., check email format, escape input to prevent SQL injection)

    // Connect to the database (replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your database credentials)
    $conn = new mysqli("localhost", "root", "", "rent");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create a SQL query to insert data into the database (replace "users" with your table name)
    $sql = "INSERT INTO users (first_name, last_name, email, password, date_of_birth, gender, location) 
            VALUES ('$first_name', '$last_name', '$email', '$password', '$date_of_birth', '$gender', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>