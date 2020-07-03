<?php
namespace App\Http\Controller;

use App\Model\Post;
use App\Printer\PrinterContract;

class PostController extends Controller
{
    public function show()
    {
        $id = intval($this->request->get('id'));
        if (empty($id)) {
            echo '请指定要访问的文章 ID';
            exit();
        }
        $post = Post::with('album')->findOrFail($id)->toArray();
        $printer = $this->container->resolve(PrinterContract::class);
        if ($this->container->resolve('app.editor') == 'markdown') {
            $post['content'] = $printer->driver('markdown')->render($post['text']);
        } else {
            $post['content'] = $printer->render($post['html']);
        }
        $album = $post['album'];
        $pageTitle = $post['title'] . ' - ' . $this->siteName;
        $siteName = $this->siteName;
        $siteUrl = $this->container->resolve('app.url');
        $this->view->render('post.php', compact('post', 'album', 'pageTitle', 'siteName', 'siteUrl'));
    }
}
