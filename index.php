<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-lg-3">
            <form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/shose1.img" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Shoes 1</h5>
                        <p class="card-text">99$</p>
                        <button type="submit" class="btn btn-info" name="Add_To_Cart">ADD TO CART </button>
                        <input type="hidden" name="Item_Name" value="Shoes 1">
                        <input type="hidden" name="Price" value="99">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/shose2.img" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Shoes 2</h5>
                        <p class="card-text">999$</p>
                        <button type="submit" class="btn btn-info" name="Add_To_Cart">ADD TO CART </button>
                        <input type="hidden" name="Item_Name" value="Shoes 2">
                        <input type="hidden" name="Price" value="999">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/shose3.img" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Shoes 3</h5>
                        <p class="card-text">9999$</p>
                        <button type="submit" class="btn btn-info" name="Add_To_Cart">ADD TO CART </button>
                        <input type="hidden" name="Item_Name" value="Shoes 3">
                        <input type="hidden" name="Price" value="9999">
                    </div>
                </div>
            </form>
        </div>   
        <div class="col-lg-3">
            <form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/shose4.img" class="card-img-top" >
                    <div class="card-body text-center">
                        <h5 class="card-title">Shoes 4</h5>
                        <p class="card-text">99999$</p>
                        <button type="submit" class="btn btn-info" name="Add_To_Cart">ADD TO CART </button>
                        <input type="hidden" name="Item_Name" value="Shoes 4">
                        <input type="hidden" name="Price" value="99999">
                    </div>
                </div>
            </form>
        </div>         
        </div>
    </div>
</body>
</html>