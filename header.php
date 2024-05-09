<?php
session_start();
include ("include/config.php");
include ("include/function.php");
?>
<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="img/sofa.png">
<!--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="css/ToZero.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Фабрика Меблів Комфорт</title>
    <style>

    </style>
</head>
<body>
<div class="wrapper">
    <div class="loader"></div>
    <header class="header">
        <div class="container">
            <div class="header__body">
                <a href="#" class="header__logo">
                    <img src="img/sofa.png" alt="">
                </a>
                <div class="header__burger">
                    <span></span>
                </div>
                <nav class="header__menu">
                    <ul class="header__list">
                        <li><a href="./index.php" class="header__link">Головна</a></li>
                        <li id="header-button">
                            <a class="header__link">Асортимент</a>
                            <ul id="header-options">
                                <li><a href="./marketplace.php?page=0&type=1">Кутові дивани</a></li>
                                <li><a href="./marketplace.php?page=0&type=2">Прямі дивани</a></li>
                                <li><a href="./marketplace.php?page=0&type=3">Ліжка</a></li>
                            </ul>
                        </li>
                        <li><a href="./aboutus.php" class="header__link">Про нас</a></li>
                        <li><a href="./contacts.php" class="header__link">Контакти</a></li>
                        <li class="search-wrapper">
                            <form action="search.php" method="post">
                                <div class="search-container">
                                    <input  type="text"   name="keywords" placeholder="Пошук..." >
                                    <button type="submit" name="submitKeywords">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                        <?php
                            if(empty($_SESSION['user'])):
                        ?>
                        <li class="userlogin-container">
                            <div class="btn-group mr-2 " role="group" aria-label="Second group">
                                <a class="header__link userlogin btn btn-light" href = "login/login.php" type="button">Увійти</a>
                            </div>
                        </li>
                        <?php endif; if(!empty($_SESSION['user'])):?>
                        <li class="usergear">
                            <div class="dropdown">
                                <button onclick="gearFunction()" class="dropbtn"><i  id="fa-gear" class="fa-solid fa-gear fa-gear-unclicked"></i></button>
                                <div id="myDropdown" class="dropdown-content">
                                    <a class="username" href="userProfile.php"><i class="fa-regular fa-user"><span><?php echo $_SESSION['user'];?></span></i></a>
                                            <?php
                                            if('admin' === GetRoleUsingEmail($_SESSION['email'])){
                                               echo  '<a class="useradmin" href="admin/index.php"><i class="fa-solid fa-lock"><span>Адмін-панель</span></i></a>';
                                            }
                                            ?>
<!--                                    <a class="useradmin" href="#"><i class="fa-solid fa-lock"><span>Адмін-панель</span></i></a>-->
                                    <a class="userexit" href="login/exit.php"><i class="fa-solid fa-arrow-right-from-bracket"><span>Вихід</span></i></a>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <a href="#" class="scroll-to-top">&uarr;</a>

