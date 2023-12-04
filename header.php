<?php
require_once 'functions.php';
require_once 'config.php';

if (!empty(SITE_ROOT)){
    $url_path = "/".SITE_ROOT."/";
} else{
    $url_path = "/";
}

$url_path = 'http://localhost/blogsite/';

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale=1">
    <title>PHP Blog</title>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500;1,600&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
    
    <link rel="stylesheet" href="http://localhost/blogsite/style.css">
    <link href="https://css.gg/css" rel="stylesheet" />
</head>
<body>

<header class="main_header">
    
    <img src="http://localhost/blogsite/img/blog_logo.png" alt="">
</header>

<div class="w3-bar w3-border menu_header">
    <a href="http://localhost/blogsite/" class="w3-bar-item w3-button w3-pale-green">Home</a>
    <a href="http://localhost/blogsite/blog.php" class="w3-bar-item w3-button">All Adventures</a>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<a href='".$url_path ."new.php' class='w3-bar-item w3-btn'>New Post</a>";
        echo "<a href='".$url_path ."admin.php' class='w3-bar-item w3-btn'>Admin Panel</a>";
        echo "<a href='".$url_path ."logout.php' class='w3-bar-item w3-btn'>Logout</a>";
    } else {
        echo "<a href='".$url_path ."login.php' class='w3-bar-item w3-pale-red' >Login</a>";
    }
    ?>
</div>

