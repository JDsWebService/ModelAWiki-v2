<?php

namespace App\Models\Admin;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
	use TimestampsTrait;
	
    // Define the Table being Used
    protected $table = 'social_links';
}
