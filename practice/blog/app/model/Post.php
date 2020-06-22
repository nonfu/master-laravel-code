<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $guarded = ['id', 'created_at'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
