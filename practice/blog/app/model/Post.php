<?php
namespace App\Model;

class Post
{
    public $id;
    public $title;
    public $html;
    public $text;
    public $album_id;
    public $created_at;

    public $table = 'posts';
}
