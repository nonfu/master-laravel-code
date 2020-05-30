<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="sixapart-standard">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="generator" content="Movable Type  5.2.2"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../css/album.css">
    <style>
        body {
            background-color: #f5f5d5;
        }
    </style>
    <title><?= $container->resolve('app.name') ?></title>
</head>
<body id="scrapbook" class="mt-main-index two-columns">
<div id="container">
    <div id="container-inner">


        <div id="header">
            <div id="header-inner">
                <div id="header-content">
                    <h1 id="header-name"><?= $container->resolve('app.name') ?></h1>
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
                                    <a href="<?=$album['url']?>" rel="bookmark"><?=$album['title']?></a>
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

                                <?php foreach ($posts as $id => $post): ?>
                                <li class="module-list-item">
                                    <span><?=$post['created_at']?> » </span>
                                    <a href="/post?id=<?=$id?>"><?=$post['title']?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div id="beta">
                    <div id="beta-inner">
                        <div class="module-comments module" id="latest-comments">
                            <h2 class="module-header">最新留言</h2>
                            <div class="module-content">
                                <ul class="module-list">

                                    <li class="module-list-item">

                                        <a href="http://www.ruanyifeng.com/blog/2020/05/weekly-issue-109.html#comment-418744"
                                           title="科技爱好者周刊（第 109 期）：播客的价值" tooltip="很期待特技机器人表演,头一次发现还有这样的存在……">陈惟然</a>

                                    </li>

                                    <li class="module-list-item">

                                        <a href="http://www.ruanyifeng.com/blog/2020/04/ipod-history.html#comment-418743"
                                           title="苹果往事：乔布斯和 iPod 的诞生" tooltip="每周都追你的博客,真的好啊……">陈惟然</a>

                                    </li>

                                    <li class="module-list-item">

                                        <a href="http://www.ruanyifeng.com/blog/2020/05/will-programmers-increase.html#comment-418665"
                                           title="软件吃软件，编程工作会越来越多吗？" tooltip="入门级程序员的需求会越来越少是真话。……">Jacob</a>

                                    </li>

                                    <li class="module-list-item">

                                        <a href="http://www.ruanyifeng.com/blog/2014/03/undefined-vs-null.html#comment-418664"
                                           title="undefined与null的区别" tooltip="console.log(a)所显示的内容分析：
undefined表示变量a已经申明但从未被赋过值。
null表示变量a……">soulkiller</a>

                                    </li>

                                    <li class="module-list-item">

                                        <a href="http://www.ruanyifeng.com/blog/2020/05/weekly-issue-109.html#comment-418661"
                                           title="科技爱好者周刊（第 109 期）：播客的价值" tooltip="
引用yazhou的发言：

特斯拉反向充电那个我很疑惑，去充电的都是快没电了才去充，哪里有多余的电可以给电站？



……">Frank</a>

                                    </li>

                                    <li class="module-list-item">

                                        <a href="http://www.ruanyifeng.com/blog/2020/05/weekly-issue-109.html#comment-418659"
                                           title="科技爱好者周刊（第 109 期）：播客的价值"
                                           tooltip="脑机接口的概念，个人能了解到最早出现在89年的 攻壳机动队 这部作品……">羽·書</a>

                                    </li>

                                    <li class="module-list-item">

                                        <a href="http://www.ruanyifeng.com/blog/2020/05/weekly-issue-109.html#comment-418657"
                                           title="科技爱好者周刊（第 109 期）：播客的价值" tooltip="
引用兴杰的发言：

记得之前有介绍过一个 github 的项目。
一个在线填笔记的工具，特点是需要用户不停的写，一但……">deppwang</a>

                                    </li>

                                    <li class="module-list-item">
                                        <a href="http://www.ruanyifeng.com/blog/2020/05/weekly-issue-108.html#comment-418656"
                                           title="科技爱好者周刊（第 108 期）：阵地战与奇袭战" tooltip="阮老师简直就是我男神哇……">大盛子</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="module-categories module">
                            <h2 class="module-header">关于</h2>
                            <div class="module-content">
                                <ul class="module-list">
                                    <p class="module-list-item"><a
                                                href="http://www.ruanyifeng.com/blog/images/person_shot.jpg"
                                                onclick="window.open('http://www.ruanyifeng.com/blog/images/person2.jpg','popup','width=480,height=640,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0'); return false"><img
                                                    src="http://www.ruanyifeng.com/blog/images/person2_s.jpg" width="80"
                                                    height="106" alt="个人照片"/></a>
                                    </p>
                                    <!--li class="module-list-item"><a href="/about.html">个人简介</a>，<a href="2015/02/turing-interview.html" target="_blank">访谈</a></li-->
                                    <!--li class="module-list-item">Email：<br /><a href="mailto:yifeng.ruan@gmail.com">yifeng.ruan@gmail.com</a></li-->
                                    <li class="module-list-item">文章：<a
                                                href="http://www.ruanyifeng.com/blog/archives.html">1887</a></li>
                                    <li class="module-list-item">留言：56981</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="footer">
            <div id="footer-inner">
                <div id="footer-content">

                </div>
            </div>
        </div>

    </div>

</div>


</body>
</html>
