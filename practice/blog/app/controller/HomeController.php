<?php
namespace App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $albums = $this->connection->table('albums')->selectAll();
        $pageTitle = $siteName = $this->container->resolve('app.name');
        $siteUrl = $this->container->resolve('app.url');
        $siteDesc = $this->container->resolve('app.desc');
        include __DIR__  . "/../../views/home.php";
    }
}