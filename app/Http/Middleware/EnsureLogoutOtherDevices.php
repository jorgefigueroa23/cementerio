<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EnsureLogoutOtherDevices
{

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            $userId = Auth::id();
            $sessionId = session()->getId();

            // Cerrar todas las sesiones activas del usuario excepto la sesión actual
            DB::table('sessions')
                ->where('user_id', $userId)
                ->where('id', '!=', $sessionId)
                ->delete();
        }

        return $response;
    }
}
