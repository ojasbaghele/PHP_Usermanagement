<?php

session_start();
session_destroy();
echo"Logged OUT";
header("Location:login.php");

?>