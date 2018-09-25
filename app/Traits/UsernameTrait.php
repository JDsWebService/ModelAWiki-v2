<?php

namespace App\Traits;

use App\Models\Admin\Admin;
use App\Models\User\User;

trait UsernameTrait {

	public function generateRandomUserNumber($model) {
        $number = rand(1, 9999999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->userNumberExists($number, $model)) {
            return generateRandomUserNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    public function userNumberExists($number, $model) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        switch ($model) {
            case "user":
                return User::whereUsername($number)->exists();
                break;
            case "admin":
                return Admin::whereUsername($number)->exists();
                break;
        }
    }
	
}