<?php

namespace App\Models\Parts;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    // Define the table
    protected $table = "parts";

    // Define the Parts Section Relationship
    public function section() {
    	return $this->belongsTo('App\Models\Parts\Section');
    }
}
