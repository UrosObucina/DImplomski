<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where("token",'=',$request->header('Authorization'))->first();
        JWTAuth::setToken($user->token);
        $token = JWTAuth::getToken();
        $apy = JWTAuth::getPayload($token)->toArray();
        $response = '';
        $now = time();
        if ($user['id_UserType'] == 2 && isset($token)) {
            return $next($request);
        } else {
            return response()->json(['message' => 'You are not authorized to access.']);
        }
    }
}
