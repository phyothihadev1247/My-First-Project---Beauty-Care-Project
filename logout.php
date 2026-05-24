<?php
session_start();
unset($_SESSION['patient']);
unset($_SESSION['book']);
header("location:login.php");
?>