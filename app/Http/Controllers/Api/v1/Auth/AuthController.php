<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\User;
use App\Models\AccessToken;
use Hash;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Api\v1\APIController;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends APIController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('password', 'email');

        if ($user = User::email($credentials['email'])->first() )
        {
            $password = $credentials['password'];



            if ( Hash::check($password, $user->password) )
            {

                $access_token = AccessToken::userId($user->id)->first();
                if (!$access_token)
                {
                     $access_token = AccessToken::create([
                        'user_id' => $user->id,
                        'token'   => Hash::make($user->email.$user->name)
                    ]);
                }

                $data = [
                    'email' => $user->email,
                    'name'  => $user->name,
                    'token' => $access_token->token
                ];

                return $this->respondSuccess('Successful Login', $data);
            }
            else
            {
                return $this->respondUnauthorized();
            }
        }
        else
        {
            return $this->respondUnauthorized();
        }

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(RegisterRequest $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
