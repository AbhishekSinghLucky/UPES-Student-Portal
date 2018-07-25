<?php
include "connection.php";
?>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
</head>
<style>
    body{
        background-image:url(forgot.png);
        background-repeat: no-repeat;
        background-position: center;
    }
    </style>
    <body>
    <img src="logo.jpg">
    <hr>    

<div class="container">
 
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="sapid">SAP ID</label>
      <div class="col-sm-8">
        <input type="number" class="form-control" id="sapid" placeholder="Enter SAP ID" name="sapid" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="roll">Roll No.</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="roll" placeholder="Enter Roll Number" name="roll" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="new_pass">Enter New Password</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="new_pass" placeholder="Enter New Password" name="new_pass" required>
      </div>
    </div>  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-3">
        <button type="submit" name="submit" class="btn btn-default">Submit</button> <a href="index.php">Go to Login Page</a>
      </div>
    </div>
  </form>
</div>
<?php
if(isset($_POST['submit'])){
    $sapid=$_POST['sapid'];
    $roll=$_POST['roll'];
    $new_pass=$_POST['new_pass'];
    $sql="SELECT * from login where sapid=$sapid";
          $result=mysqli_query($conn,$sql);
          $a=mysqli_num_rows($result);
         if($a==1)
         {
             $sql2="SELECT roll from login where sapid=$sapid";
             $result2=mysqli_query($conn,$sql2);
             while($row=$result->fetch_assoc())
             {
                 $original_roll=$row["roll"];
                 if($roll==$original_roll){
                  $sql3="UPDATE `login` SET `password`='$new_pass' WHERE sapid=$sapid";
                  $result3=mysqli_query($conn,$sql3);
                  if($result3){
                  echo "<span style='color:green'>"."<b>Password Successfully Updated</b>"."</span>";
                  }     
                 }
                 else{
                     echo "<script>alert('Incorrect Roll Number')</script>";
                 }
             }
         }
    else{
        echo "<script>alert('SAP ID Does Not Exist')</script>";
    }
}
?>      
    </body>
</html>

























