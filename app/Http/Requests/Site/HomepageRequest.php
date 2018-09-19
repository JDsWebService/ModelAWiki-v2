<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class HomepageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Switch on the method
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required|max:255|string',
                    'description' => 'required|string',
                    'image' => 'required|image',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {   
                return [
                    'title' => 'required|max:255|string',
                    'description' => 'required|string',
                    'image' => 'sometimes|image',
                ];
            }
            default:break;
        }


    }
}
