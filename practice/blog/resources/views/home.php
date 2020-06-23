<?php include 'header.php';?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/image/bg.jpeg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?=$siteName?></h1>
                    <span class="subheading"><?=$siteDesc?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($albums as $album): ?>
            <div class="post-preview">
                <a href="/album?id=<?=$album['id']?>">
                    <h2 class="post-title">
                        <?=$album['title']?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?=$album['summary']?>
                    </h3>
                </a>
            </div>
            <hr>
            <?php endforeach;?>
        </div>
    </div>
</div>

<hr>

<?php include 'footer.php';?>

</body>

</html>