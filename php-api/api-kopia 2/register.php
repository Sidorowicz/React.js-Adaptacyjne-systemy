<?php
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

session_start();

if (isset($input['email'])) {
	$wszystko_OK = true;
	$login = $input['login'];
	$email = $input['email'];
	$name = $input['name'];
	$surname = $input['surname'];
	$haslo1 = $input['password'];
	$quest = $input['questionnaire'];
	$haslo2 = $input['passwordCheck'];
	$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
	try {
		$host = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "kursor";

		$polaczenie = @new mysqli("localhost", "root", "", "kursor");
		if ($polaczenie->connect_errno != 0) {
			throw new Exception(mysqli_connect_errno());
		} else {
			//Czy email już istnieje?
			$rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");

			if (!$rezultat) throw new Exception($polaczenie->error);

			$ile_takich_maili = $rezultat->num_rows;
			if ($ile_takich_maili > 0) {
				$wszystko_OK = false;
				$_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
			}

			//Czy login jest już zarezerwowany?
			$rezultat = $polaczenie->query("SELECT id FROM users WHERE login='$login'");

			if (!$rezultat) throw new Exception($polaczenie->error);

			$ile_takich_loginow = $rezultat->num_rows;
			if ($ile_takich_loginow > 0) {
				$wszystko_OK = false;
				$_SESSION['e_login'] = "Istnieje już gracz o takim loginu! Wybierz inny.";
			}

			if ($wszystko_OK == true) {
				//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy

				if ($polaczenie->query("INSERT INTO users VALUES (NULL,'$haslo_hash', '$email',1,'$name','$surname','$quest','$login')")) {
					echo "Zarejestrowno";
				} else {
					throw new Exception($polaczenie->error);
				}
			}

			$polaczenie->close();
		}
	} catch (Exception $e) {
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
		echo '<br />Informacja developerska: ' . $e;
	}
}
