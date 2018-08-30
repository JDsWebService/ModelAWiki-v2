<?php

namespace App\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MakeAdmin extends Model
{
	use Notifiable;

    protected $table = 'make_admin';
}
