<?php

namespace Modules\Inewsletter\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSubscribersRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'email'=>'required|email|unique:inewsletter__subscribers',
            'name'=>'required|min:2',
            'g-recaptcha-response' => 'required|captcha',
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
            'email.required' => 'El Email es Requerido',
            'name.required' => 'El Nombre es Requerido',
            'g-recaptcha-response.required' => '¡El Recaptcha es requerido!'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
