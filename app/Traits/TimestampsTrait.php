<?php 

namespace App\Traits;

use Carbon\Carbon;

trait TimestampsTrait {

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
		   return ['created_at', 'updated_at'];
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

	
}