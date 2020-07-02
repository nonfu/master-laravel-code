<?php
namespace App\Http\Controller\Admin;

class DashboardController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has('auth_user')) {
            redirect('/login');
        }
    }

    public function index()
    {
        $pageTitle = '管理后台 - ' . $this->container->resolve('app.name');
        $siteName = $this->container->resolve('app.name');
        $user = $this->session->get('auth_user');
        $this->view->render('admin/index.php', [
            'pageTitle' => $pageTitle,
            'siteName' => $siteName,
            'user' => $user,
            'messages' => $this->messages
        ]);
    }
}