<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicant extends FormRequest
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
            'vc_name' => 'required',
            'vc_department' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'vc_name.required' => '申請者名を入力してください。',
            'vc_department.required' => '部署名を入力して下さい。',
        ];
    }
}
