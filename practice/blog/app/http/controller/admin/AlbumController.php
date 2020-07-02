<?php
namespace App\Http\Controller\Admin;


use App\Model\Album;

class AlbumController extends AdminController
{
    public function index()
    {
        $page = intval($this->request->get('page'));
        $pageTitle = '管理后台 - 专辑列表';
        $siteName = $this->container->resolve('app.name');
        $albumsTotalNums = Album::count();
        $itemsPerPage = 2;
        $albumsTotalPage = ceil($albumsTotalNums / $itemsPerPage);
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $albumsTotalPage) {
            $page = $albumsTotalPage;
        }
        $albums = Album::orderBy('id', 'desc')->offset(($page - 1) * $itemsPerPage)->limit($itemsPerPage)->get();
        $this->view->render('admin/album/index.php', [
            'pageTitle' => $pageTitle,
            'siteName' => $siteName,
            'user' => $this->authUser,
            'messages' => $this->messages,
            'page' => $page,
            'total' => $albumsTotalPage,
            'albums' => $albums
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