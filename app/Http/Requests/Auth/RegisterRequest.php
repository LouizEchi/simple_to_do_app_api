<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @author Louiz Echiverri
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Louiz Echiverri
     */
    public function rules()
    {
        return [
            'email'    => 'required',
            'password' => 'required',
            'name'     => 'required'
        ];
    }
}
