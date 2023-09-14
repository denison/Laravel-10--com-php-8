<?php

namespace App\Http\Requests;

use App\Models\Subscription;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules()
    {
        return Subscription::$rules;
    }

    public function messages()
    {
        return [
            //
            'name.required'  => 'Nome é obrigatório',
            'value.required' => "Valor é obrigatório",
            "company_id.required" => "É obrigatório inserir a empresa" 
        ];
    }
}
