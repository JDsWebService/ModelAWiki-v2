<?php

namespace App\Models\Parts;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use TimestampsTrait;

    protected $table = 'parts_images';

    public function user() {
    	return $this->belongsTo('App\Models\User\User');
    }

    public function part() {
    	return $this->belongsTo('App\Models\Parts\Part');
    }
}
