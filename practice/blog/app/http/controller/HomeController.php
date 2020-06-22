<?php
namespace App\Http\Controller;

use App\Model\Album;

class HomeController extends Controller
{
    // 应用首页
    public function index()
    {
        $albums = Album::all()->toArray();
        $pageTitle = $siteName = $this->container->resolve('app.name');
        $siteUrl = $this->container->resolve('app.url');
        $siteDesc = $this->container->resolve('app.desc');
        $this->view->render('home.php', [
            'albums' => $albums,
            'pageTitle' => $pageTitle,
            'siteName' => $siteName,
            'siteDesc' => $siteDesc,
            'siteUrl' => $siteUrl
        ]);
    }

    // 关于页面
    public function about()
    {
        $pageTitle = '关于我 - ' . $this->container->resolve('app.name');
        $siteName = $this->container->resolve('app.name');
        $this->view->render('about.php', compact('pageTitle', 'siteName'));
    }

    // 联系表单页面
    public function contact()
    {
        if ($this->request->getMethod() == 'GET') {
            $pageTitle = '联系我 - ' . $this->container->resolve('app.name');
            $siteName = $this->container->resolve('app.name');
            $this->view->render('contact.php', compact('pageTitle', 'siteName'));
        } else {
            // @todo 处理表单提交
        }
    }
}
