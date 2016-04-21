<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TweetRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @author Harlequin Doyon
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Harlequin Doyon
     */
    public function rules()
    {
        return [
            'user_id'    => 'exists:users,id',
            'tweet' => 'required|string|max:255',
        ];
    }
}   
