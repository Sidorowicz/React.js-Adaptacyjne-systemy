<?php
require_once "core.php";
$connect = mysqli_connect("localhost", "root", "", "kursor");


//naprawia CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    return 0;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ($connect->connect_errno) {
    echo "Failed to connect to MySQL: " . $connect->connect_error;
    exit();
}

$input = (array) json_decode(file_get_contents('php://input'), TRUE);

$lessonId = $input["lesson_id"];
$content = $input["content"];
$v = $input["v"];
$a = $input["a"];
$r = $input["r"];
$c = $input["c"];
$courseId = $input["course_id"];




$sql = "INSERT INTO component
VALUES (NULL,'$lessonId','$courseId','$tittle','$v','$a','$r','$c')";
$result = mysqli_query($connect, $sql);
exit(0);
