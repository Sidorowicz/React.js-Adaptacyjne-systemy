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

$input = file_get_contents('php://input');
// $input='{
//     "id":"37",
//     "lesson_id":"49",
//     "content":"<p>s1d</p>",
//     "visual":"1",
//     "auditory":"1",
//     "writing":"0",
//     "kinestetic":"0"
// }
// ';
$id;
$lid;
$con;
$a;
$b;
$c;
$d;
$input = json_decode($input, true);

foreach ($input as $key => $value) {
    if ($key == "id") {
        $id = $value;
    } else
    if ($key == "lesson_id") {
        $lid = $value;
    } else
    if ($key == "content") {
        $con = $value;
    } else
    if ($key == "visual") {
        $a = $value;
        if ($a < 1) {
            $a = 0;
        }
    } else
    if ($key == "auditory") {
        $b = $value;
        if ($b < 1) {
            $b = 0;
        }
    } else
    if ($key == "writing") {
        $c = $value;
        if ($c < 1) {
            $c = 0;
        }
    } else
    if ($key == "kinestetic") {
        $d = $value;
        if ($d < 1) {
            $d = 0;
        }
    }


    echo $key . " => " . $value . "\n";
}

//   $sql = 'INSERT INTO question
//   VALUES (NULL,"'.$lid.'","'.$lid.'","'.$quest.'","'.$a.'","'.$b.'","'.$c.'","'.$d.'","'.$ca.'","'.$cb.'","'.$cc.'","'.$cd.'")';
//   print_r($sql);
//   $result = mysqli_query($connect,$sql);



$sql = 'UPDATE component SET id=' . $id . ', lesson_id=' . $lid . ' , content="' . $con . '", visual=' . $a . ', auditory=' . $b . ', writing=' . $c . ', kinestetic=' . $d . '
WHERE id=' . $id . ' ';
print_r($sql);
$result = mysqli_query($connect, $sql);

exit(0);
