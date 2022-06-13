<?php
require_once "core.php";
$connect = mysqli_connect("localhost", "root", "", "kursor");
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);
// Display result
$user = $params['id'];
$lesson = $params['lesson'];

$sql = '
SELECT type FROM users 
where id= "' . $user . '" 
';
$result1 = mysqli_query($connect, $sql);
$result1 = mysqli_fetch_assoc($result1);

$type = "";
if ($result1['type'] == 1) {
    $type = "visual";
} else
if ($result1['type'] == 2) {
    $type = "auditory";
} else
if ($result1['type'] == 3) {
    $type = "writing";
} else
if ($result1['type'] == 4) {
    $type = "kinestetic";
} else {
    $type = "error";
}

$sql = '
SELECT content FROM component 
where lesson_id= "' . $lesson . '" 
and ' . $type . ' = 1
';

$result = mysqli_query($connect, $sql);


$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}
echo json_encode(['lessonData' => $json_array]);
