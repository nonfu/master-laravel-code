<?php
namespace App\Http\Controller\Admin;


use App\Model\Post;

class PostController extends AdminController
{
    public function index()
    {
        $page = intval($this->request->get('page'));
        $pageTitle = '管理后台 - 文章列表';
        $totalNums = Post::count();
        $totalPage = ceil($totalNums / $this->itemsPerPage);
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $totalPage) {
            $page = $totalPage;
        }
        $posts = Post::orderBy('id', 'desc')->offset(($page - 1) * $this->itemsPerPage)->limit($this->itemsPerPage)->get();
        $this->view->render('admin/post/index.php', [
            'pageTitle' => $pageTitle,
            'siteName' => $this->siteName,
            'user' => $this->authUser,
            'messages' => $this->messages,
            'page' => $page,
            'total' => $totalPage,
            'posts' => $posts
        ]);
    }

    public function add()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}