<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Admin Login</title> 
        <link rel="stylesheet" type="text/css" href="css/s1.css">
    </head> 
    <body>
        <div id ="full">
            <div id="inner_full"> 
            <div id="header" align="center"><h2><a href="admin-home.php"style="text-decoration:none;color:white;">Nstu Blood Bank Management System</a></h2></div>
            <div id="body">
                <br>
                <?php
                $un=$_SESSION['un'];
                if(!$un)
                {
                    header("Location:index.php");
                
                }
                ?>
                <h1>Welcome Admin</h1><br><br>
                 <ul>
                     <li><a href="donor-red.php">Donor Registration</a></li>
                     <li><a href="donor-list.php">Donor List</a></li>
                     <li><a href="stoke-blood-list.php">Stoke Blood List</a></li>
                 </ul><br><br><br><br>
                 <center><ul>
                     <li><a href="out-stoke-blood-list.php">Out Stoke Blood List</a></li>
                     <li><a href="exchang-blood-list.php">Exchange Blood Registration</a></li>
                     <li><a href="exchang-blood-list1.php">Exchange Blood list1</a></li>
                 </ul></center>
                </div>
                <center>
                <div id="logout"><h3><p align="center"><a href="logout.php"><font color="black">Logout</font></a></p></h3></div>
            </center>
<br>
<br>
<br>
<br>
            <div id="footer"><br><h3 align="center">Copyright@CSTE13th </h3> </div>
              
           </div>  

        </div>
   </body>  
</html>