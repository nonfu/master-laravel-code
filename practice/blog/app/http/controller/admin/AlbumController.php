<?php
namespace App\Http\Controller\Admin;


use App\Http\Exception\ValidationException;
use App\Http\Response;
use App\Model\Album;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AlbumController extends AdminController
{
    public function index()
    {
        $page = intval($this->request->get('page'));
        $pageTitle = '管理后台 - 专辑列表';
        $albumsTotalNums = Album::count();
        $albumsTotalPage = ceil($albumsTotalNums / $this->itemsPerPage);
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $albumsTotalPage) {
            $page = $albumsTotalPage;
        }
        $albums = Album::orderBy('id', 'desc')->offset(($page - 1) * $this->itemsPerPage)->limit($this->itemsPerPage)->get();
        $this->view->render('admin/album/index.php', [
            'pageTitle' => $pageTitle,
            'siteName' => $this->siteName,
            'user' => $this->authUser,
            'messages' => $this->messages,
            'page' => $page,
            'total' => $albumsTotalPage,
            'albums' => $albums
        ]);
    }
    
    public function add()
    {
        $pageTitle = '管理后台 - 新增专辑';
        if ($this->request->getMethod() == 'GET') {
            $this->view->render('admin/album/new.php', [
                'pageTitle' => $pageTitle,
                'siteName' => $this->siteName,
                'user' => $this->authUser,
                'messages' => $this->messages,
            ]);
        } else {
            $title = $this->request->get('title');
            $summary = $this->request->get('summary');
            $image = $this->request->files->get('image');
            $this->validate($title, $summary, $image);
            $album = new Album();
            $album->title = $title;
            $album->summary = $summary;
            $album->image = '/image/' . $image->getClientOriginalName();
            if ($album->save()) {
                redirect('/admin/albums');
            } else {
                $this->view->render('admin/album/new.php', [
                    'pageTitle' => $pageTitle,
                    'siteName' => $this->siteName,
                    'user' => $this->authUser,
                    'messages' => $this->messages,
                    'error' => '专辑保存失败，请重试',
                    'title' => $title,
                    'summary' => $summary
                ]);
            }
        }
    }
    
    public function edit()
    {
        $pageTitle = '管理后台 - 编辑专辑';
        $id = $this->request->get('id');
        $album = Album::findOrFail($id);
        if ($this->request->getMethod() == 'GET') {
            $this->view->render('admin/album/edit.php', [
                'pageTitle' => $pageTitle,
                'siteName' => $this->siteName,
                'user' => $this->authUser,
                'messages' => $this->messages,
                'album' => $album
            ]);
        } else {
            $title = $this->request->get('title');
            $summary = $this->request->get('summary');
            $image = $this->request->files->get('image');
            $origin_image = $this->request->get('origin_image');
            $this->validate($title, $summary, $image, $origin_image);
            $album->title = $title;
            $album->summary = $summary;
            if (!empty($image)) {
                $album->image = '/image/' . $image->getClientOriginalName();
            }
            if ($album->save()) {
                redirect('/admin/albums');
            } else {
                $this->view->render('admin/album/edit.php', [
                    'pageTitle' => $pageTitle,
                    'siteName' => $this->siteName,
                    'user' => $this->authUser,
                    'messages' => $this->messages,
                    'error' => '专辑保存失败，请重试',
                    'title' => $title,
                    'summary' => $summary,
                    'album' => $album
                ]);
            }
        }
    }

    public function delete()
    {
        $id = $this->request->get('id');
        $album = Album::findOrFail($id);
        $album->delete();
        redirect('/admin/albums');
    }

    protected function validate()
    {
        $params = func_get_args();
        $title = $params[0];
        $summary = $params[1];
        $image = $params[2];
        $origin_image = null;
        if (isset($params[3])) {
            $origin_image = $params[3];
        }
        if (empty($title)) {
            throw new ValidationException('专辑名称不能为空');
        }
        if (empty($summary)) {
            throw new ValidationException('专辑简介不能为空');
        }
        if (empty($image) && empty($origin_image)) {
            throw new ValidationException('专辑图片不能为空');
        }
        if (empty($image)) {
            return;
        }
        if (!($image instanceof UploadedFile) || !$image->isValid()) {
            throw new ValidationException('专辑图片上传出错，请重试');
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