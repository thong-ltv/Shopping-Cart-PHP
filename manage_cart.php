<?php

session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['Add_To_Cart']))
        {
            if(isset($_SESSION['cart']))
            {
                $myItem = array_column($_SESSION['cart'], 'Item_Name');
                if(in_array($_POST['Item_Name'], $myItem)){
                    echo "<script>
                        alert('Iteam Already Added');
                        window.location.href='index.php';
                        </script>";
                }
                else
                {
                    $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                        alert('Iteam Added');
                        window.location.href='index.php';
                        </script>";
                }
                
            }
            else
            {
                $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                        alert('Iteam Added');
                        window.location.href='index.php';
                        </script>";
            }
        }
        if(isset($_POST['Remove']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['Item_Name'] == $_POST['Item_Remove'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo
                    "
                        <script>
                            alert('Item Removed');
                            window.location.href = 'mycart.php';
                        </script>
                    ";
                }
            }
        }
    }

?>