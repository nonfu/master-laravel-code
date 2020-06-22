<?php
namespace App\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $albums = $this->connection->table('albums')->selectAll();
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
