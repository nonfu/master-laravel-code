<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="sixapart-standard">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="generator" content="Movable Type  5.2.2"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="/css/album.css">
    <style>
        body {
            background-color: #f5f5d5;
        }
    </style>
    <title><?=$pageTitle?></title>
</head>
<body id="scrapbook" class="mt-main-index two-columns">
<div id="container">
    <div id="container-inner">


        <div id="header">
            <div id="header-inner">
                <div id="header-content">
                    <h1 id="header-name"><?=$siteName?></h1>
                </div>
            </div>
        </div>

        <div id="content">
            <div id="content-inner">

                <div id="alpha">
                    <div id="alpha-inner">


                        <div id="entry-2181" class="entry-asset asset hentry">
                            <div class="asset-header">
                                <h2 class="asset-name entry-title">
                                    <a href="/album?id=<?=$album['id']?>" rel="bookmark"><?=$album['title']?></a>
                                </h2>
                            </div>
                            <div class="asset-content entry-content">

                                <div class="asset-body">
                                    <p><?=$album['summary']?></p>
                                </div>
                            </div>
                        </div>

                        <div id="homepage">
                            <h3>最新文章</h3>
                            <ul>

                                <?php foreach ($posts as $post): ?>
                                <li class="module-list-item">
                                    <span><?=$post['created_at']?> » </span>
                                    <a href="/post?id=<?=$post['id']?>"><?=$post['title']?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div id="beta">
                    <div id="beta-inner">
                        <div class="module-categories module">
                            <h2 class="module-header">关于我</h2>
                            <div class="module-content">
                                <ul class="module-list">
                                    <p class="module-list-item">
                                        <img src="https://qcdn.xueyuanjun.com/storage/uploads/images/user/2019-10/thumbs-120-120/me.jpg" width="80" height="106" alt="个人照片"/>
                                    </p>
                                    <li class="module-list-item">
                                        专辑数：3
                                    </li>
                                    <li class="module-list-item">
                                        文章数：3
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="footer">
            <div id="footer-content">
                <p><a href="<?=$siteUrl?>">Contact</a> | xueyuanjun.com<span id="img_placer"></span> </p>
            </div>
        </div>

    </div>

</div>


</body>
</html>
