<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	* Indicates if the model should be timestamped.
	*
	* @var bool
	*/
	public $timestamps = true;


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

	/**
	* Created at accessor
	*
	* @param $date
	* @return string
	*/
	public function getCreatedAtAttribute()
	{
		return Carbon::parse($this->attributes['created_at'])->diffForHumans();
	}

	/**
	* Updated at accessor
	*
	* @param $date
	* @return string
	*/
	public function getUpdatedAtAttribute()
	{
		return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
	}

	// User Relationship
	public function user() {
		return $this->belongsTo('App\Models\User\User');
	}

	// Category Relationship
	public function category() {
		return $this->belongsTo('App\Models\Category');
	}
}
