<?php
include ("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center boder rounded bg-light my-5">
                <h1>My Cart</h1>
            </div>

            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                        <th scope="col">Serial No.</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php   
                            $total = 0;

                            if(isset($_SESSION['cart']))
                            {
                                foreach($_SESSION['cart'] as $key => $value)
                                {
                                    $sr = $key + 1;
                                    $total = $total + $value['Price'];
                                    echo "
                                        <tr>
                                            <th>$sr</th>
                                            <th>$value[Item_Name]</th>
                                            <th>$value[Price]</th>
                                            <th><input class='text-center' type='number' min='1' max='10' value='$value[Quantity]'/></th>
                                            <th>
                                                <form action='manage_cart.php' method='POST'>
                                                    <button class='btn btn-sm btn-outline-danger' name='Remove'>REMOVE</button>
                                                    <input type='hidden' name='Item_Remove' value='$value[Item_Name]' />
                                                </form>
                                            </th>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-3">
                <div class="boder bg-light rounded p-4">
                    <h4>Total</h4>
                    <h5 class="text-right"><?php echo $total ?></h5>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Cash on Delivery
                        </label>
                    </div>
                    <br>

                    <form action="">
                        <button class="btn btn-primary btn-block">Make Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>