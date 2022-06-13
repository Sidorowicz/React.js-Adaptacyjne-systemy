<?php

session_start();
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

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "kursor";
$connect = new mysqli($host, $db_user, $db_password, $db_name);



if ($connect->connect_errno != 0) {
    echo "Error " . $connect->connect_errno;
} else {
    $login = $input["login"];
    $haslo = $input["haslo"];



    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    if (!empty($login) && !empty($haslo)) {
        if ($rezultat = $connect->query(sprintf(
            "SELECT * FROM users WHERE login='%s'",
            mysqli_real_escape_string($connect, $login),
            mysqli_real_escape_string($connect, $haslo)
        ))) {
            $ile_userow = $rezultat->num_rows;

            if ($ile_userow > 0) {
                $row = $rezultat->fetch_assoc();
                if (password_verify($haslo, $row['password'])) {
                    $data = array(
                        'is_logged' => true,
                        'id' => $row['id'],
                        'login' => $row['login'],
                        'email' => $row['email'],
                        'name' => $row['name'],
                        'type' => $row['type'],
                        'surname' => $row['surname'],
                    );
                    // echo "gitowa";
                    echo json_encode($data);
                } else {
                    return [
                        'is_logged' => false,
                        'id' => '',
                        'login' => '',
                        'email' => '',
                        'is_admin' => false,
                    ];
                }
            } else {
                echo "Uzytkownik nie istnieje lub dane są nieprawidłowe";
            }
        }
    } else {
        if (empty($login) && empty($haslo)) {
            echo "Uzupełnij dane logowania ";
        } elseif (empty($haslo)) {
            echo "Podaj haslo";
        } elseif (empty($login)) {
            echo "Podaj login";
        }
    }
    $connect->close();
}
