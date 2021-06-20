<?php 
session_start();
if (isset($_SESSION['class2s'])){
    echo "<a href='logout.php'>تسجيل الخروج</a>";
}else{
    header('location: login2s.php');
}
