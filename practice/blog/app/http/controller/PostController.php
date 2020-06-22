<?php
namespace App\Http\Controller;

class PostController extends Controller
{
    public function show()
    {
        $id = intval($this->request->get('id'));
        if (empty($id)) {
            echo '请指定要访问的文章 ID';
            exit();
        }
        $post = $this->connection->table('posts')->select($id);
        $printer = $this->container->resolve(\App\Printer\PrinterContract::class);
        if ($this->container->resolve('app.editor') == 'markdown') {
            $post['content'] = $printer->driver('markdown')->render($post['text']);
        } else {
            $post['content'] = $printer->render($post['html']);
        }
        $album = $this->connection->table('albums')->select($post['album_id']);
        $pageTitle = $post['title'] . ' - ' . $this->container->resolve('app.name');
        $siteUrl = $this->container->resolve('app.url');
        $this->view->render('post.php', compact('post', 'album', 'pageTitle', 'siteUrl'));
    }
}
