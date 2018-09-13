<?php

namespace App\Models\Blog;

use App\Traits\TimestampsTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
	use TimestampsTrait;


    /**
	* Carbon date setup
	*
	* @return array
	*/
	public function getDates()
	{
	   return ['created_at', 'updated_at', 'published_at'];
	}

    /**
	* Published at accessor
	*
	* @param $date
	* @return string
	*/
	public function getPublishedAtAttribute()
	{
		if($this->attributes['published_at'] === null) {
			return "Not Published";
		}

		return Carbon::parse($this->attributes['published_at'])->diffForHumans();
	}

	public function getPreviewAttribute() {
		return Str::limit($this->attributes['body'], 250);
	}

	public function getLongPreviewAttribute() {
		return Str::limit($this->attributes['body'], 500);
	}

	// User Relationship
	public function user() {
		return $this->belongsTo('App\Models\Admin\Admin');
	}

	// Category Relationship
	public function category() {
		return $this->belongsTo('App\Models\Blog\Category');
	}

	// Tags Relationship
	public function tags() {
		return $this->belongsToMany('App\Models\Blog\Tag');
	}
}
