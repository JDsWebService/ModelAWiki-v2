<?php

namespace App\Http\Requests\Parts;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
                    'name' => 'required|string|max:255',
                    'image' => 'sometimes|image',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {   
                // Grab the section id from the route
                $section_id = $this->route('section');

                return [
                    'name' => 'required|max:255|unique:part_sections,name,' . $section_id,
                    'image' => 'sometimes|image',
                ];
            }
            default:break;
        }

    }
}
