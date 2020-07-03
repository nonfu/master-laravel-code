<?php
namespace App\Http\Controller;


use App\Http\Response;
use App\Model\User;

class AuthController extends Controller
{
    public function login()
    {
        if ($this->session->has('auth_user')) {
            // 用户已登录，跳转到管理后台
            $response = new Response('', 302, ['Location' => '/admin']);
            $response->prepare($this->request)->send();
            return;
        }
        $siteName = $this->siteName;
        $pageTitle = '登录页面 - ' . $siteName;
        if ($this->request->getMethod() == 'GET') {
            $this->view->render('admin/login.php', compact('siteName', 'pageTitle'));
        } else {
            $name = $this->request->get('name');
            $password = $this->request->get('password');
            if (empty($name) || empty($password)) {
                $error = '用户名和密码不能为空';
                $this->view->render('admin/login.php', compact('siteName', 'pageTitle', 'error'));
                return;
            }
            $user = User::where('name', $name)->first();
            if (empty($user)) {
                // 返回到用户登录页面，并提示错误信息
                $error = '对应用户不存在，请重试';
                $this->view->render('admin/login.php', compact('siteName', 'pageTitle', 'error'));
                return;
            }
            if ($user->password == md5($password)) {
                // 用户登录成功
                $this->session->set('auth_user', $user);
                // 跳转到管理后台
                $response = new Response('', 302, ['Location' => '/admin']);
                $response->prepare($this->request)->send();
                return;
            }
            // 返回到用户登录页面，并提示错误信息
            $error = '用户名和密码不匹配，请重试';
            $this->view->render('admin/login.php', compact('siteName', 'pageTitle', 'error', 'name'));
            return;
        }
    }

    public function logout()
    {
        if ($this->session->has('auth_user')) {
            $this->session->remove('auth_user');
            $this->session->invalidate();
        }
        return redirect('/login');
    }
}