<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            'username' => 'unique:users,username',
            'fullname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
        ], [
            'username.unique' => 'Username must be unique!',
            'fullname.required' => 'Full name must not empty!',
            'email.required' => 'email must not empty!',
            'email.unique' => 'email is already been taken!',
            'password.required' => 'password must not empty!',
            'password.min' => 'password must be more than 5 characters!',
        ]);

        if ($validator->fails()) {
            return response()->json(['failed' => true, 'description' => $validator->errors()->first()], 400);
        }

        $user = User::create([
            'fullname' => $request['fullname'],
            'username' => ($request['username']) ? $request['username'] : 'User' . random_int(1, 1000),
            'email' => $request['email'],
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'failed' => false,
            'description' => 'account created!',
            'user' => $user,
            'token' => $user->createToken(env('TOKEN_SECRET', 'key'))->plainTextToken
        ], 201);
    }
}
