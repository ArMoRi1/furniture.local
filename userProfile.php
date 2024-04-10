<?php
    include('header.php');
?>
    <style>

    </style>
<div class="userProfile-wrapper">
    <div class="userProfile-container  container">
        <div class="userProfile-body">
            <div class="top-user">
                <h1 style="font-size: 30px; text-transform: uppercase;">Особистий кабінет</h1>
<!--                <p>#--><?//=GetIDUsingEmail($_SESSION['email']);?><!--</p>-->
                <a class="editProfile-button"  href="userProfileEdit.php"><i class="fa-solid fa-pen-to-square"><span>  Редагувати</span></i></a>
            </div>
            <div class="userInfo">
                <div class="userInfo-left userInfo-left-main">
                    <div class="userPhoto">
                        <?php if(empty($_SESSION['avatar'])):?>
                            <img src="img/database/usersAvatars/userImg-basic.png" alt="#">
                        <?php endif;?>
                        <?php if(!empty($_SESSION['avatar'])):?>
                            <img src="<?=$_SESSION['avatar']?>" alt="#">
                        <?php endif;?>

                        <input name="imgProfile" class ="imgProfile" type="file" id="exampleFormControlInput1" required>
                    </div>
                </div>
                <div class="userInfo-right">
                    <div class="userInitials">
                        <p><b>Користувач: </b><?=$_SESSION['user']?></p>
                    </div>
                    <div class="userEmail">
                        <p><b>Email: </b><?=$_SESSION['email']?></p>
                    </div>

                </div>
            </div>
            <div class="userOrders">
                <div class="table-container">
                    <table class="user-table">
                        <caption>
                            Ваші замовлення
                        </caption>
                        <thead>
                        <tr>
                            <th>ID замовлення</th>
                            <th>Номер телефону</th>
<!--                            <th>Email</th>-->
                            <th>Адреса відправки</th>
                            <th>Номер товару</th>
                            <th>Ціна(грн)</th>
                            <th>Дата</th>
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
//                        $sql = "SELECT * FROM orders WHERE email='" . mysqli_real_escape_string($conn, $_SESSION['email']) . "'";
                        $sql = "SELECT orders.*, furniture.price 
                                FROM orders 
                                JOIN furniture ON orders.productid = furniture.id
                                WHERE email='" . mysqli_real_escape_string($conn, $_SESSION['email']) . "'";
                        $result = mysqli_query($conn, $sql);

                        foreach($result as $order):
                        ?>
                        <tr>
                            <td><?=$order['id']?></td>
                            <td><?=$order['phonenumber']?></td>
<!--                            <td>--><?//=$order['email']?><!--</td>-->
                            <td><?=$order['address']?></td>
                            <td><a href="furnitureInfo.php?furniture_id=<?= $order['productid']?>"><?=$order['productid']?></a></td>
                            <td><?=$order['price']?></td>
                            <td><?=$order['orderDate']?></td>
                            <?php
                                if($order['status']==1) {
                                    echo "<td style='background-color: #7FFFD4;'>Нове</td>";
                                }
                            if($order['status']==2) {
                                echo "<td style='background-color: #6082B6;'>Не підтверджено</td>";
                            }
                            if($order['status']==3) {
                                echo "<td style='background-color: #7fff00;'>Підтверджено</td>";
                            }
                            if($order['status']==4) {
                                echo "<td style='background-color: #FFDB58;'>Відправлено</td>";
                            }
                            if($order['status']==5) {
                                echo "<td style='background-color: #50c878;'>Доставлено</td>";
                            }
                            if($order['status']==6) {
                                echo "<td style='background-color: #ff0000;'>Скасовано</td>";
                            }
                            ?>

                        </tr>
                        <?php
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
    include('footer.php');
?>