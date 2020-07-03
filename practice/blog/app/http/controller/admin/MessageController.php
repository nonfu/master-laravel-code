<?php
namespace App\Http\Controller\Admin;

use App\Model\Message;
use App\Model\Post;

class MessageController extends AdminController
{
    public function index()
    {
        $page = intval($this->request->get('page'));
        $pageTitle = '管理后台 - 消息列表';
        $totalNums = Message::count();
        $totalPage = ceil($totalNums / $this->itemsPerPage);
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $totalPage) {
            $page = $totalPage;
        }
        $messages = Message::orderBy('id', 'desc')->offset(($page - 1) * $this->itemsPerPage)->limit($this->itemsPerPage)->get();
        $this->view->render('admin/message/index.php', [
            'pageTitle' => $pageTitle,
            'siteName' => $this->siteName,
            'user' => $this->authUser,
            'messages' => $this->messages,
            'page' => $page,
            'total' => $totalPage,
            'all_messages' => $messages
        ]);
    }

    public function delete()
    {
        $id = $this->request->get('id');
        $message = Message::findOrFail($id);
        $message->delete();
        redirect('/admin/messages');
    }
}