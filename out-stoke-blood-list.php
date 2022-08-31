<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Out Stoke Blood List</title> 
        <link rel="stylesheet" type="text/css" href="css/s1.css">
        <style type="text/css">
            td{
                width:200px;
                height:40px;
            }
            </style>
    </head> 
    <body>
        <div id ="full">
            <div id="inner_full"> 
            <div id="header" align="center"><h2><a href="admin-home.php"style="text-decoration:none;color:white;">Cste Blood Bank Management System</a></h2></div>
            <div id="body">
                <br>
                <?php
                $un=$_SESSION['un'];
                if(!$un)
                {
                    header("Location:index.php");
                
                }
                ?>
                <h1>Out Stock  Blood List</h1>
                <center><div id="form">
                    <table>
                        <tr>
                            <td><center><b><font color="blue">Name</font></b></center></td>
                         <td><center><b><font color="blue">Mobile No</font></b></center></td>
                            <td><center><b><font color="blue">Blood Group</font></b></center></td>
                            
                        </tr>
                        <?php
                        $q=$db->query("SELECT * FROM out_stoke_b");
                        while($r1=$q->fetch(PDO::FETCH_OBJ))
                        {
                            ?>
                          <tr>
                            <td><center><?=$r1->name; ?></center></td>
                            <td><center><?=$r1->mno; ?></center></td>
                            <td><center><?=$r1->bname; ?></center></td>
                            
                        </tr>
                            <?php


                        }
                        ?>
                        
                    </table>
                   
               </div></center>
                </div> 
                <br>
                <center>
                <div id="logout"><h3><p align="center"><a href="logout.php"><font color="black">Logout</font></a></p></h3></div>
            </center>

            <div id="footer"><br><h3 align="center">Copyright@CSTE13th </h3> </div> 
           </div>  

        </div>
   </body>  
</html>