<?php

namespace App\Models\Forum;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class ForumSettings extends Model
{
    use TimestampsTrait;

    // Define the Table Being Used
    protected $table = 'forum_settings';
}
