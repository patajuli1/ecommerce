<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordFormRequest extends FormRequest
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


        switch ($this->method()) {

            case 'POST':
                return [
                    'old_password' => 'required',
                    'password'=>'required|min:6|confirmed',
                    'password_confirmation'=>'sometimes|min:6|required_with:password'

                ];
            case 'PUT':
                return [
                    'old_password' => 'required',
                    'password'=>'required|min:6|confirmed',
                    'password_confirmation'=>'sometimes|min:6|required_with:password'

                ];
            default:
                break;
        }


    }
}