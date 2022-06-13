<?php
// echo print_r($_POST, true);
$connect = mysqli_connect("localhost", "root", "", "kursor");
$sql = "select id from question where lesson_id = " . $_POST['lesson'];
$min = 0;
$max = 0;
$results = mysqli_query($connect, $sql);
$rows = array();
$rows1 = array();
$odpa = 0;
$odpb = 0;
$odpc = 0;
$odpd = 0;
while ($row = mysqli_fetch_array($results)) {
    $rows[] = $row;
}
foreach ($rows as $row) {
    $max = $max + 1;
    $sql1 = "select correctA,correctB,correctC,correctD from question where id = " . $row['id'];
    $ans = mysqli_query($connect, $sql1);
    while ($row1 = mysqli_fetch_array($ans)) {
        $rows1[] = $row1;
        echo "Poprawne odpowiedzi" . "<br>";
        if ($row1['correctA'] == 1) {
            echo "A <br>";
            $dpa = "A";
        }
        if ($row1['correctB'] == 1) {
            echo "B <br>";
            $dpa = "B";
        }
        if ($row1['correctC'] == 1) {
            echo "C <br>";
            $dpa = "C";
        }
        if ($row1['correctD'] == 1) {
            echo "D <br>";
            $dpa = "D";
        }
        echo "Odpowiedzi podane do pytanie o id: " . $row['id'] . "<br>";
        $cor = 1;
        foreach ($_POST[$row['id']] as $odp) {
            if ($odp == "A") {
                if ($row1['correctA'] != 1) {
                    $cor = 0;
                }
            }
            if ($odp == "B") {
                if ($row1['correctB'] != 1) {
                    $cor = 0;
                }
            }
            if ($odp == "C") {
                if ($row1['correctC'] != 1) {
                    $cor = 0;
                }
            }
            if ($odp == "D") {
                if ($row1['correctD'] != 1) {
                    $cor = 0;
                }
            }

            echo $odp . "<br>";
        }
        if ($cor == 1) {
            $min = $min + 1;
        }
        $cor = 1;
    }
}
echo $min;
echo "uzyskałeś " . $min . " na " . $max . " punktów";
