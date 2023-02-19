<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccessTokensController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'device_name' => ['required'],
            'abilities' => ['required']
        ]);


        // $password = Hash::make('123456');
        $user = User::where('email', $request->username)->first();
        // ->orWhere('mobile', $request->username)
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid username and password combination',
                // 'pass' => $password
            ], 401);
        }
        $token = $user->createToken($request->device_name);
        $abilities = $request->input('abilities', ['*']);
        if ($abilities && is_string($abilities)) {
            $abilities = explode('.', $abilities);
        }
        return response()->json([
            'token' => $token->plainTextToken,
            'user' => $user,
        ]);
    }
}
