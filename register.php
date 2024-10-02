<?php
include("connect.php");

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$image=$_FILES['Photo']['name'];
$tmp_name=$_FILES['Photo']['tmp_name'];//tmp_### here ### should be same 
$role=$_POST['role'];

if($password==$cpassword){
move_uploaded_file($tmp_name,"../uploads/$image");
$insert=mysqli_query($connect,"INSERT INTO user(name,mobile,password ,address 	,photo 	,role 	,status 	,votes 	) VALUES ('$name','$mobile','$password','$address','$image','$role',0,0)");
if($insert)
{
    echo'
    <script>
   alert("Registration Successfull");
   window.location="../ALLPages/register.html";
   </script>
    ';
}
else{
    echo'
    <script>
   alert("Some error occure");
   window.location="../ALLPages/register.html";
   </script>
    ';
}
}
else{
    echo '
   <script>
   alert("password and confirm password does not match");
   window.location="../ALLPages/register.html";
   </script>
    ';
}



?>