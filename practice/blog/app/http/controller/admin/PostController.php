<?php
namespace App\Http\Controller\Admin;


use App\Http\Exception\ValidationException;
use App\Model\Album;
use App\Model\Post;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use function Couchbase\defaultDecoder;

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
        $posts = Post::with('album')->orderBy('id', 'desc')->offset(($page - 1) * $this->itemsPerPage)->limit($this->itemsPerPage)->get();
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
        $pageTitle = '管理后台 - 新增文章';
        $albums = Album::select('id', 'title')->get();
        if ($this->request->getMethod() == 'GET') {
            $this->view->render('admin/post/new.php', [
                'pageTitle' => $pageTitle,
                'siteName' => $this->siteName,
                'user' => $this->authUser,
                'messages' => $this->messages,
                'albums' => $albums
            ]);
        } else {
            $title = $this->request->get('title');
            $album_id = $this->request->get('album_id');
            $text = $this->request->get('text');
            $image = $this->request->files->get('image');
            $this->validate($title, $album_id, $text, $image);
            $post = new Post();
            $post->title = $title;
            $post->album_id = $album_id;
            $post->text = $text;
            $post->created_at = Carbon::now();
            $post->image = '/image/' . $image->getClientOriginalName();
            if ($post->save()) {
                redirect('/admin/posts');
            } else {
                $this->view->render('admin/post/new.php', [
                    'pageTitle' => $pageTitle,
                    'siteName' => $this->siteName,
                    'user' => $this->authUser,
                    'messages' => $this->messages,
                    'albums' => $albums,
                    'error' => '文章保存失败，请重试',
                    'title' => $title,
                    'text' => $text
                ]);
            }
        }
    }

    public function edit()
    {
        $pageTitle = '管理后台 - 编辑文章';
        $id = $this->request->get('id');
        $post = Post::findOrFail($id);
        $albums = Album::select('id', 'title')->get();
        if ($this->request->getMethod() == 'GET') {
            $this->view->render('admin/post/edit.php', [
                'pageTitle' => $pageTitle,
                'siteName' => $this->siteName,
                'user' => $this->authUser,
                'messages' => $this->messages,
                'post' => $post,
                'albums' => $albums
            ]);
        } else {
            $title = $this->request->get('title');
            $album_id = $this->request->get('album_id');
            $text = $this->request->get('text');
            $image = $this->request->files->get('image');
            $origin_image = $this->request->get('origin_image');
            $this->validate($title, $album_id, $text, $image, $origin_image);
            $post->title = $title;
            $post->album_id = $album_id;
            $post->text = $text;
            if (empty($post->created_at)) {
                $post->created_at = Carbon::now();
            }
            if (!empty($image)) {
                $post->image = '/image/' . $image->getClientOriginalName();
            }
            if ($post->save()) {
                redirect('/admin/posts');
            } else {
                $this->view->render('admin/post/edit.php', [
                    'pageTitle' => $pageTitle,
                    'siteName' => $this->siteName,
                    'user' => $this->authUser,
                    'messages' => $this->messages,
                    'error' => '专辑保存失败，请重试',
                    'title' => $title,
                    'text' => $text,
                    'albums' => $albums,
                    'post' => $post
                ]);
            }
        }
    }

    public function delete()
    {
        $id = $this->request->get('id');
        $post = Post::findOrFail($id);
        $post->delete();
        redirect('/admin/posts');
    }

    protected function validate()
    {
        $params = func_get_args();
        $title = $params[0];
        $album_id = $params[1];
        $text = $params[2];
        $image = $params[3];
        $origin_image = null;
        if (isset($params[4])) {
            $origin_image = $params[4];
        }
        if (empty($title)) {
            throw new ValidationException('文章标题不能为空');
        }
        if (empty($album_id)) {
            throw new ValidationException('所属专辑不能为空');
        }
        if (empty($text)) {
            throw new ValidationException('文章内容不能为空');
        }
        if (empty($image) && empty($origin_image)) {
            throw new ValidationException('文章封面图不能为空');
        }
        if (empty($image)) {
            return;
        }
        if (!($image instanceof UploadedFile) || !$image->isValid()) {
            throw new ValidationException('文章封面图片上传出错，请重试');
        }
        if ($image->getSize() > 1 * 1024 * 1024) {
            throw new ValidationException('上传图片不能超过 1M');
        }
        if (!in_array($image->getClientMimeType(), ['image/png', 'image/jpeg', 'image/gif'])) {
            throw new ValidationException('仅支持上传 png、jpg、gif 格式图片');
        }
        $path = $this->container->resolve('app.basePath') . 'public/image';
        $image->move($path, $image->getClientOriginalName());

    }
}