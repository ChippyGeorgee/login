<?php
include("config.php");
$email =$_POST["email"];
$password =$_POST["password"];
$password=md5($password);
$sql ="SELECT * FROM users where email='".$email."' AND password='".$password."'";
// echo $sql;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){            
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);            
    echo json_encode($row) ;    
}   
else{
    echo 0;
}
?>
