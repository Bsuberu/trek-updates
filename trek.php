<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "trek";

//database connection
$connect = mysqli_connect($server, $user, $password, $database);

if(!$connect){
    die("unable to connect to database" . mysqli_connect_error($connect));
}

//create table
$sq = "CREATE TABLE IF NOT EXISTS formdata (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL)";

    if (mysqli_query($connect, $sq)){
        echo "table created successfully";
    } else{
        echo "unable to create table";

    };

    $name = mysqli_real_escape_string($connect, $_REQUEST['name']);
    $email = mysqli_real_escape_string($connect, $_REQUEST['email']);

    // Insert form data into database
    $sq2 = "INSERT INTO formdata (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($connect, $sq2)) {
        echo "<br><h2>Form Submitted</h2><br>";
    } else {
        echo "Unable to submit form: " . mysqli_error($connect);
    }
// } else {
//     echo "Please fill out the form completely.";
// }

// Close the connection
$connect->close();

?>
