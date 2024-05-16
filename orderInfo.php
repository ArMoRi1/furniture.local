<?php
include('header.php');
$orderId = $_GET['order_id'];
$order = getOrderById($orderId);
$statusName = getStatusName($order[0]['status']);
echo $statusName;
?>

<style>
    th:first-child, td:first-child {
        width: 50%;
    }
    .btn-danger-box{
        margin-top: 15px;
        display: flex;
        justify-content: center;
    }
    .btn-danger{
        background-color: #ff0000!important;
    }
    .btn-danger:hover{
        background-color: darkred!important;
    }
</style>
<div class="userProfile-wrapper">
    <div class="userProfile-container  container">
        <div class="userProfile-body">
            <div class="top-user">
                <h1 style="font-size: 30px; text-transform: uppercase;">Інформація про замовлення</h1>
                <!--                <p>#--><?//=GetIDUsingEmail($_SESSION['email']);?><!--</p>-->
                <p style="font-size: 25px;">#<?= $order['0']['id'];?></p>
            </div>
            <?php foreach($order as $orderStat):
//                $statusName = getStatusName($orderStat['status']);?>

            <table style="width: 100%; margin-top: 20px;">
                <tbody>
                    <tr>
                        <th>Данні</th>
                        <th>Значення</th>
                    </tr>
                    <tr>
                        <td>Прізвище</td>
                        <td><?= $orderStat['usersurname'];?></td>
                    </tr>
                    <tr>
                        <td>Ім'я</td>
                        <td><?= $orderStat['username'];?></td>
                    </tr>
                    <tr>
                        <td>Номер телефону</td>
                        <td><?= $orderStat['phonenumber'];?></td>
                    </tr>
                    <tr>
                        <td>Адреса</td>
                        <td><?= $orderStat['address'];?></td>
                    </tr>
                    <tr>
                        <td>Номер товару</td>
                        <td><?= $orderStat['productid'];?></td>
                    </tr>
                    <tr>
                        <td>Дата Замовлення</td>
                        <td><?= $orderStat['orderDate'];?></td>
                    </tr>
                    <tr>
                        <td>Статус замовлення</td>
                    <?php
                    if($orderStat['status']==1) {
                        echo "<td style='background-color: #7FFFD4;'>";
                    }
                    if($orderStat['status']==2) {
                        echo "<td style='background-color: #6082B6;'>Не";
                    }
                    if($orderStat['status']==3) {
                        echo "<td style='background-color: #7fff00;'>";
                    }
                    if($orderStat['status']==4) {
                        echo "<td style='background-color: #FFDB58;'>";
                    }
                    if($orderStat['status']==5) {
                        echo "<td style='background-color: #50c878;'>";
                    }
                    if($orderStat['status']==6) {
                        echo "<td style='background-color: #ff0000;'>";
                    }
                    ?>

                        <?php echo $statusName;?></td>
                    </tr>
                </tbody>
            </table>
            <?php endforeach;?>
            <div class="btn-danger-box">
                <a class="header__link userlogin btn btn-danger" href = "userProfile/cancelGood.php?order_id=<?= $orderId?>" type="button">Відмінити</a>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
