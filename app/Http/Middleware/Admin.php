<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Guard;
use Laravel\Sanctum\Sanctum;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = request()->bearerToken();
        $user = new User();
        $guard = new Guard();
        if ($token) {
            $model = Sanctum::$personalAccessTokenModel;

            $accessToken = $model::findToken($token);
        }

        return  Response()->json(['sucesso' => false]);

        return $next($request);
    }
}
