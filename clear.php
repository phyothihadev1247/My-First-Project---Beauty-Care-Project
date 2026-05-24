<?php
session_start();
unset($_SESSION['book']);
header("location:books.php");
?>