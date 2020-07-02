<?php
namespace App\Http\Controller\Admin;

use App\Http\Controller\Controller;
use App\Model\Message;

class AdminController extends Controller
{
    protected $messages;

    public function __construct()
    {
        parent::__construct();
        $this->messages = Message::orderBy('created_at', 'desc')->limit(3)->get();
    }
}