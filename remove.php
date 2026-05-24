<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['book'][$id]);
header("location: book.php");
?>