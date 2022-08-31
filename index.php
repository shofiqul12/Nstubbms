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
            <div id="header" align="center"><h2>Nstu Blood Bank Management System</h2></div>
            <br>
           <br>
           <br>
           <br>
                
                <form action="" method="post">
            <table align="center">
                <tr>
                    <td width="200px" height="60px"><b>Enter Username</b></td>
                    <td width="200px" height="60px"><b><input type="text" name="un" placeholder="Enter Username" style="width: 180px;height: 30px;border-radius: 10px;"></td>
                </tr> 
                <tr>
                    <td width="200px" height="60px"><b>Enter Password</b></td>
                    <td width="200px" height="60px"><b><input type="text" name="ps" placeholder="Enter Password" style="width: 180px;height: 30px;border-radius:10px;"></td>
                </tr>
                <td align="center"><input type="submit" name="sub" value="Login" style="width: 60px;height: 30px;border-radius:5px;"></td>
                
                <tr>
                </tr>       
                
            </table>
            </form>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <?php
            if(isset($_POST['sub']))
            {
                 $un=$_POST['un'];
                 $ps=$_POST['ps'];
                $q=$db->prepare("SELECT*FROM admin where uname='$un' && pass='$ps'");
                $q->execute();
                $res=$q->fetchAll(PDO::FETCH_OBJ);
                if($res)
                {
                    $_SESSION['un']=$un;
                 header("Location:admin-home.php") ;  
                }
                else
                {
                    echo "<script>alert('Wrong User')</script>";
                }
            }
        ?>

           
          
            <div id="footer"><br><h3 align="center">Copyright@CSTE13th </h3> </div>
           </div>  
        </div>
   </body>  
</html>