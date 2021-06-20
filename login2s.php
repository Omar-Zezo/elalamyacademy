<?php 
    session_start();
    if (isset($_SESSION['class2s'])){
        header('location: class2s.php');
    }

    include 'conect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = sha1($password);

        //check if user in databade

        $stmt = $con->prepare("SELECT Username, Pass FROM class2s WHERE Username = ? AND Pass = ?");
        $stmt->execute(array($username, $hashedPassword));
        $count = $stmt->rowCount();

        //check if count > 0 then database contain username

        if($count > 0){
            $_SESSION['class2s'] = $username;
            header("location: class2s.php");
            exite();
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logine</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="login">
        <div class="overlay"></div>
        <div class="login-form">
            <h1>سجل الدخول إلى حسابك </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="login" method="POST">
            <input type="text" name="username" placeholder="اسم المستخدم" requierd >
            <input type="password" name="password" placeholder="كلمة المرور" requierd>
            <button type="submit" name="submit">تسجيل الدخول</button>
        </form>
        </div>
    </div>
</body>
</html>