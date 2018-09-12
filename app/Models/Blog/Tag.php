<?php

namespace App\Models\Blog;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{	
	use TimestampsTrait;
    
    // Posts Relationship
    public function posts() {
    	return $this->belongsToMany('App\Models\Blog\Post');
    }
}
