<?php
namespace App\Http\Controller;

use App\Model\Album;

class HomeController extends Controller
{
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
}
