<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="学院君">

    <title><?=$pageTitle?></title>

    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href="/css/share.css" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/"><?=$siteName?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">首页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">关于</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">联系</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?=$album['image']?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?=$album['title']?></h1>
                    <span class="subheading"><?=$album['summary']?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($posts as $post): ?>
                <div class="post-preview">
                    <a href="/post?id=<?=$post['id']?>">
                        <h2 class="post-title">
                            <?=$post['title']?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?=$post['summary']?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted on <?=$post['created_at']?></p>
                </div>
                <hr>
            <?php endforeach;?>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="social-share"></div>
                <p class="copyright text-muted">Copyright &copy; <?=$siteName?> 2020</p>
            </div>
        </div>
    </div>
</footer>

<script src="/js/app.js"></script>
<script src="/js/share.js"></script>

</body>

</html>