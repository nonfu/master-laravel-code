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
                        <h6 class="m-0 font-weight-bold text-primary">消息列表</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>手机号</th>
                                    <th>消息内容</th>
                                    <th>发送时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($all_messages as $message):?>
                                    <tr>
                                        <td><?=$message->id?></td>
                                        <td><?=$message->name?></td>
                                        <td><?=$message->email?></td>
                                        <td><?=$message->phone?></td>
                                        <td><?=htmlentities($message->content)?></td>
                                        <td><?=$message->created_at?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" role="button" class="btn btn-danger btn-delete" data-id="<?=$message->id?>">删除</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        $pageType = 'messages';
                        include __DIR__ . '/../pagination.php';
                        ?>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php
        $itemType = 'message';
        include __DIR__ . '/../delete.php';
        include __DIR__ . '/../footer.php';
        ?>
