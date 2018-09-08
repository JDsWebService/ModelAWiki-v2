<?php

namespace App\Rules;

use App\Http\Requests\Request;
use App\Models\Admin\Permission;
use Illuminate\Contracts\Validation\Rule;

class UniquePermission implements Rule
{
    protected $value;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        if(request()->method('PUT')) {
            return true;
        }
        
        $this->value = $value;

        $result = Permission::where($attribute, '=', $value)->where('category', '=', request('category'))->count();

        if($result === 0) {
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
        return 'The permission ' . $this->value . ' already exists for this category.';
    }
}
