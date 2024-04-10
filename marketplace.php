<?php
include ('header.php');
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$type = isset($_GET['type']) ? $_GET['type'] : ''; // Учтите, что вам нужно получить значение типа.
$limit = 10;
//$total_pages = 0
$total_pages = ceil(countRowsByCategory($type) / $limit);
?>

<section class="marketplace-section">
    <div class="marketplace-container container">
        <div class="marketplace-body">

            <?php
            if ($type==1){
                echo '  <h1 class="marketplace-title">Кутові дивани</h1>
                            <div class="marketplace-subtitle">
                                <p>Кутові дивани від Фабрики Меблів Комфорт зможуть влучно доповнити інтер’єр вашої домівки. Оберіть саме свій диван з нашого модельного ряду, а також додайте виробу індивідуальності за рахунок широкої гами кольорів тканин.</p>
                            </div>';
            }
            else if ($type==2){
                echo '  <h1 class="marketplace-title">Прямі дивани</h1>
                            <div class="marketplace-subtitle">
                                <p>Купити диван який буде відповідати всім вашим вимогам – просто. «Фабрика Меблів Комфорт» пропонує широкий асортимент стильних, та сучасних моделей м’яких диванів від виробника. Тут ви знайдете прямі дивани у різних тканинах, та в широкій гамі кольорів. На кожен виріб ми надаємо гарантію підтверджену нашим 25 річним досвідом.</p>
                            </div>';
            }
            else if ($type==3){
                echo '  <h1 class="marketplace-title">Ліжка</h1>
                            <div class="marketplace-subtitle">
                               <p>М’які ліжка на сьогоднішній день є фаворитом багатьох покупців. Адже вони дають можливість максимально підлаштувати ваше спальне місце під стиль приміщення за рахунок різних орнаментів, форм та кольорів для узголів’я. А обравши ліжко від Фабрики Меблів Комфорт ви гарантовано отримаєте відмінну якість та ціну від виробник</p>
                            </div>';
            }
            ?>
            <?php include('include/pagination.php'); ?>
            <ul class="marketplace-cards-container">

                <?php $furnitures = get_furniture_by_category($type); ?>
                <?php for ($i = $page * $limit; $i < ($page + 1) * $limit && $i < count($furnitures); $i++): ?>
                    <?php $furniture = $furnitures[$i]; ?>
                    <?php
                    // Проверяем, соответствует ли тип мебели переменной $type
                    if ($furniture['category'] == $type):
                        ?>
                        <li class="item-container">
                            <a class="item-wrapper" href="furnitureInfo.php?furniture_id=<?= $furniture['id'] ?>">
                                <div class="item-body">

                                    <?php if(!$furniture['numberOfGood']) {
                                        echo "<p class='item-unavailable'>".'Немає готових товарів. Потрібен час для виготовлення'."</p>";
                                    }else{
                                        echo "<p class='item-available'>".'Є в наявності :)'."</p>";
                                    }
                                    ?>
                                    <div class="item-image">
                                        <img src="<?= $furniture['img1'] ?>" alt="...">
                                    </div>
                                    <p class="item-name"><?= $furniture['name'] ?></p>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>

            </ul>
            <?php include('include/pagination.php'); ?>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>

