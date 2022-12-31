<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $route = Route::current();
        if ($route->getName() === 'auth.login-register') {
            return [
                'id' => ['required', 'min:11', 'max:64', 'regex:/^[a-zA-Z0-9_.@\+]*$/'],
                'name' => ['required', 'string'],
            ];
        }
        elseif ($route->getName() === 'auth.login-confirm')
            return [
                'otp' => ['required', 'min:6', 'max:6'],
            ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    public function attributes() {
        return [
            'id' => 'پست الکترونیک'
        ];
    }
}
