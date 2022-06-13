<?php
require_once "core.php";
$connect = mysqli_connect("localhost","root","", "kursor");
$userid="SELECT id from users where login ='".$_POST['login']."'";
$uid =mysqli_query($connect,$userid);
$uid = $uid->fetch_array();
$sql = "INSERT INTO course
VALUES (NULL,".$uid[0].",'New Course','Change description in teacher menu','newcode','Logo.png')";
$result =mysqli_query($connect,$sql);
$course_id = $result->insert_id;
setcookie("PHPCurrentCourse", $coure_id);
header('Location: http://localhost:3000/home');

?>