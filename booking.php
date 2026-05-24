<?php
session_start();


if (empty($_SESSION['patient'])) {    
    header('location: book.php');
    exit(); 
} else {
   
    if (isset($_GET['id']) && is_numeric($_GET['id']))
     {
        
        $id = intval($_GET['id']);       
        
        if (!isset($_SESSION['book'][$id]))
        {
            $_SESSION['book'][$id] = 1; 
        } else 
        {
            $_SESSION['book'][$id]++; 
        }   
        header('location: book.php');
        exit(); 
    } else {
        
        echo "Invalid product ID.";
        exit(); 
    }
}
?>