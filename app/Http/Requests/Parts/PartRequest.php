<?php

namespace App\Http\Requests\Parts;

use Illuminate\Foundation\Http\FormRequest;

class PartRequest extends FormRequest
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
                    'section_id' => 'required|integer',
                    'name' => 'required|string|max:255',
                    'part_number' => 'required|string|max:255|unique:parts,part_number',
                    'description' => 'required|string',
                    'date_start_month' => 'required|integer',
                    'date_start_year' => 'required|integer',
                    'date_end_month' => 'required|integer',
                    'date_end_year' => 'required|integer',
                    'body_type' => 'required|string|max:255',
                    'year' => 'required|integer',
                    'reminder' => 'nullable|string',
                    'tip' => 'nullable|string',
                    'warning' => 'nullable|string',
                    'fun_fact' => 'nullable|string',
                    'featured_image' => 'sometimes|image',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {   
                // Grab the part id from the route
                $part_id = $this->route('part');

                return [
                    'section_id' => 'required|integer',
                    'name' => 'required|string|max:255',
                    'part_number' => 'required|string|max:255|unique:parts,part_number,' . $part_id,
                    'description' => 'required|string',
                    'date_start_month' => 'required|integer',
                    'date_start_year' => 'required|integer',
                    'date_end_month' => 'required|integer',
                    'date_end_year' => 'required|integer',
                    'body_type' => 'required|string|max:255',
                    'year' => 'required|integer',
                    'reminder' => 'nullable|string',
                    'tip' => 'nullable|string',
                    'warning' => 'nullable|string',
                    'fun_fact' => 'nullable|string',
                    'featured_image' => 'sometimes|image',
                ];
            }
            default:break;
        }
    }
}
