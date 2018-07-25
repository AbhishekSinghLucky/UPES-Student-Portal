<?php
session_start();
if($_SESSION["login"]==true)
{
include "connection.php";

?>
<html>
    <head>
    <title>Admin Page-Insert Record</title>
    </head>
    <style>
    
    </style>
    <body>
        <h2>Admin <span style=" color:red">New Student</span> Detail Insert Panel</h2>    
    <form method="post" enctype="multipart/form-data">
        1.SAPID <input type="number" name="sapid" required><br><br>
        2.Password <input type="text" name="password" required><br><br>
        3.Student Name <input type="text" name="name" pattern="^\D*$" title="Numbers or Special Characters Not Allowed" required><br><br>
        4.Roll Number <input type="text" name="roll" required><br><br>
        5.Session(Branch) <input type="text" pattern="^\D*$" title="Numbers or Special Characters Not Allowed"  name="session" required><br><br>
        6.Contact Number <input type="number" name="phone" required><br><br>
        7.Address <input type="text" pattern="^\D*$" title="Numbers or Special Characters Not Allowed"  name="address" required><br><br>
        8.Country <input type="text" name="country" required><br><br>
        <input type="hidden" value="1000000" name="MAX_FILE_SIZE">
        9.Personal Email <input type="email" name="personalemail" required><br><br>
        10. STU-Email <input type="email" name="stuemail" required><br><br>
        11.Image <input type="file" name="myimage" required><br><br>
        12.Fees <input type="number" name="fees" required><br><br>
        <button type="submit" name="submit">Submit</button>
        
        </form>
    <?php
    if(isset($_POST['submit'])){
//   echo "45678";die;
        $sapid=$_POST['sapid'];
        $password=$_POST['password'];
        $name=$_POST['name'];
        $roll_number=$_POST['roll'];
        $session=$_POST['session'];
        $contact=$_POST['phone'];
        $address=$_POST['address'];
        $country=$_POST['country'];
        $personalemail=$_POST['personalemail'];
        $stuemail=$_POST['stuemail'];       
        $fees=$_POST['fees']; 
        $target_path="oss_2015/";
            $target_path=$target_path.basename($_FILES['myimage']['name']);
            if(move_uploaded_file($_FILES['myimage']['tmp_name'],$target_path)){
//                $sql="INSERT INTO `demo1`(`path`) VALUES ('$target_path')";
//                $result=mysqli_query($conn,$sql);
        
        $sql2="SELECT * from login where sapid=$sapid";
        $result2=mysqli_query($conn,$sql2);
        $b=mysqli_num_rows($result2);
        if($b==0){
            
                
$sql="INSERT INTO `login`(`sapid`, `password`, `name`, `roll`, `session`, `phone`, `address`, `country`, `image`,`stuemail`,`personalemail`,`fees`) VALUES ($sapid,'$password','$name','$roll_number','$session','$contact','$address','$country','$target_path','$stuemail','$personalemail','$fees')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "New Record Added.<br><br>";
            ?>
              <a href="admin_insert.php">Add More Records</a> 
                <?php
        }
            }
                else {
                   echo "<script>alert('SAP ID Already Exist');</script>" ;
                }
                
      }  
    }
        ?>
        <a href="admin_logout.php">Go to Admin Home Page</a> 
    </body>
</html>
<?php
}
else{
    header("Location:admin.php");
}
?>



















