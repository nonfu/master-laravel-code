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
    <title><?=$pageTitle?></title>
</head>
<body id="scrapbook" class="mt-entry-archive one-column">
<div id="container">
    <div id="container-inner">

        <div id="header">
            <div id="header-inner">
                <div id="header-content">
                    <div id="header-name">
                        <span id="site_location"> » <a href="/" accesskey="1">首页</a></span>
                        <span id="site_archive"> » <a href="/album?id=<?=$post['album_id']?>">专辑</a></span>
                    </div>
                </div>
            </div>
        </div>


        <div id="content">
            <div id="content-inner">

                <div id="alpha">
                    <div id="alpha-inner">

                        <div id="entry-2180" class="entry-asset asset hentry">
                            <div class="asset-header">
                                <div class="asset-nav entry-nav">
                                    <div class="entry-categories">
                                        <p>专辑<span class="delimiter">：</span></p>
                                        <ul>
                                            <li><a href="/album?id=<?=$post['album_id']?>" rel="tag"><?=$album['title']?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <article class="hentry">
                                <h1 id="page-title" class="asset-name entry-title"><?=$post['title']?></h1>

                                <div class="asset-meta">
                                    <p class="vcard author">作者： <a class="fn url" href="/">学院君</a></p>
                                    <p>日期： <abbr class="published"><?=$post['created_at']?></abbr></p>
                                </div>

                                <div class="asset-content entry-content" id="main-content">
                                    <?=$post['content']?>
                                </div>

                                <div class="asset-footer">
                                    <h3>文档信息</h3>
                                    <ul>
                                        <li>版权声明：自由转载-非商用-非衍生-保持署名（<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）
                                        </li>
                                        <li>发表日期： <abbr class="published"><?=$post['created_at']?></abbr></li>
                                    </ul>
                                </div>
                            </article>
                        </div>

                        <div id="comments" class="comments">
                            <!--留言功能，待实现-->
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div id="footer">
            <div id="footer-inner">
                <div id="footer-content">
                    <p><a href="<?= $container->resolve('app.url') ?>">Contact</a> | xueyuanjun.com<span
                                id="img_placer"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
