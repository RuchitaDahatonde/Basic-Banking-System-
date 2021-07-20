<?php
   $insert=false;
   if(isset($_POST['Sr_no']))
   {


            $server="localhost";
            $username="root";
            $password="";

            $con=mysqli_connect($server, $username, $password);

   if(!$con)
            {
                die("connection to this database failed due to". mysqli_connect_error());
            }

   //echo"success connecting to the db";

   $Sr_no=$_POST['Sr_no'];
   $Name=$_POST['Name'];
   $Email=$_POST['Email'];
   $Current_Balance=$_POST['Current_Balance'];
   $sql="INSERT INTO `sparks_bank`.`customer` (`Sr.no`, `Name`, `Email`, `Current_Balance`) VALUES ('$Sr_no', '$Name', '$Email', '$Current_Balance');";
   
   //echo $sql;

   if($con->query($sql)==true){
       //echo"successfully inserted";
       $insert=true;
   }
   else{
       echo"ERROR:sql<br> $con->error";

   }
   $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome to Travel form</title>
    <link rel="stylesheet" href="./customer.css">
</head>

<body>
    <div class="container">
        <h3>Welcome to Customer Page</h3>
        <p>Enter your details and submit this form to confirm your details</p>
        </br>
        </br>
        
        <?php
       
       if($insert==true){
        echo "<p class='submitMsg'>Thank you for submitting your info</p>" ;
        }
        ?>
        <!--<script>
            confirm("customer has been added");
        </script>-->

        <form action="customer.php" method="post">
            <input type="number" name="Sr_no" id="Sr_no" placeholder="Enter your Sr_no">
            <input type="text" name="Name" id="Name" placeholder="Enter your Name">
            <input type="email" name="Email" id="Email" placeholder="Enter your Email">
            <input type="number" name="Current_Balance" id="Current_Balance" placeholder="Enter your Current_Balance">
            </br>
            <button class="btn">Submit</button>
            <!--<button class="btn">Reset</button>-->           
        </form>
        
        
    </div>
    <script src="./index.js"></script>

</body>

</html>
