<?php
namespace App\Http\Controller;

use App\Model\Album;
use App\Model\Post;

class AlbumController extends Controller
{
    public function list()
    {
        $id = intval($this->request->get('id'));
        if (empty($id)) {
            echo '请指定要访问的专辑 ID';
            exit();
        }
        $album = Album::with('posts')->findOrFail($id)->toArray();
        $posts = $album['posts'];
        $pageTitle = $siteName = $this->container->resolve('app.name');
        $siteUrl = $this->container->resolve('app.url');
        $this->view->render('album.php', compact('album', 'posts', 'pageTitle', 'siteName', 'siteUrl'));
    }
}
