<?php
  include("./pages/db_connect.php");
  include("./pages/functions.php");

  $firstname = sanitize($_POST["first"]);
  $infix = sanitize($_POST["infix"]);      
  $lastname = sanitize($_POST["lastname"]);
  $email = sanitize($_POST["email"]);
  $phone = sanitize($_POST["phone"]);
  $adress = sanitize($_POST["adress"]);
  $zip = sanitize($_POST["zip"]);

  $sql = "UPDATE `customer` 
          SET `FirstName` = '$firstname',
              `Infix` = '$infix',
              `LastName` = '$lastname',
              `Email` = '$email',
              `PhoneNumber` = $phone,
              `Adress` = '$adress',
              `ZipCode` = '$zip'
          WHERE `ID` = {$_SESSION["CustomerID"]}";

mysqli_query($conn, $sql);

header("Refresh:0; url=./index.php?content=bestel");
?>