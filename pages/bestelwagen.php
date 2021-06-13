<?php

include("./pages/db_connect.php");
include("./pages/functions.php");

$sql = "SELECT
          p.img AS image,
          p.Name AS name, 
          p.Price AS price, 
          oi.Aantal AS amount
        FROM orderitem AS oi 
        INNER JOIN product AS p ON oi.ProductId = p.ID
        WHERE oi.OrderId = {$_SESSION["OrderID"]}";
// echo $sql;
$result = mysqli_query($conn, $sql);
//  var_dump(mysqli_error($conn));exit;
$tableStr = "";
while ($sqlArr = mysqli_fetch_assoc($result)) {
  $tableStr .= "<tr>
                <td> " . $sqlArr["name"] . "</td>
                <td> €" . $sqlArr["price"] . "</td>
                <td> " . $sqlArr["amount"] . "</td>
              </tr>";
}

// $sql1 = "SELECT orderitem.sum(price) as total 
//          FROM product, order, orderitem
//          Where orderid = {$_SESSION["OrderID"]}"

// $sql1 = "SELECT order.id, SUM(product.price) as total 
//          FROM product, order, orderitem
//          WHERE orderitem.OrderID = {$_SESSION["OrderID"]}
//          GROUP BY order.id";
//          var_dump($sql1);

// $sql1 = "SELECT `order`.`ID`, SUM(`product`.`Price`) as total 
//           FROM `product`, `order`, `orderitem`
//           WHERE `orderitem`.`OrderID` = {$_SESSION["OrderID"]}
//           GROUP BY `order`.`ID`";

$sql1 = "SELECT `order`.`ID`, SUM(`product`.`Price`) as total 
         FROM `product`, `order`, `orderitem` 
         WHERE `orderitem`.`OrderID` = `order`.`ID` 
         AND `orderitem`.`ProductID` = `product`.`ID` 
         AND `order`.`ID`= {$_SESSION["OrderID"]} 
         GROUP BY `order`.`ID`";


$result = mysqli_query($conn, $sql1);
$record = mysqli_fetch_assoc($result);

$tableStr1 = $record["total"];
// var_dump(mysqli_fetch_assoc($result));echo $_SESSION["OrderID"]; exit();
// while ($sqlArr1 = mysqli_fetch_assoc($result)) {
// var_dump(mysqli_fetch_assoc($result));

  // $tableStr1 .= "<tr>
  //                <td> " . $sqlArr1["total"] . "</td>
  //                </tr>";

if ($result) {

  while ($record = mysqli_fetch_assoc($result)) {
    var_dump($record);
  }
} else {
  echo "Niet gelukt";
}

?>

<div class="row userform">
  <div class="col-2"></div>
  <div class="col-8">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Productname</th>
          <th scope="col">Productprice</th>
          <th scope="col">Amount</th>
          <!-- <th scope="col">Image</th> -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          echo $tableStr;
          ?>
        </tr>
      </tbody>
    </table>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          echo $tableStr1;
          ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <a class="btn btn-dark continue" href="index.php?content=checkout" role="button">Checkout</a>
  </div>
</div>