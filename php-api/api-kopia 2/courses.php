<?php
require_once "core.php";
$connect = mysqli_connect("localhost","root","", "kursor");
$sql = '
SELECT * FROM course 
';
$result =mysqli_query($connect,$sql);

$json_array = array();
while($row=mysqli_fetch_assoc($result)){
    $json_array[] = $row;
}
echo json_encode($json_array);
