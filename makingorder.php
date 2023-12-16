<?php
include ("./header.php");
$furnitures = get_furniture();
$furnitures_category = get_furniture_by_category(1);
?>
<div class="order-wrapper">
    <div class="order-container container">
        <div class="order-body">
            <form class="orderForm" action="./orderForm.php"  method="post">
                <h2>Оформлення замовлення</h2>
                <div class="order-info">
                    <div class="order-info__item">
                        <input placeholder="Ім'я" type="text" id="firstname" name="firstname" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <input placeholder="Прізвище" type="text" id="lastname" name="lastname" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <input placeholder="Номер телефону" type="text" id="phonenumber" name="phonenumber" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <input placeholder="Email" type="email" id="email" name="email" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <input placeholder="Адреса проживання" type="text" id="address" name="address" required><br><br>
                    </div>
                    <div class="order-info__item">
                        <select id="product" name="products" required >
                            <option value disabled selected hidden>Виберіть товар</option>
                            <?php for($i = 1;$i<=3;$i++):?>
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
                                        <option value="<?php $furniture['id']?>"><?php echo $furniture['name']?></option>
                                    <?php endforeach;?>
                                </optgroup>
                            <?php endfor;?>
                        </select>
                        <br><br>
                    </div>
                </div>
                <div class="order-buttons">
                    <button type="submit" id="submitBtn">Submit Order</button>
                    <button type="button" id="cancelBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
//include ("./footer.php");
//?>
