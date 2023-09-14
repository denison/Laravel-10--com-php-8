<?php

namespace App\Http\Requests;

use App\Models\SubscriptionMember;
use Illuminate\Foundation\Http\FormRequest;

class CreateSubscriptionMemberRequest extends FormRequest
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
        return SubscriptionMember::$rules;
    }

    public function messages()
    {
        return [
            //
            'user_id.required'  => 'Nome é obrigatório',
            'subscription_id.required' => "Turma é obrigatório"
        ];
    }
}
