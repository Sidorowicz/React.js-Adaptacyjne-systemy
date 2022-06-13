<?php
setcookie("CurrentCourse",$_POST['val']);
header('Location: http://localhost:3000/home');
?>