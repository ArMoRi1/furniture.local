<?php
include('header.php');
global $conn;
//$furnitures = get_furniture();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$type = isset($_GET['type']) ? $_GET['type'] : ''; // Учтите, что вам нужно получить значение типа.
$limit = 10;
$total_pages = ceil(countRows($type) / $limit);

//$keywords = $_POST['keywords'];

if(isset($_POST['submitKeywords'])){
    $search = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['keywords']))));
    $sql = trim("SELECT * FROM furniture WHERE (`name` LIKE '%".trim(strtolower($search))."%') OR (`img1` LIKE '%".trim(strtolower($search))."%') OR (`img2` LIKE '%".trim(strtolower($search))."%') OR (`img3` LIKE '%".trim(strtolower($search))."%') ");
    $query = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_assoc($query);
}
?>

<section style="margin-top:100px;" class="marketplace-section">
    <div class="marketplace-container container">
        <div class="marketplace-body">
            <br>            <br>
            <h1 class="marketplace-title">Результати пошуку за запитом: "<?php echo $search; ?>"</h1>
            <br>            <br>
            <ul class="marketplace-cards-container">
                <?php ;while($furniture = mysqli_fetch_array($query)){?>
<!--                        --><?php //foreach ($furniture as $i):
//                            echo $i."<br>___";
//                        endforeach;?>
                        <li class="item-container">
                            <a class="item-wrapper" href="furnitureInfo.php?furniture_id=<?= $furniture['id'] ?>">
                                <div class="item-body">
                                    <div class="item-image">
                                        <img src="<?= $furniture['img1'] ?>" alt="...">
                                    </div>
                                    <p class="item-name"><?= $furniture['name'] ?></p>
                                </div>
                            </a>
                        </li>
                <?php } ?>
            </ul>
<!--            <nav aria-label="Page navigation example">-->
<!--                <ul class="pagination">-->
<!--                    --><?php //for($p=0;$p<$total_pages;$p++):?>
<!--                        <li class="page-item">-->
<!--                            <a class="page-link" href="?page=--><?php //echo $p?><!--">--><?php //echo $p+1;?><!--</a>-->
<!--                        </li>-->
<!--                    --><?php //endfor;?>
<!--                </ul>-->
<!--            </nav>-->

        </div>
    </div>
</section>

<?php
include('footer.php');
?>