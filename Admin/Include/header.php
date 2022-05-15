<?php
    include $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/session.php';
    Session::checkSession();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Category</title>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="../ckfinder/ckfinder.js"></script>
</head>
<body>
    <header>
        <h1>ADMIN PAGE</h1>
        <?php
            if(isset($_GET['action']) && $_GET['action'] == 'logout')
            {
                Session::destroy();
            }
         ?>
        <div class="header-admin">
            <div class="header-admin-left">
                <a href="/Web_Final_Project/home.php" class="vw-btn">Visit Website</a>
            </div>
            <div class="header-admin-right">
                <h3>Hello <?php echo Session::get('adminName'); ?></h3>
                <a href="?action=logout"><i class="fas fa-sign-out"></i>Log out</a>
            </div>
        </div>
    </header>