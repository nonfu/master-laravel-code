<!--分页-->
<?php if ($total > 1):?>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page == 1): echo 'disabled'; endif;?>">
                <a class="page-link" href="/admin/<?=$pageType?>?page=<?=($page - 1)?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $total; $i++) { ?>
                <li class="page-item <?php if ($page == $i): echo 'active'; endif;?>">
                    <a class="page-link" href="/admin/<?=$pageType?>??page=<?=$i?>"><?=$i?></a>
                </li>
            <?php } ?>
            <li class="page-item <?php if ($page >= $total): echo 'disabled'; endif;?>">
                <a class="page-link" href="/admin/<?=$pageType?>?=<?=($page + 1)?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif;?>