<?php
require_once "core.php";
$connect = mysqli_connect("localhost","root","", "kursor");
$sql = "INSERT INTO lesson
VALUES (NULL,1,'New Lesson','Change content in teacher menu')";
$result =mysqli_query($connect,$sql);
