<nav aria-label="Page navigation example">
    <ul class="pagination">
    <?php for($p=0;$p<$total_pages;$p++):?>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $p?>&type=<?php echo $type?>"><?php echo $p+1;?></a>
        </li>
    <?php endfor;?>
    </ul>
</nav>
