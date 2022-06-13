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
//     "lesson_id":"49",
//     "Question":"asdas",
//     "A":"dasd","B":"asdas",
//     "C":"asd","D":"asd",
//     "correctA":false,
//     "correctB":true,
//     "correctC":true,
//     "correctD":false
// }
// ';
$lid;
$quest;
$a;
$b;
$c;
$d;
$ca;
$cb;
$cc;
$cd;
$input = json_decode($input, true);

foreach ($input as $key => $value) {
    if ($key == "lesson_id") {
        $lid = $value;
    } else
    if ($key == "Question") {
        $quest = $value;
    } else
    if ($key == "A") {
        $a = $value;
    } else
    if ($key == "B") {
        $b = $value;
    } else
    if ($key == "C") {
        $c = $value;
    } else
    if ($key == "D") {
        $d = $value;
    } else
    if ($key == "correctA") {
        $ca = $value;
        if ($ca < 1) {
            $ca = 0;
        }
    } else
    if ($key == "correctB") {
        $cb = $value;
        if ($cb < 1) {
            $cb = 0;
        }
    } else
    if ($key == "correctC") {
        $cc = $value;
        if ($cc < 1) {
            $cc = 0;
        }
    } else
    if ($key == "correctD") {
        $cd = $value;
        if ($cd < 1) {
            $cd = 0;
        }
    }

    echo $key . " => " . $value . "\n";
}

$sql = 'INSERT INTO question
  VALUES (NULL,"' . $lid . '","' . $lid . '","' . $quest . '","' . $a . '","' . $b . '","' . $c . '","' . $d . '","' . $ca . '","' . $cb . '","' . $cc . '","' . $cd . '")';
print_r($sql);
$result = mysqli_query($connect, $sql);
?>
// exit(0);




/*
add :
{"form":[
{
"lesson_id":"49",
"Question":"asdas",
"A":"dasd","B":"asdas",
"C":"asd","D":"asd",
"correctA":false,
"correctB":true,
"correctC":true,
"correctD":false
}
,{
"lesson_id":"49",
"Question":"asd",
"A":"asd","B":"asd",
"C":"asd","D":"asd",
"correctA":true,
"correctB":true,
"correctC":false,
"correctD":false
}
]
}