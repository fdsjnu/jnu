<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobPostRequest extends Request
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
        return [
            'code'  => 'required|max:255',
            'post'  => 'required|',
            'department' => 'required',
            'session' => 'required',
            'startDate' => 'required',
            'startingTime' => 'required',            
            'closeDate' => 'required',
            'closingTime' => 'required',


        ];
    }


    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
    public function messages()
    {
        return [
            'code.required' => 'Advertisement No. is required',
            'post.required'  => 'Post is required',
            'department.required'  => 'Department is required',
            'session.required'  => 'Session is required',
            'startDate.required'  => 'Start date is required',
            'startingTime.required'  => 'Starting time is required',
            'closeDate.required'  => 'Close date is required',
            'closingTime.required'  => 'Closing time is required',


        ];
    }
}
