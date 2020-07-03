<?php
namespace App\Http\Controller;

use App\Http\Exception\ValidationException;
use App\Http\Response;
use App\Model\Album;
use App\Model\Message;
use Carbon\Carbon;

class HomeController extends Controller
{
    // 应用首页
    public function index()
    {
        $albums = Album::all()->toArray();
        $pageTitle = $siteName = $this->siteName;
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
        $response = new Response('', 301, ['Location' => 'https://xueyuanjun.com/about-us']);
        $response->send();
    }

    // 联系表单页面
    public function contact()
    {
        if ($this->request->getMethod() == 'GET') {
            $pageTitle = '联系我 - ' . $this->container->resolve('app.name');
            $siteName = $this->container->resolve('app.name');
            $this->view->render('contact.php', compact('pageTitle', 'siteName'));
        } else {
            $name = $this->request->get('name');
            $email = $this->request->get('email');
            $phone = $this->request->get('phone');
            $content = $this->request->get('message');
            // 验证表单输入数据
            if (empty($name)) {
                throw new ValidationException('用户名不能为空');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new ValidationException('请输入正确的邮箱地址');
            }
            if (!preg_match('/^1[34578]{1}\d{9}$/', $phone)) {
                throw new ValidationException('请输入正确的手机号码');
            }
            if (empty($content)) {
                throw new ValidationException('消息内容不能为空');
            }
            $message = new Message();
            $message->name = filter_var($name, FILTER_SANITIZE_STRING);
            $message->email = $email;
            $message->phone = $phone;
            $message->content = filter_var($content, FILTER_SANITIZE_STRING);
            $message->created_at = Carbon::now();
            if ($message->save()) {
                (new Response('消息保存成功', 200))->send();
            }
            (new Response('保存消息失败，请重试！', 500))->send();
        }
    }
}