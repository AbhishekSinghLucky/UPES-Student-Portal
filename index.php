<?php
session_start();
 $_SESSION["login"]=false;
include "connection.php";
?>
<html>
<head>
    <title>Student Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style>
        body{
            width: auto;
            background-position: bottom;
    background-repeat: no-repeat;
        }
        .container{
           margin-top:27px;
            margin-right: 12px;
        }
        .logo{
            text-align: center;
        }    
    </style>
    <body background="upes.jpg">
    <div class="logo">
        <img src="logo.jpg">
        </div>    
    <div class="container">
<!--    <div class="row">-->
                 <div class="panel-body">
    <form action="index.php" method="post">
    <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">SAP-ID </label>
    <div class="col-sm-7">
      <input type="number" class="form-control" placeholder="Enter SAP ID" name="sapid" required>
    </div>
  </div>
                          
    <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" name="password" placeholder="Enter the Password" required>
    </div>
  </div>
 <div class="form-group row">
 <div class="col-sm-3">
  <button  class="btn btn-primary" style="margin-left:188px;" type="submit" name="submit">Submit</button>  
     </div>
        <div class="message"><a href="forgot.php">Forgot Password?</a></div>
        </div>
</form>
</div>
         <div class="col-md-11">
    <h1>UNIVERSITY OF PETROLEUM AND ENERGY STUDIES</h1>   
       </div>
        </div>
   <?php
        if(isset($_POST['submit']))
        {
//          echo "asdfg";die;
          $sapid=$_POST['sapid'];
          $password=$_POST['password'];
          $sql="SELECT * from login where sapid=$sapid";
          $result=mysqli_query($conn,$sql);
          $a=mysqli_num_rows($result);
         if($a==1){
           $sql2="SELECT password from login where sapid=$sapid";
           $result2=mysqli_query($conn,$sql2);
           while($row=$result2->fetch_assoc()){
               $ori_password=$row["password"];
//               echo $ori_password;
//               echo $password;
               if($ori_password==$password){
                    $_SESSION["login"]=true;
                   $_SESSION["sapid"]=$sapid;
                ?>
            <script>window.location.assign("profile.php");</script>
           <?php
               }
               else{
                   echo "<script>alert('Incorrect Password');</script>";
               }
           }
         }
            else{
                echo "<script>alert('SAP ID Does Not Exist');</script>";
            }
              
        }
        ?>     
    </body>
</html>





























