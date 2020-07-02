<?php
namespace App\Http\Controller\Admin;

class DashboardController extends AdminController
{
    public function index()
    {
        $pageTitle = '管理后台 - ' . $this->container->resolve('app.name');
        $siteName = $this->container->resolve('app.name');
        $this->view->render('admin/index.php', [
            'pageTitle' => $pageTitle,
            'siteName' => $siteName,
            'user' => $this->authUser,
            'messages' => $this->messages
        ]);
    }
}