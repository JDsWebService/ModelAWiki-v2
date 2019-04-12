<?php

namespace App\Models\Parts;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Part extends Model
{
	use TimestampsTrait;
	
    // Define the table
    protected $table = "parts";

    /**
    * Carbon date setup
    *
    * @return array
    */
    public function getDates()
    {
       return ['created_at', 'updated_at', 'date_start', 'date_end'];
    }

    public function getPreviewAttribute() {
		return Str::limit($this->attributes['description'], 250);
	}

    public function getProductionStartAttribute() {
        return date('M Y', strtotime($this->attributes['date_start'])); 
    }

    public function getProductionEndAttribute() {
        return date('M Y', strtotime($this->attributes['date_end'])); 
    }

    // Define the Parts Section Relationship
    public function section() {
    	return $this->belongsTo('App\Models\Parts\Section');
    }

    // Define Parts Images Relationship
    public function images() {
        return $this->hasMany('App\Models\Parts\Image', 'part_id');
    }
}
