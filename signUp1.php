<?php
include("config.php");
if(isset($_POST["name"])){
    $name= $_POST["name"];
}
if(isset($_POST["email"])){
    $email= $_POST["email"];
}
if(isset($_POST["phone"])){
    $phone= $_POST["phone"];
}
if(isset($_POST["password"])){
    $password= $_POST["password"];
    $password= md5($password);
}
$date= date("Y-m-d");
$sql1 ="SELECT * FROM users where email='".$email."'";
$result1 =  mysqli_query($conn,$sql1);
if($result1->num_rows>0){
    echo 3;
}
else{
    $sql="INSERT INTO users (name,email,phone,password,date) VALUES('".$name."','".$email."','".$phone."','".$password."','".$date."')";
    // echo $sql;
    $result =  mysqli_query($conn,$sql);
    if($result){
        echo 1;
    }
    else{
        echo 0;
    }
}

?>