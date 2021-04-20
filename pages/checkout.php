<?php
session_start();

include("./pages/db_connect.php");
include("./pages/functions.php");

$sql = "SELECT c.Adress as adress,
                   c.ZipCode as zip,
                   c.FirstName as first,
                   c.Infix as infix,
                   c.LastName as lastname,
                   c.Email as email,
                   c.PhoneNumber as phone,
                   oi.OrderID as orderid
            FROM customer as c, orderitem as oi
            -- INNER JOIN order AS o ON order.ID = o.id
            WHERE orderid = {$_SESSION["OrderID"]}";

$result = mysqli_query($conn, $sql);

$record = mysqli_fetch_assoc($result);
?>

<div class="row">
    <div class="col-2"></div>
    <div class="col-4">
        <form action="./index.php?content=checkout_script" method="post">
            <div class="form-group">
                <label for="exampleInputName">FirstName</label>
                <input type="text" class="form-control" id="Name" name="first" value="<?php echo $record["first"]; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInfix">Infix</label>
                <input type="text" class="form-control" id="exampleInputInfix" name="infix" value="<?php echo $record["infix"]; ?>">
            </div>
            <div>
                <label for="exampleInputLastName">LastName</label>
                <input type="text" class="form-control" id="exampleInputLastName" name="lastname" value="<?php echo $record["lastname"]; ?>">
            </div>
            <div>
                <label for="exampleInputEmail">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo $record["email"]; ?>">
            </div>
            <div>
                <label for="exampleInputPhoneNumber">Phone Number</label>
                <input type="number" class="form-control" id="exampleInputPhoneNumber" name="phone" value="<?php echo $record["phone"]; ?>">
            </div>
            <div>
                <label for="exampleInputAdress">Adress</label>
                <input type="text" class="form-control" id="exampleInputAdress" name="adress" value="<?php echo $record["adress"]; ?>">
            </div>
            <div>
                <label for="exampleInputZip">ZipCode</label>
                <input type="text" class="form-control" id="exampleInputZip" name="zip" value="<?php echo $record["zip"]; ?>">
            </div>
            <div>
                <label>Payment methode</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Payment</option>
                    <option value="1">Creditcard</option>
                    <option value="2">Ideal</option>
                    <option value="3">Paypal</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary userF">checkout</button>
        </form>
    </div>
    <div class="col-4">
        <img src="../img/George.png" class="imgGeorge">
    </div>
</div>