<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentDestroyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('departments') == config('cms.default_department_id'));
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->with('error-message', 'You cannot delete default department!');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
