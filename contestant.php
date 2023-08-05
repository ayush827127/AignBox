<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contestants</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .contestants {
      /* display: inline-block; */
      width: 70vw;
      margin-left: 10%;
    }

    .contestant-card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      text-align: center;
      display: flex;
      margin-bottom: 20px;
    }

    .contestant-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 20% 10px;
    }

    .contestant-image img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    h3 {
      margin: 20px 0;
    }

    p {
      margin: 5px 0;
    }
    .title{
      display: flex;
    }
    .btn{
      margin-left: 46%;
    height: fit-content;
    padding: 15px 30px;
    margin-top: 16px;
    font-size: large;
    font-weight: bolder;
    border: 1px solid black;
    border-radius: 16px;
    }
    .btn:hover{
      cursor: pointer;
      padding: 17px 35px;
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="title" >
     <h1> Contestants List</h1>
     <button onclick="buttonClicked()" class="btn" >fill Form</button>
    </div>
    <div class="contestants">
    </div>
  </div>
  <!-- php -->
  <?php

// Establish a connection to the MySQL database
$servername = "localhost";  
$username = "root";     
$password = "";     
$dbname = "cuteBaby"; 

$conn =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the database
$query = "SELECT full_name, email, image_path FROM participants";
$result = mysqli_query($conn, $query);

$flag = 1;
// Display user information
echo '<div class="contestants">';
while ($row = mysqli_fetch_assoc($result)) {

    echo '<div class="contestant-card">';
    
    echo '<div class="contestant-image">';
    echo '<img src="upload/' . $row['image_path'] . '" />';
    echo '</div>';

    echo '<div>';
    echo '<h3>' . $row['full_name'] . '</h3>';
    echo '<p>' . $row['email'] . '</p>';
    echo '</div>';

    echo '</div>';
    $flag = 0;
}
echo '</div>';

if ($flag== 1) {
  echo "No data Available";
}
// Close the database connection
mysqli_close($conn);
?>

<script>
    function buttonClicked() {
        window.location.href = 'index.html';
    }
  </script>
</body>

</html>