<?php

include("./pages/db_connect.php");
include("./pages/functions.php");

session_start();

// $sql = "SELECT product.Name as name, product.Price as price, orderitem.Aantal as amount, product.img as image, order.ID as orderid, 
//                order.CustomerID as customerid
//         FROM product, orderitem, order
//         WHERE orderid = {$_SESSION["OrderID"]} AND customerid = {$_SESSION["CustomerID"]}";
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
                <td> " . $sqlArr["image"] . "</td>
              </tr>";
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
          <th scope="col">Image</th>
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
  </div>
</div>

<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <a class="btn btn-dark continue" href="index.php?content=checkout" role="button">Checkout</a>
  </div>
</div>