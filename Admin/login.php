<?php
    ob_start();
    include $_SERVER['DOCUMENT_ROOT'].'/Class/adminLogin.php';
?>

<?php
    $adminLogin = new adminLogin();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminUser = $_POST['adminUser'];
        $adminPassword = md5($_POST['adminPassword']);

        $loginCheck = $adminLogin -> login_check($adminUser,$adminPassword);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/styleAdmin.css">
</head>
<body>

    <!--NAVIGATION AREA-->
    <section class="login-area">
        <div class="login-box">
            <h1>Login</h1> 
            <span><?php if(isset($loginCheck)){echo $loginCheck;} ?></span>
            <form action="login.php" method="POST">
                <div class="text-field">
                    <input required type="text" name="adminUser"> 
                    <span></span>
                    <label for="">User Name</label>
                </div>
                <div class="text-field">
                    <input required type="password" name="adminPassword"> 
                    <span></span>
                    <label for="">Password</label>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
    </section>

</body>
</html>