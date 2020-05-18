<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/home.css" type="text/css" />
    <title><?=APP_NAME?></title>
</head>

<body id="classic-website" class="mt-main-index one-column">
<div id="container">
    <div id="container-inner">

        <div id="header">
            <div id="header-inner">
                <div id="header-content">
                    <h1><?=APP_NAME?></h1>
                    <p><?=APP_DESC?></p>
                </div>
            </div>
        </div>

        <div id="content">
            <div id="content-inner">
                <div id="alpha">
                    <div id="alpha-inner">
                        <div id="page-alpha" style="margin-bottom:2em;">
                            <?php foreach ($items as $item): ?>
                            <p>» <a href="<?=$item['url']?>"><?=$item['title']?></a> </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <div id="footer-inner">
                <div id="footer-content">
                    <p><a href="<?=APP_URL?>">Contact</a> | xueyuanjun.com<span id="img_placer"></span> </p>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
