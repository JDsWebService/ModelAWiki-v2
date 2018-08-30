<?php

namespace App\Rules;

use App\Http\Requests\Request;
use App\Models\Admin\Permission;
use Illuminate\Contracts\Validation\Rule;

class UniquePermission implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $permission = Permission::where('name', '=', request('name'))->where('category', '=', request('category'))->count();

        if($permission === 0) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The permission already exists for this category.';
    }
}
