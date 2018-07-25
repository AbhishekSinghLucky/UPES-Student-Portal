<?php
session_start();
if($_SESSION["login"]==true){
$user_sapid=$_SESSION["sapid"];
include "connection.php";
//echo $user_sapid;
?>
<html>
<head><title><?php 
    $sql6="SELECT name from login where sapid=$user_sapid";
    $result6=mysqli_query($conn,$sql6);
    while($row=$result6->fetch_assoc()){
        echo $row["name"];
    }
    ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<style>   
    .panel-body{
        
      font-size: 13px;
    padding: 39px
    }
    .logo{
        position: relative;
    }
    .logo1{
        position: absolute;
        right: 10px;
        top: 25px;
    }
    </style>
<body style="background-color:white">
    <div class="logo">
    <img src="logo.jpg">
    </div>
    <div class="logo1">
    <?php
        $sql2="SELECT name from login where sapid=$user_sapid";
        $result2=mysqli_query($conn,$sql2);
        while($row1=$result2->fetch_assoc()){
            echo "Welcome, ";echo "<span style='color:green'><b>".$row1["name"]."</b></span>";
        }
        ?>
    <a href="logout.php" class="btn btn-danger">Logout</a>    
    </div>
    <hr><br>
        
<div class="container">
<div class="row">
<div class="col-md-5">
        
<?php
    $sql="SELECT * from login where sapid=$user_sapid";
    $result=mysqli_query($conn,$sql);
    while($row=$result->fetch_assoc()){
    ?>
   
    <div class="panel panel-info">
      <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Student's Personal Detail</div>
      <div class="panel-body">
      <span style="padding-right:59px;">Name: </span><?php  echo $row["name"]."<br>";?>
      <span style="padding-right:50px;">SAP ID:  </span><?php  echo $row["sapid"]."<br>";?>
          <span style="padding-right:51px;">Roll No:  </span><?php  echo $row["roll"]."<br>";?>
          <span style="padding-right:31px;">STU Email:  </span><?php  echo $row["personalemail"]."<br>";?>
          <span style="padding-right:61px;">Email:  </span><?php  echo $row["stuemail"]."<br>";?>
          <span style="padding-right:47px;">Session:  </span><?php  echo $row["session"]."<br>";?>
          <span style="padding-right:28px;">Contact No:  </span><?php  echo $row["phone"]."<br>";?>
          <span style="padding-right:44px;">Address:  </span><?php  echo $row["address"]."<br>";?>
          <span style="padding-right:48px;">Country:  </span><?php  echo $row["country"];?>
      </div>
      </div>
 <div class="fees">
    <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-money"></i> Fees Status</div>
    <div class="panel-body">
    Balance to Pay : <?php echo "₹ ".$row["fees"]; ?> <br>
    <input type="number" name="fees_pay" width="auto"> <a href="#">Click to Pay</a>     
        </div>
        </div>
    </div>   

    
    
</div>
<div class="col-sm-3">
         <img src="<?php echo $row["image"];?>" style="height:280px;width:auto;">
 
    </div>
<?php   
    }
    ?>
<div class="col-sm-4">
 <div class="card-body">
    <h5 class="card-title"><span style="font-size:25px; color:red;">Important</span></h5>
    <a href="#">SRE Helpdesk</a><br>
     <a href="#">SRE-Requisition Formats</a><br>
     <a href="#">UPES Belief boof</a><br>
     <a href="#">Payment Receipt</a><br>
     <a href="#">Supplementary/DR Registration for July/ August</a><br>
     <a href="#">Hostel/Transport Card</a><br>
     <a href="#">Incometax Certificate</a><br>
     <a href="#">Invoice</a><br>
     <a href="#">Online bank account detail submission</a><br><br>
     <a href="#" target="_blank"><button class="btn btn-primary"><i class="fa fa-line-chart" style="color:white;cursor:pointer;"> <b>GRADE CARD</b></i></button></a>
  </div>    
</div>    
        
</div>
    
</div>            
    </body>    
</html>
<?php
}
else
{
 echo "<script>window.location.assign('index.php');</script>";   
}
?>