<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Donor Registration</title> 
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
                <h1>Donor Registration</h1>
                <center><div id="form">
                    <form action=""method="post">
                    <table>
                        <tr>
                            <td width="200px" height="50px"> Name</td>
                            <td width="200px" height="50px" ><input type="text" name="name" placeholder=" Name"></td> 
                            <td width="200px" height="50px"> Father's Name</td>
                            <td width="200px" height="50px" ><input type="text" name="fname" placeholder=" Father Name"></td> 
                       </tr>
                       <tr>
                            <td width="200px" height="50px"> Address</td>
                            <td width="200px" height="50px" ><textarea name="address"></textarea></td> 
                            <td width="200px" height="50px"> City</td>
                            <td width="200px" height="50px" ><input type="text" name="city" placeholder=" City"></td> 
                       </tr>
                       <tr>
                            <td width="200px" height="50px"> Age</td>
                            <td width="200px" height="50px" ><input type="text" name="age" placeholder=" Age"></td> 
                            <td width="200px" height="50px"> Blood Group</td>
                            <td width="200px" height="50px" >
                                <select name="bgroup">
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                               </select>
                            </td> 
                       </tr>
                       <tr>
                            <td width="200px" height="50px"> E-Mail</td>
                            <td width="200px" height="50px" ><input type="text" name="email" placeholder=" E-Mail"></td> 
                            <td width="200px" height="50px"> Mobile No</td>
                            <td width="200px" height="50px" ><input type="text" name="mno" placeholder=" Mobile No"></td> 
                       </tr>
                       <tr>
                        <div id=save> <td><h2 align="center"> <input type="submit" name="sub" value="Save" ></h2></td> </div>
                        </tr>
                    </table>
                    </form>
                    <?php
                    if(isset($_POST['sub']))
                    {
                      $name=$_POST['name'];
                      $fname=$_POST['fname'];
                      $address=$_POST['address'];
                      $city=$_POST['city'];
                      $age=$_POST['age'];
                      $bgroup=$_POST['bgroup'];
                      $email=$_POST['email'];
                      $mno=$_POST['mno'];

                     $q=$db->prepare("INSERT INTO donor_registration(name,fname,address,city,age,bgroup,email,mno) VALUES(:name,:fname,:address,:city,:age,:bgroup,:email,:mno)");
                    
                     $q->bindValue('name',$name);
                     $q->bindValue('fname',$fname);
                     $q->bindValue('address',$address);
                     $q->bindValue('city',$city);
                     $q->bindValue('age',$age);
                     $q->bindValue('bgroup',$bgroup);
                     $q->bindValue('email',$email);
                     $q->bindValue('mno',$mno);
                     if($q->execute())
                    
                     {
                         echo "<script>alert('Donor Registration Successfull')</script>";
                     }
                     else
                     {
                        echo "<script>alert('Donor Registration Fail')</script>";        
                     }
                    }
                    ?>
               </div></center>
                </div>
                <br>
                <br>
                <center>
                <div id="logout"><h3><p align="center"><a href="logout.php"><font color="black">Logout</font></a></p></h3></div>
            </center>
            <div id="footer"><br><h3 align="center">Copyright@CSTE13th </h3> </div>
            
           </div>  

        </div>
   </body>  
</html>