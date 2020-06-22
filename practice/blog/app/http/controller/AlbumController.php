<?php
namespace App\Http\Controller;

class AlbumController extends Controller
{
    public function list()
    {
        $id = intval($this->request->get('id'));
        if (empty($id)) {
            echo '请指定要访问的专辑 ID';
            exit();
        }
        $album = $this->connection->table('albums')->select($id);
        $posts = $this->connection->table('posts')->selectByWhere(['album_id' => $id]);
        $pageTitle = $siteName = $this->container->resolve('app.name');
        $siteUrl = $this->container->resolve('app.url');
        include __DIR__  . '/../../views/album.php';
    }
}
