<?php include 'header.php';?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?=$post['image']?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?=$post['title']?></h1>
                    <span class="meta">Posted on <?=$post['created_at']?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?=$post['content']?>
            </div>
        </div>
    </div>
</article>

<hr>

<?php include 'footer.php';?>

</body>

</html>