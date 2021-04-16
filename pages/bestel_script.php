<?php
include("./pages/db_connect.php");
var_dump($_POST);

session_start();

if (!isset($_SESSION["CustomerID"])){
    $sql = "INSERT INTO `customer` (`ID`, `Adress`, `ZipCode`, `FirstName`, `Infix`, `LastName`, `Email`, `PhoneNumber`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
    $result = mysqli_query($conn, $sql);
    if ($result) {  
        $_SESSION['CustomerID'] = mysqli_insert_id($conn);
        // echo "Dit is een customerID" . $_SESSION["CustomerID"];

        $sql = "INSERT INTO `order` (`ID`, `Omschrijving`, `CustomerID`) VALUES (NULL, NULL, '" . $_SESSION["CustomerID"] . "');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['OrderID'] = mysqli_insert_id($conn);
            // echo "Dit is een customerID" . $_SESSION["CustomerID"];
            // echo "Dit is een OrderID" . $_SESSION["OrderID"];
        }   
    }

} else {
    $sql = "INSERT INTO `orderitem` (`ID`, `ProductID`, `OrderID`, `Aantal`) VALUES (NULL, '" . $_POST["ProductID"] . "', '" . $_SESSION["OrderID"] . "', '1');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['ItemID'] = mysqli_insert_id($conn);

        echo "Dit is een ItemID" . $_SESSION["ItemID"] . "<br>";
    echo "Dit is een OrderID" . $_SESSION["OrderID"] . "<br>";
    echo "Dit is een customerID" . $_SESSION["CustomerID"] . "<br>";
    
    }
    echo "Dit is een customerID" . $_SESSION["CustomerID"];
    echo "Dit is een OrderID" . $_SESSION["OrderID"];
    header("Refresh:3; url=./index.php?content=bestel");
}   
// $sql = "SELECT * FROM ``"

?>

Name: <?php echo $_POST["ProductName"]; ?><br>
Price: <?php echo $_POST["ProductPrice"]; ?>

