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
	public function getPublishedAtAttribute($date)
	{
		if($date === null) {
			return "Not Published";
		}

		return $this->attributes['published_at'] = Carbon::parse($date)->diffForHumans();
	}

	/**
	* Created at accessor
	*
	* @param $date
	* @return string
	*/
	public function getCreatedAtAttribute($date)
	{
		return $this->attributes['created_at'] = Carbon::parse($date)->diffForHumans();
	}

	/**
	* Updated at accessor
	*
	* @param $date
	* @return string
	*/
	public function getUpdatedAtAttribute($date)
	{
		return $this->attributes['updated_at'] = Carbon::parse($date)->diffForHumans();
	}

	// User Relationship
	public function user() {
		return $this->belongsTo('App\Models\User\User');
	}
}
