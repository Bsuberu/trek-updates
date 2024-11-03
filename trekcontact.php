<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; // If you have a password, enter it here
$dbname = "trek";

// Create connection
$conn = mysqli_connect ($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS enquiry (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    sname VARCHAR(30) NOT NULL,
    email VARCHAR(50)NOT NULL
)";

if (mysqli_query($conn, $sql)){
    echo "table created successfully";
} else{
    echo "unable to create table";

};


    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $sname = mysqli_real_escape_string($conn, $_REQUEST['sname']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    

    // Insert data into the database
    $sql = "INSERT INTO enquiry (fname, sname, email) VALUES ('$fname', '$sname', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


// Close the connection
$conn->close();
?>