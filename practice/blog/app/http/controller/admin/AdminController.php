<?php
namespace App\Http\Controller\Admin;

use App\Http\Controller\Controller;
use App\Model\Message;

class AdminController extends Controller
{
    protected $messages;

    protected $authUser;

    protected $itemsPerPage = 15;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has('auth_user')) {
            redirect('/login');
        }
        $this->authUser = $this->session->get('auth_user');
        $this->messages = Message::orderBy('created_at', 'desc')->limit(3)->get();
    }
}