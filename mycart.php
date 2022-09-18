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
                        <th scope="col">Total</th>
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
                                    echo "
                                        <tr>
                                            <th>$sr</th>
                                            <th>$value[Item_Name]</th>
                                            <th>$value[Price]<input type='hidden' name='Price' value='$value[Price]' class='iprice'/></th>
                                            <th>
                                                <form action='manage_cart.php' method='POST'>
                                                    <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' min='1' max='10' value='$value[Quantity]'/>
                                                    <input type='hidden' name='Item_Remove' value='$value[Item_Name]' />
                                                </form>
                                            </th>
                                            <th class='itotal'></th>
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
                    <h4> Grand Total</h4>
                    <h5 class="text-right" id="gtotal"></h5>
                    <br>
                    
                    <?php
                        if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0))
                        {
                    ?>
                    <form action="purchar.php" method="POST">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone_no" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <br>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Cash on Delivery
                        </label>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" name="purchar">Make Purchase</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

<script>
   
    var gt = 0; 
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal =document.getElementById('gtotal');

    function Subtotal()
    {
        for (let i = 0; i < iprice.length; i++) 
        {

            itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);

            gt += (iprice[i].value) * (iquantity[i].value);
            
        }

        gtotal.innerText = gt;
    }

    Subtotal();

</script>

</body>
</html>