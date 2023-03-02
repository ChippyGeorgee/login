<?php
include("config.php");
$id = $_COOKIE["id"];
if($id){
    $sql="SELECT * FROM users where id='".$id."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){            
        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);      
        // var_dump($row);      
    }   
}
?>
<html>
    <h1>Profile</h1>
    <table>
        <tr>
            <td>Name:</td>
            <td><?php echo $row[0]["name"];?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $row[0]["email"];?></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><?php echo $row[0]["phone"];?></td>
        </tr>
    </table>
</html>