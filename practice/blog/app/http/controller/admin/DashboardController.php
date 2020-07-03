<?php
namespace App\Http\Controller\Admin;

class DashboardController extends AdminController
{
    public function index()
    {
        $pageTitle = '管理后台 - ' . $this->siteName;
        $this->view->render('admin/index.php', [
            'pageTitle' => $pageTitle,
            'siteName' => $this->siteName,
            'user' => $this->authUser,
            'messages' => $this->messages
        ]);
    }
}