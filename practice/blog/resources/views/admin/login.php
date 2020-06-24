<?php include 'header.php';?>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">学院君管理后台</h1>
                                </div>
                                <form class="user" action="/login" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name" name="name" aria-describedby="emailHelp" placeholder="用户名" value="<?php echo empty($name) ? '' : $name;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="密码">
                                    </div>
                                    <?php if (!empty($error)):?>
                                    <div class="alert alert-danger" role="alert">
                                        <?=$error?>
                                    </div>
                                    <?php endif;?>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        登录
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include 'footer.php';?>
