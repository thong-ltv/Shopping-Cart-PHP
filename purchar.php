<?php

session_start();
$con = mysqli_connect("localhost","root","","belle");

if(mysqli_connect_errno())
{
    echo
         "
        <script>
            alert('No connect database!!!');
            window.location.href = 'mycart.php';
        </script>
        ";
    exit();
}

if(isset($_SERVER['REQUEST_METHOD']) ==  "POST")
{
    if(isset($_POST['purchar']))
    {
       $query1 = "INSERT INTO `order_manager`(`FullName`, `Phone_No`, `Address`, `Pay_Mode`) 
                  VALUES ('$_POST[fullname]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";   
        if(mysqli_query($con, $query1))
        {
            $Order_Id = mysqli_insert_id($con);
            $query2 = "INSERT INTO `user_orders`(`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($con, $query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "isii", $Order_Id, $Item_Name, $Price, $Quantity);
                foreach($_SESSION['cart'] as $key => $value)
                {
                    $Item_Name = $value['Item_Name'];
                    $Price = $value['Price'];
                    $Quantity = $value['Quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo
                    "
                <script>
                    alert('Order Placed !!!');
                    window.location.href = 'index.php';
                </script>
                ";

            }
            else{
                echo
                    "
                <script>
                    alert('No insert query2 !!!');
                    window.location.href = 'mycart.php';
                </script>
                ";
            }

        }else{
            echo
            "
           <script>
               alert('No insert query1 !!!');
               window.location.href = 'mycart.php';
           </script>
           ";
        }  
    }
}

?>