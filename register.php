<?php
// Establish a connection to the MySQL database
$servername = "localhost";   // Replace with your server name
$username = "root";     // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "cuteBaby";  // Replace with your database name

$conn =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Failed.";
}
else{

// Gather data from the form
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$imageName = $_FILES['uploadFile']['name'];


 $query = "INSERT INTO participants (full_name, email, image_path) VALUES ('$fullName', '$email', '$imageName')";

 $query_run = mysqli_query($conn,$query);

 $folderPath = 'upload';

// Check if the folder exists
if (!file_exists($folderPath)) {
    // Create the folder
    mkdir($folderPath, 0777, true);
} 

 if ($query_run) {
    move_uploaded_file($_FILES["uploadFile"]["tmp_name"], "upload/".$_FILES["uploadFile"]["name"]);
    header('Location: index.html');
    exit();
 } else {
    echo "Data not inserted";
 }
 
}

?>