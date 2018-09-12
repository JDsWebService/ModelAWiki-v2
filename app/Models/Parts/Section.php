<?php

namespace App\Models\Parts;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'part_sections';
    
	use TimestampsTrait;

    // Define the Parts Relationship
    public function parts() {
        return $this->hasMany('App\Models\Parts\Part');
    }
}
