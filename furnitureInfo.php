<?php
require_once ('header.php');
$furniture_id = $_GET['furniture_id'];
if (!is_numeric($furniture_id)) exit();
$furniture = get_furniture_by_id($furniture_id);

$sht = "";
if($furniture['numberOfGood'] == 11){
    $sht = "штук";
}else if($furniture['numberOfGood'] == 1){
    $sht = "штука";
} else if(in_array($furniture['numberOfGood'], [2,3,4])){
    $sht = "штуки";
}else if(in_array($furniture['numberOfGood'], [5,6,7,8,9,10])){
    $sht = "штук";
}else if($furniture['numberOfGood']%10==1){
    $sht = "штука";
}else if($furniture['numberOfGood']%10==2 && $furniture['numberOfGood']%10==3 && $furniture['numberOfGood']%10==4){
    $sht = "штуки";
}else{
    $sht = "штук";
}
?>

    <section class="good-section">
        <div class="good-container container">
                <div class="good-body">
                    <div class="good-menu">
                        <div class="good-name">
                            <h1><?= $furniture['name']; ?></h1>

                            <?php if(!$furniture['numberOfGood']) {
                                echo " <p class='item-unavailable' style='padding: 0;'>На разі, товару нема на скаді. Після оформлення замовлення потрібно більше часу на доставку". "<?=".$furniture['numberOfGood']."?>!</p>";
                            }else{
                                echo " <p class='item-available' style='padding: 0;'>Встигни придбати, залишилось ".$furniture['numberOfGood']." ".$sht."!</p>";
                            }
                            ?>
                        </div>
                        <div class="good-menu__buttons">
                            <ul style="font-size: 33px;">
                                <li><a href="#"><i class="fa-regular fa-heart fa-fw"></i></a></li>
                                <li><a href="./makingorder.php?furniture_id=<?=$furniture_id?>"><i class="fa-solid fa-cart-shopping fa-fw"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="good-body__top" id="slider-2">
                        <div class="good-swiper-container swiper" id="swiper-2">
                            <!--                                ---->
                            <div class="goodprice-background"></div>
                            <p class="good-price"><i>₴<?=$furniture['price'];?></i></p>
                            <!--                                ---->
                            <div class="good-swiper-wrapper swiper-wrapper">

                                <div class="good-swiper__slide swiper-slide">
                                    <img src="<?= $furniture['img1']; ?>" alt="...">
                                </div>
                                <div class="good-swiper__slide swiper-slide">
                                    <img src="<?= $furniture['img2']; ?>" alt="...">
                                </div>
                                <?php if($furniture['img3']!=''):?>
                                    <div class="good-swiper__slide swiper-slide">
                                        <img src="<?= $furniture['img3']; ?>" alt="...">
                                    </div>
                                <?php endif;?>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>


                    <div class="good-body__bottom">
                        <div class="good-tabs__wrapper">
                            <div class="tabs__body">
                                <nav class="tabs-triggers">
                                    <a href="#tab_01"  class="tabs-triggers__item">Характеристики</a>
                                    <a href="#tab_02"  class="tabs-triggers__item">Опис</a>
                                    <a href="#tab_03"  class="tabs-triggers__item">Демонстрація</a>
                                </nav>
                                <div class="tabs-content">
                                    <div id="tab_01" class="tabs-content__item">
                                        <div class="block__table">
                                            <table>
                                                <tr>
                                                    <th>Розміри</th>
                                                    <th>Каркас</th>
                                                    <th>Наповнення</th>
                                                    <th>Спальна площа</th>
                                                </tr>
                                                <tr>
                                                    <td><?= ($furniture['size']);?></td>
                                                    <td><?= ($furniture['karkass']);?></td>
                                                    <td><?= ($furniture['filling']);?></td>
                                                    <td><?= ($furniture['bedsquare']);?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab_02" class="tabs-content__item">
                                        <div class="block__description">
                                            <p>
                                                <?php
                                                $text = $furniture['content'];
                                                $text = nl2br($text);
                                                echo $text;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="tab_03" class="tabs-content__item">
                                        <div class="block-video">
                                            <img src="<?= $furniture['video']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
<?php
require_once ('footer.php');
?>