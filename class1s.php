<?php
session_start();
if (isset($_SESSION['class1s'])){
    $name = $_SESSION['class1s'];
    echo "Welcome " . $name . '<br>';
    echo "<a href='logout.php'>تسجيل الخروج</a>";
}else{
    header('location: login1s.php');
}
