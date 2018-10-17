<?php

namespace Modules\Inewsletter\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSubscribersRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'email'=>'required|email|unique:inewsletter__subscribers',
        ];
    }

    public function translationRules()
    {
        return [
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.unique' => 'Su correo ya está registrado.',
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
