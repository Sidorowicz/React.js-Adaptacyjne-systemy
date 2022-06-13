<?php
	if (isset($_COOKIE['Logged'])) {
    unset($_COOKIE['Logged']);
    setcookie('Logged', '', time() - 3600, '/'); // empty value and old timestamp
	}
	if (isset($_COOKIE['PHPName'])) {
    unset($_COOKIE['PHPName']);
    setcookie('PHPName', '', time() - 3600, '/'); // empty value and old timestamp
	}
	if (isset($_COOKIE['UID'])) {
    unset($_COOKIE['UID']);
    setcookie('UID', '', time() - 3600, '/'); // empty value and old timestamp
	}
	if (isset($_COOKIE['CurrentCourse'])) {
    unset($_COOKIE['CurrentCourse']);
    setcookie('CurrentCourse', '', time() - 3600, '/'); // empty value and old timestamp
	}
	if (isset($_COOKIE['CurrentLesson'])) {
    unset($_COOKIE['CurrentLesson']);
    setcookie('CurrentLesson', '', time() - 3600, '/'); // empty value and old timestamp
	}
	header('Location: http://localhost:3000');
?>