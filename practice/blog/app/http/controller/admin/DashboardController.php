<?php
namespace App\Http\Controller\Admin;

use App\Http\Controller\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = '管理后台 - ' . $this->container->resolve('app.name');
        $siteName = $this->container->resolve('app.name');
        $this->view->render('admin/index.php', compact('pageTitle', 'siteName'));
    }
}