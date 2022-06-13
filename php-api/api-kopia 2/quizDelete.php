<?php
require_once "core.php";
$connect = mysqli_connect("localhost", "root", "", "kursor");


$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
// Use parse_str() function to parse the
// string passed via URL
echo "sd";
parse_str($url_components['query'], $params);
// Display result
$uid = $params['id'];
$tarray = json_decode($uid);
echo ($uid);
$sjson = json_encode($newarray);

$sql = "DELETE FROM question
WHERE id='$uid'";
$result = mysqli_query($connect, $sql);
exit(0);
