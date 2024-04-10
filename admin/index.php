<?php
session_start();
include('../include/config.php');
include('../include/function.php');
if('admin' !== GetRoleUsingEmail($_SESSION['email'])){
    header('location: ../login/login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$db = 'furnituredb';
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Адмін-панель</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/ToZero.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body{
            font-family: Verdana, Arial, Helvetica, Sans-Serif;
            background-color: #f7d692;
            font-family: Arial;
            text-decoration: none;
        }
    </style>

</head>
<body class="admin">
    <header class="header">
        <div class="container">
            <div class="header__body">
                <a href="#" class="header__logo">
                    <img src="../img/sofa.png" alt="">
                </a>
                <div class="header__burger">
                    <span></span>
                </div>
                <nav class="header__menu">
                    <ul class="header__list">
                        <li><a href="../index.php" class="header__link">Головна</a></li>
                        <li id="header-button">
                            <a class="header__link">Асортимент</a>
                            <ul id="header-options">
                                <li><a href="../marketplace.php?page=0&type=1">Кутові дивани</a></li>
                                <li><a href="../marketplace.php?page=0&type=2">Прямі дивани</a></li>
                                <li><a href="../marketplace.php?page=0&type=3">Ліжка</a></li>
                                <!--                                <li><a href="./marketplace.php?page=0&type=4">Крісла/Табурети</a></li>-->
                            </ul>
                        </li>
                        <li><a href="../aboutus.php" class="header__link">Про нас</a></li>
                        <li><a href="../contacts.php" class="header__link">Контакти</a></li>
                        <li class="search-wrapper">
                            <form action="../search.php" method="post">
                                <div class="search-container">
                                    <input  type="text"   name="keywords" placeholder="Пошук..." />
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
                                    <a class="header__link userlogin" href = "../login/login.php" type="button" class="btn btn-light">Увійти</a>
                                </div>
                            </li>
                        <?php endif; if(!empty($_SESSION['user'])):?>
                            <li class="usergear">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-gear"></i></button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="username" href="../userProfile.php"><i class="fa-regular fa-user"><span><?php echo $_SESSION['user'];?></span></i></a>
                                        <?php
                                        if('admin' === GetRoleUsingEmail($_SESSION['email'])){
                                            echo  '<a class="useradmin" href="admin/index.php"><i class="fa-solid fa-lock"><span>Адмін-панель</span></i></a>';
                                        }
                                        ?>
                                        <!--                                    <a class="useradmin" href="#"><i class="fa-solid fa-lock"><span>Адмін-панель</span></i></a>-->
                                        <a class="userexit" href="../login/exit.php"><i class="fa-solid fa-arrow-right-from-bracket"><span>Вихід</span></i></a>
                                    </div>
                                </div>
                            </li>
                        <?php endif;?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div style="margin-top: 70px"; class="container">
        <div class="top-admin">
            <h1 style="font-size: 30px; text-transform: uppercase; ">Адміністративна панель</h1>
            <a href="../index.php" class="btn btn-dark">Вихід на головну</a>
        </div>
    <div style="margin-top: 30px;" class="tabs-wrapper">
        <div class="tabs-container">
            <div class="tabs__triggers">
                <a href="#tab-goods" class ="tabs__triggers__item">Товари</a>
                <a href="#tab-users" class ="tabs__triggers__item">Користувачі</a>
            </div>
            <div class="tabs__content">
                <div id="tab-goods" class="tabs__content__item tabs__content__item--active col">

                <div>
                    <a href="add-new.php" class="btn btn-success">Додати новину</a>
                </div>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Назва меблів</th>
                        <th scope="col">Редагування</th>
                        <th scope="col">Видалення</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM furniture";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $post):
                        ?>

                        <tr>
                            <th scope="row"><?=$post['id']?></th>
                            <td><?=$post['name']?></td>
                            <td><a href="edit-new.php?post_id=<?=$post['id']?>" class="btn btn-secondary">Редагувати</a></td>
                            <td><a href="delete.php?post_id=<?=$post['id'];?>" class="btn btn-danger">Видалити</a></td>
                        </tr>

                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
                <div id="tab-users" class="tabs__content__item col">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Email</th>
                        <th scope="col">Редагування</th>
                        <th scope="col">Видалення</th>
                    </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $post):
                        ?>
                        <tbody>
                        <tr>
                            <th scope="row"><?=$post['id']?></th>
                            <td><?=$post['email']?></td>
                            <td><a href="edit-new.php?post_id=<?=$post['id']?>" class="btn btn-secondary">Редагувати</a></td>
                            <td><a href="delete.php?post_id=<?=$post['id'];?>" class="btn btn-danger">Видалити</a></td>
                        </tr>
                        </tbody>
                    <?php endforeach;?>
                </table>
            </div>
            </div>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="../js/main.js"></script>


<script>
    // Переключення табів 2
    document.querySelectorAll('.tabs__triggers__item').forEach((item) =>
        item.addEventListener('click',function(e){
            e.preventDefault();
            const id = e.target.getAttribute('href').replace('#','');

            document.querySelectorAll('.tabs__triggers__item').forEach(
                (child) => child.classList.remove('tabs__triggers__item--active'));
            document.querySelectorAll('.tabs__content__item').forEach(
                (child) => child.classList.remove('tabs__content__item--active'));


            item.classList.add('tabs__triggers__item--active');
            document.getElementById(id).classList.add('tabs__content__item--active')
        }));
    document.querySelector('.tabs__triggers__item').click();
</script>
</body>
</html>