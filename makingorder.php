<?php
include ("header.php");
//var_dump($_SESSION);

$furnitures = get_furniture();
$furnitures_category = get_furniture_by_category(1);
$furniture_id = $_GET['furniture_id'];
?>

<div class="order-wrapper">
    <div class="order-container container">
        <div class="order-body">
            <form class="orderForm" action="./orderForm.php"  method="post">
                <h2>Оформлення замовлення</h2>
                <div class="order-info">
                    <div class="order-info__item">
                        <input value="<?php if(!empty($_SESSION)):echo $_SESSION['usersurname'];endif;?>" placeholder="Прізвище" type="text" id="lastname" name="usersurname" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <input value="<?php if(!empty($_SESSION)):echo $_SESSION['username'];endif;?>" placeholder="Ім'я" type="text" id="firstname" name="username" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <input placeholder="Номер телефону" type="text" id="phonenumber" name="phonenumber" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <input  value="<?php if(!empty($_SESSION)):echo $_SESSION['email'];endif;?>" placeholder="Email" type="email" id="email" name="email" required readonly><br><br>
                    </div>
                    <div class="order-info__item">
                        <input placeholder="Адреса проживання" type="text" id="address" name="address" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <select id="product" name="productid" required >
                            <?php if($_GET['x']):?>
                                <option value disabled selected hidden>Виберіть товар</option>
                            <?php endif;
                            for($i = 1;$i<=3;$i++):?>
                                <?php $furnitures_category = get_furniture_by_category($i);?>
                                <optgroup label="
                                <?php
                                    if($i==1){
                                        echo "Кутові дивани";
                                    } else if($i==2){
                                        echo "Прямий дивани";
                                    } else if($i==3){
                                    echo "Ліжка";
                                }
                                ?>">
                                    <?php foreach ($furnitures_category as $furniture):?>
                                        <option <?php if($furniture['id']===$_GET['furniture_id']):?> selected <?php endif;?> value="<?php echo $furniture['id']?>"><?php echo $furniture['name']?></option>
                                    <?php endforeach;?>
                                </optgroup>
                            <?php endfor;?>
                        </select>
                        <br><br>
                    </div>
                </div>
                <style>
                    .order-buttons a{
                        display: inline-block;
                        background-color: #70afc1;
                        color: #fff;
                        padding: 10px 20px;
                        text-decoration: none;
                        text-align: center;

                    }
                    .order-buttons a:hover {

                        background-color: #418598;
                    }
                </style>
                <div class="order-buttons">
<!--                     --><?php // var_dump($_SESSION);
                     if(empty($_SESSION)):?>
                         <p>Для замовлення потрібно зареєструватись</p>
                         <a style=" text-align: center; text-decoration: none;" href="login/registration.php" > Реєструйтесь тут.</a>
                     <?php else:?>
                         <button type="submit" id="submitBtn">Підтвердити</button>
                         <button type="button" id="cancelBtn">Відмінити</button>
                     <?php endif;?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include ("./footer.php");
?>
