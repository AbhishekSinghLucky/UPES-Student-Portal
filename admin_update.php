<?php
session_start();
if($_SESSION["login"]==true)
{
    

include "connection.php";
?>
<html>
<head>
<title>Admin Page-Update Record</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
</head>
<style>  
</style>    
<body>
<div class="container">  
<div class="row"> 
<div class="col-md-6">
    
<h2>Admin Student <span style="color:red">Record Update</span> Portal</h2>
    
<form action="admin_update.php" method="GET">
Enter SAP ID : <input type="number" name="sapid">
<button type="submit" name="submit">Submit</button> <a href="admin_logout.php">Go to Admin Home Page</a>    
</form>
   
 
<?php
if(isset($_GET['submit']))
{
 $sapid=$_GET['sapid'];
$sql="SELECT * from login where sapid=$sapid";
$result=mysqli_query($conn,$sql);
$a=mysqli_num_rows($result);
if($a==1){
$sql2="SELECT * from login where sapid=$sapid";
$result2=mysqli_query($conn,$sql2);
while($row=$result2->fetch_assoc()){
    $password=$row["password"];
    $name=$row["name"];
    $roll=$row["roll"];
    $session=$row["session"];
    $phone=$row["phone"];
    $address=$row["address"];
    $country=$row["country"];
    $stuemail=$row["stuemail"];
    $personalemail=$row["personalemail"];
    $fees=$row["fees"];
    $image=$row["image"];
}
echo "<span style='color:blue;font-size:25px;'>Update Details For: ".$sapid."</span>";   
?></div> 
   <br><div class="col-md-4"> 
<form method="post" enctype="multipart/form-data">
1.Password : <input type="text" name="password1" value="<?=$password?>" required><br><br>
2.Name : <input type="text" name="name1" value="<?=$name?>" required><br><br>
3.Roll Number : <input type="text" name="roll1" value="<?=$roll?>" required><br><br>
4.Session : <input type="text" name="session1" value="<?=$session?>" required><br><br>
5.Contact Number <input type="number" name="phone1" value="<?=$phone?>" required><br><br>
6.Address <input type="text" pattern="^\D*$" title="Numbers or Special Characters Not Allowed" value="<?=$address?>"  name="address1" required><br><br> 
7.Country <input type="text" name="country1" value="<?=$country?>" required><br><br> 
8.STU-Email <input type="email" name="stuemail1" value="<?=$stuemail?>" required><br><br> 
9.Personal Email <input type="email" name="personalemail1" value="<?=$personalemail?>" required><br><br>
10.Fees <input type="number" name="fees1" value="<?=$fees?>" required><br><br>
<input type="hidden" value="1000000" name="MAX_FILE_SIZE">    
11.Image <input type="file" name="myimage1" value="<?=$image?>"><img src="<?php echo $image; ?>" style="width:50px;height:auto"><br>

    
<button type="submit" name="submit1">Submit</button> 
    
</form></div>  
    <?php    
}    
    else{
        echo "<script>alert('SAP-ID Does Not Exist')</script>";
    }
}
if(isset($_POST['submit1'])){
//    echo $sapid;die;
    $password1=$_POST["password1"];
    $name1=$_POST["name1"];
    $roll1=$_POST["roll1"];
    $session1=$_POST["session1"];
    $phone1=$_POST["phone1"];
    $address1=$_POST["address1"];
    $country1=$_POST["country1"];
    $stuemail1=$_POST["stuemail1"];
    $personalemail1=$_POST["personalemail1"];
    $fees1=$_POST["fees1"];
    $target_path="oss_2015/";
            $target_path=$target_path.basename($_FILES['myimage1']['name']);
            if(move_uploaded_file($_FILES['myimage1']['tmp_name'],$target_path)){
    
  $sql3="UPDATE `login` SET `password`='$password1',`name`='$name1',`roll`='$roll1',`session`='$session1',`phone`='$phone1',`address`='$address1',`country`='$country1',
`image`='$target_path',`stuemail`='$stuemail1',`personalemail`='$personalemail1',`fees`='$fees1' WHERE sapid=$sapid";
$result3=mysqli_query($conn,$sql3);
            if($result3){
    echo "<div class='col-md-2'>";            
    echo "<span style='color:green'><h5><b>Record Updated Successfully!<b></h5></span>";
}
    else{
       echo "<span style='color:red'><h5><b>Failed to Update!<b></h5></span>";
    } echo "</div>";
                
            }

else{
 $sql3="UPDATE `login` SET `password`='$password1',`name`='$name1',`roll`='$roll1',`session`='$session1',`phone`='$phone1',`address`='$address1',`country`='$country1',
`stuemail`='$stuemail1',`personalemail`='$personalemail1',`fees`='$fees1' WHERE sapid=$sapid";
$result3=mysqli_query($conn,$sql3);
if($result3){
     echo "<div class='col-md-2'>";
    echo "<span style='color:green'><h5><b>Record Updated Successfully!<b></h5></span>";
}
    else{
        echo "<span style='color:red'><h5><b>Failed to Update!<b></h5></span>";
    }echo "</div>";    
}
    

    
}    
  ?>
  
    
</div> 
</div>     
</body>    
</html>
<?php
}
else{
    header("Location:admin.php");
}
?>


















