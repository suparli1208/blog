<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    protected $fillable = ['judul', 'category_id', 'content', 'gambar'];

    public function category()
    {
        return $this->BelongsTo('App\Category');
    }
}
