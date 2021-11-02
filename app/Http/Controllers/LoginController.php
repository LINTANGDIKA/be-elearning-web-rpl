<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ],[
            'username.required' => 'Username must not empty!',
            'username.exists' => 'Username does not exist!',
            'password.required' => 'Password must not empty!'
        ]);

        if ($validator->fails())
            return response()->json([
                'failed' => true,
                'description' => $validator->errors()->first()
            ], 400);

        if (!Auth::attempt($request->only(['username', 'password'])))
            return response()->json([
                'failed' => true,
                'description' => 'Password incorrect!'
            ], 401);

        $user = User::where([
            'username' => $request['username']
        ])->firstOrFail();

        $user->tokens()->delete();

        return response()->json([
            'failed' => false,
            'description' => 'User logged',
            'user' => $user,
            'token' => $user->createToken(env('TOKEN_SECRET', 'key'))->plainTextToken
        ], 200);
    }
}
