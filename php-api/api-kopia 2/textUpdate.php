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


$quizQuestion = $input["content"];
$id = $input["id"];
$auditory = $input["auditory"];
$writing = $input["writing"];
$visual = $input["visual"];
$kinestetic = $input["kinestetic"];
$courseId = $input["courseId"];


// if($correctA == NULL){
//     $correctA = "0"x
// }


$sql = "UPDATE component
  SET content='$quizQuestion', course_id='$courseId', auditory ='$auditory', writing='$writing', visual='$visual', kinestetic='$kinestetic' WHERE id=' $id ' ";
print_r($sql);
$result = mysqli_query($connect, $sql);
