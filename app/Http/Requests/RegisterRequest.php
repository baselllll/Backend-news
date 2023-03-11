<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
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

            'email' =>'required|string|unique:users,email',
            'password' => 'required|confirmed',
            'name' => 'required',
            'data_source_api'=>"required|in:News_api,BBC_News_api,bitcoin_news_us"
        ];
    }
}
