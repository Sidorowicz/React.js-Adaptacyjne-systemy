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


$quizQuestion = $input["quizQuestion"];
$A = $input["A"];
$B = $input["B"];
$C = $input["C"];
$D = $input["D"];
$correctA = $input["correctA"];
$correctB = $input["correctB"];
$correctC = $input["correctC"];
$correctD = $input["correctD"];
$id = $input["id"];

// if($correctA == NULL){
//     $correctA = "0"
// }


$sql = "UPDATE question
  SET question='$quizQuestion', A='$A ',B=' $B ',C=' $C',D='$D ',correctA=' $correctA ',correctB=' $correctB',correctC=' $correctC ',correctD=' $correctD  ' WHERE id=' $id ' ";
print_r($sql);
$result = mysqli_query($connect, $sql);
