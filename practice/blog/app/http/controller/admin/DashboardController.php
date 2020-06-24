<?php
namespace App\Http\Controller\Admin;

use App\Http\Controller\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has('auth_user')) {
            return redirect('/login');
        }
    }

    public function index()
    {
        $pageTitle = '管理后台 - ' . $this->container->resolve('app.name');
        $siteName = $this->container->resolve('app.name');
        $user = $this->session->get('auth_user');
        $this->view->render('admin/index.php', compact('pageTitle', 'siteName', 'user'));
    }
}