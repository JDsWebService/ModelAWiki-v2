<?php

namespace App\Models\Pages;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class HomepageEntry extends Model
{
	use TimestampsTrait;
	
    // Define the Table
    protected $table = 'homepage';
}
