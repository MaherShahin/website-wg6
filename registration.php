<?php
// Connect to the database
$host = "sql7.freemysqlhosting.net";
$user = "sql7587471";
$password = "Pskf2GAHbr";
$database = "sql7587471";

$conn = mysqli_connect($host, $user, $password, $database);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Extract the form data
  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
  $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);

  // Validate the form data
  if (!$firstName || !$lastName) {
    // Return an error if the first or last name is missing
    $error = "First and last name are required";
  } else {
    // Insert the player into the database
    $sql = "INSERT INTO players (first_name, last_name, nickname, phone_number) VALUES ('$firstName', '$lastName', '$nickname', '$phoneNumber')";
    mysqli_query($conn, $sql);
  }
}

// Close the connection
mysqli_close($conn);

// redirect to the index page
header('Location: index.html');
exit;
?>