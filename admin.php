<?php
include "connection.php";
session_start();
$_SESSION["login"]=false;
//if($_SESSION["login"]==false)
//{
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    <style>
        .button1{
            text-align: center;
                margin-top: 143px;
        }
        #btn1{
            min-width:220px;
            min-height: 100px;
            font-size: 25px;
        }
         
    </style>
<body>
    <center><h2 style="color:green"><u>Only Admin access is allowed !!</u></h2></center>
<div class="container">
<!--    <div class="row">-->
    
                 <div class="panel-body">
    <form method="post">
    <div class="form-group row" style="margin-left:191px;">
    <label for="username" class="col-sm-1 col-form-label">Username </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
    </div>
  </div>
                          
    <div class="form-group row" style="margin-left:191px;">
    <label for="password" class="col-sm-1 col-form-label">Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
    </div>
  </div>
 <div class="button1">
           <button type="submit" class="btn btn-warning" id="btn1"  name="update">UPDATE RECORDS</button>
           <button type="submit" class="btn btn-primary" id="btn1"  name="add">ADD NEW RECORDS</button>
    </div>
</form>
</div>
</div>
<?php
    if(isset($_POST['update'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
       $sql="SELECT * from admin where username='$username'";
        $result=mysqli_query($conn,$sql);
        $ab=mysqli_num_rows($result);
        if($ab==1){
           $sql2="SELECT password from admin where username='$username'";
            $result2=mysqli_query($conn,$sql2);
            while($row=$result2->fetch_assoc()){
                $ori_password=$row["password"];
            }
           
            if($ori_password==$password){
                $_SESSION["login"]=true;
                 header("Location: admin_update.php");
            }
            else{
              echo "<script>alert('Incorrect Password')</script>";  
            }
        }
        else
        {
            echo "<script>alert('Username Incorrect')</script>";
        }
    }
    if(isset($_POST['add'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
       $sql="SELECT * from admin where username='$username'";
        $result=mysqli_query($conn,$sql);
        $ab=mysqli_num_rows($result);
        if($ab==1){
           $sql2="SELECT password from admin where username='$username'";
            $result2=mysqli_query($conn,$sql2);
            while($row=$result2->fetch_assoc()){
                $ori_password=$row["password"];
            }
           
            if($ori_password==$password){
                $_SESSION["login"]=true;
                 header("Location: admin_insert.php");
            }
            else{
              echo "<script>alert('Incorrect Password')</script>";  
            }
        }
        else
        {
            echo "<script>alert('Username Incorrect')</script>";
        }
    }
    
    ?>
</body>
</html>
<?php
//}
?>
<!--
<script>
function updaterecord(){
    window.location.assign("admin_update.php");
}
function addrecord(){
    window.location.assign("admin_insert.php");
}    
</script>-->
