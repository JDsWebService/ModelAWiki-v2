<?php

namespace App\Models\Blog;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use TimestampsTrait;

    // Posts Relationship
    public function posts() {
        return $this->hasMany('App\Models\Blog\Post')->orderBy('created_at', 'desc');
    }
}
