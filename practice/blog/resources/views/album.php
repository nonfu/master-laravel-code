<?php include 'header.php';?>

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

<?php include 'footer.php';?>

</body>

</html>