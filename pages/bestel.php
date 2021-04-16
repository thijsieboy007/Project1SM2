<div class="MenuTitle">
    <div class="row">
        <div class="col-12">
            <h5><b>Menu</b></h5>
        </div>
    </div>
</div>
<center>
    <?php
    include("./pages/db_connect.php");


    $sql = "SELECT `ID`, `Name`, `Description`, `Availability`, `Price`, `allergieInfo`, `img`, `CategoryID`, `Plateau` 
        FROM `product`";

    // echo $sql;exit();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="row m-5">
            <div class="col-12 Category"><H5><b>Sushi</b></H5></div>
            </div>
          <div class="row m-5">';
        while ($row = $result->fetch_assoc()) {
            // var_dump($row);
            if ($row["CategoryID"] == 1) {

    ?>

                <div class="col-4">
                    <div class="card my-4">
                        <td> <?php echo '<img src="./img/' . $row['img'] . '" alt="image" id="foodimg">'; ?> </td>
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo  $row["Name"]; ?></b></h5>
                            <p class="card-text" style="min-height:4rem;"><?php echo  $row["Description"]; ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Aantal</b> <?php echo $row["Availability"]; ?></li>
                                <li class="list-group-item"><b>Prijs</b> €<?php echo $row["Price"]; ?></li>
                                <li class="list-group-item"><b>Allergie</b> <?php echo $row["allergieInfo"]; ?></li>
                            </ul>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
        echo '</div>';
    }

    mysqli_data_seek($result, 0);

    if ($result->num_rows > 0) {

        echo '<div class="row m-5">';
        echo '<div class="col-12 Category">';
        echo "<H5><b>Eggs & Sandwiches</b></H5>";
        echo '</div>';
        echo '</div>';


        echo '<div class="row m-5">';
        while ($row = $result->fetch_assoc()) {
            // var_dump($row);

            if ($row["CategoryID"] == 2) {
            ?>

                <div class="col-4">
                    <div class="card my-4">
                        <td> <?php echo '<img src="./img/' . $row['img'] . '" alt="image" id="foodimg">'; ?> </td>
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo  $row["Name"]; ?></b></h5>
                            <p class="card-text" style="min-height:4rem;"><?php echo  $row["Description"]; ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Aantal</b> <?php echo $row["Availability"]; ?></li>
                                <li class="list-group-item"><b>Prijs</b> €<?php echo $row["Price"]; ?></li>
                                <li class="list-group-item"><b>Allergie</b> <?php echo $row["allergieInfo"]; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
        echo '</div>';
    }
    ?>
    <?php
    mysqli_data_seek($result, 0);

    if ($result->num_rows > 0) {

        echo '<div class="row m-5">';
        echo '<div class="col-12 Category
    ">';
        echo "<H5><b>Vegetarian</b></H5>";
        echo '</div>';
        echo '</div>';


        echo '<div class="row m-5">';
        while ($row = $result->fetch_assoc()) {
            // var_dump($row);

            if ($row["CategoryID"] == 3) {
    ?>
                <div class="col-4">
                    <div class="card my-4">
                        <form action="./index.php?content=bestel_script" method="post">
                            <td> <?php echo '<img src="./img/' . $row['img'] . '" alt="image" id="foodimg">'; ?> </td>
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo  $row["Name"]; ?></b></h5>
                                <p class="card-text" style="min-height:4rem;"><?php echo  $row["Description"]; ?></p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Aantal</b> <?php echo $row["Availability"]; ?></li>
                                    <li class="list-group-item"><b>Prijs</b> €<?php echo $row["Price"]; ?></li>
                                    <li class="list-group-item"><b>Allergie</b> <?php echo $row["allergieInfo"]; ?></li>
                                </ul>
                                <input name="ProductName" type="hidden" value="<?php echo  $row["Name"]; ?>" />
                                <input name="_amount" type="hidden" value="2" />
                                <button class="add-button btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
    <?php
            }
        }
        echo '</div>';
    }
    ?>


    </div>
</center>