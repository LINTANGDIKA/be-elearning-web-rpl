<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required'
        ], [
            'email.required' => 'email must not empty!',
            'email.unique' => 'email is already been taken!',
            'password.required' => 'password must not empty!',
            'password.min' => 'password must be more than 5 characters!',
            'password_confirmation.required' => 'password confirmation must not empty!'
        ]);

        if ($validator->fails()) {
            return response()->json(['failed' => true, 'description' => $validator->errors()->first()], 401);
        }
    }
}
