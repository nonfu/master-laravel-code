<?php include __DIR__ . '/../header.php';?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include __DIR__ . '/../sidebar.php';?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include __DIR__ . '/../nav.php';?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">专辑列表</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>封面图</th>
                                    <th>名称</th>
                                    <th>介绍</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($albums as $album):?>
                                <tr>
                                    <td><?=$album->id?></td>
                                    <td><?=$album->image?></td>
                                    <td><?=$album->title?></td>
                                    <td><?=$album->summary?></td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!--分页-->
                        <?php if ($total > 1):?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item  <?php if ($page == 1): echo 'disabled'; endif;?>">
                                    <a class="page-link" href="/admin/albums?page=<?=($page - 1)?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total; $i++) { ?>
                                    <li class="page-item  <?php if ($page == $i): echo 'active'; endif;?>">
                                        <a class="page-link" href="/admin/albums?page=<?=$i?>"><?=$i?></a>
                                    </li>
                                <?php } ?>
                                <li class="page-item  <?php if ($page >= $total): echo 'disabled'; endif;?>">
                                    <a class="page-link" href="/admin/albums?page=<?=($page + 1)?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <?php endif;?>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include __DIR__ . '/../footer.php';?>
