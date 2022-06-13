<?php
	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "kursor";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
	{
		echo "Er: ".$polaczenie->connect_errno;

	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$password))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$rezultat->free_result();
				setcookie("PHPName", $_POST['login']);
				setcookie("CurrentCourse",0);
				setcookie("CurrentLesson",0);
				$userid="SELECT id from users where login ='".$_POST['login']."'";
				$uid =mysqli_query($polaczenie,$userid);
				$uid = $uid->fetch_array();
				setcookie("UID",$uid[0]);
				setcookie("Logged","true");
				header('Location: http://localhost:3000/home');
				
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: session.php');
			}
			
		}
		
		$polaczenie->close();
	}
	
?>