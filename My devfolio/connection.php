<?php

$NAME = $_POST['NAME'];
$EMAIL = $_POST['EMAIL'];
$SUBJECT= $_POST['SUBJECT'];
$MESSAGE = $_POST['MESSAGE'];


$host = "localhost";
$dbname = "application";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
               username: $username,
               password: $password,
               database: $dbname);

if (mysqli_connect_error ()) {
    die("connection error:"  . mysqli_connect_error());
}
$sql = "INSERT INTO websites (NAME,EMAIL,SUBJECT, MESSAGE)
VALUE ( ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
   die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss",
                       $NAME,
                      $EMAIL,
                    $SUBJECT,
                     $MESSAGE);

mysqli_stmt_execute($stmt);


echo "Record saved";

