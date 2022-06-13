<?php
require_once "core.php";
$connect = mysqli_connect("localhost", "root", "", "kursor");
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);

// Display result
$uid = $params['json'];
$sql = '
SELECT * FROM lesson 
where course_id="' . $uid . '"
';
$result = mysqli_query($connect, $sql);

$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}
echo json_encode(['lessonData' => $json_array]);
