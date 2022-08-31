<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Exchange Blood Donor Registration</title> 
        <link rel="stylesheet" type="text/css" href="css/s1.css">
        <style type="text/css">
        #form1{
    width: 80%;
    height: 450px;
    background-color: red;
    color: white;
    border-radius: 20px;
}
        </style>
    </head> 
    <body>
        <div id ="full">
            <div id="inner_full"> 
            <div id="header" align="center"><h2><a href="admin-home.php"style="text-decoration:none;color:white;">Cste Blood Bank Management System</a></h2></div>
            <div id="body">
                <?php
                $un=$_SESSION['un'];
                if(!$un)
                {
                    header("Location:index.php");
                
                }
                ?>
                <h2>Exchange Blood Donor Registration</h2>
                <center><div id="form1">
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
                            <td width="200px" height="50px"> E-Mail</td>
                            <td width="200px" height="50px" ><input type="text" name="email" placeholder=" E-Mail"></td> 
                       </tr>
                       <tr>
                            <td width="200px" height="50px"> Mobile No</td>
                            <td width="200px" height="50px" ><input type="text" name="mno" placeholder=" Mobile No"></td> 
                         </tr>
                            <tr>
                       <td width="200px" height="50px">Select Blood Group</td>
                            <td width="200px" height="50px" >
                                <select name="bgroup">
                                    <option>O+</option>
                                    <option>A+</option>
                                    <option>B+</option>
                                    <option>AB+</option>
                                    <option>O-</option>
                                    <option>A-</option>
                                    <option>B-</option>
                                    <option>AB-</option>
                               </select>
                            </td>
                            <td width="200px" height="50px">Exchange Blood Group</td>
                            <td width="200px" height="50px" >
                                <select name="exbgroup">
                                    <option>O+</option>
                                    <option>A+</option>
                                    <option>B+</option>
                                    <option>AB+</option>
                                    <option>O-</option>
                                    <option>A-</option>
                                    <option>B-</option>
                                    <option>AB-</option>
                               </select>
                            </td>
                       </tr>
                       <tr>
                        <div id=save> <td><h2 align="center"><input type="submit" name="sub" value="Save" ></h2></td></div>
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
                      $mno=$_POST['mno'];
                      $email=$_POST['email'];
                      $exbgroup=$_POST['exbgroup'];
                       
                      $q="select * from donor_registration where bgroup ='$bgroup'";
                      $st=$db->query($q);
                      $num_row=$st->fetch();
                       $id=$num_row['id'];
                       $name=$num_row['name'];
                       $b1=$num_row['bgroup'];
                       $mno=$num_row['mno'];
                       $q1="INSERT INTO out_stoke_b (bname,name,mno) value (?,?,?)";
                       $st1=$db->prepare($q1);
                       $st1->execute([$b1,$name,$mno]);

                       $q2="DELETE FROM donor_registration WHERE id='$id'";
                       $st1=$db ->prepare($q2);
                
                       $st1 ->execute();    
                      
                     $q=$db->prepare("INSERT INTO exchange_b (name,fname,address,city,age,bgroup,mno,email,ebgroup)
                      VALUES(:name,:fname,:address,:city,:age,:bgroup,:mno,:email,:ebgroup)");
                     $q->bindValue('name',$name);
                     $q->bindValue('fname',$fname);
                     $q->bindValue('address',$address);
                     $q->bindValue('city',$city);
                     $q->bindValue('age',$age);
                     $q->bindValue('bgroup',$bgroup);
                     $q->bindValue('mno',$mno);
                     $q->bindValue('email',$email);
                     $q->bindValue('ebgroup',$exbgroup);
                     if ($q->execute())

                     {
                         echo "<script>alert('exchange Registration Successfull')</script>";
                     }
                     else
                     {
                        echo "<script>alert('exchane Registration Fail')</script>";        
                     }
                     //exchange info insert end
                    }
                    ?>
               </div></center>
                </div>
                <center>
                <div id="logout"><h3><p align="center"><a href="logout.php"><font color="black">Logout</font></a></p></h3></div>
            </center>
            <div id="footer"><br><h3 align="center">Copyright@CSTE13th </h3> </div>
           </div>
        </div>
   </body>  
</html>