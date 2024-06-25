<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            Log::info('User not authenticated');
            return redirect('/'); // Jika pengguna belum login, redirect ke halaman login
        }

        $user = Auth::user();
        Log::info('Authenticated user ID: ' . $user->id);
        Log::info('Authenticated user type: ' . $user->type);

        if ($user->type == $role) {
            return $next($request); // Jika peran pengguna cocok, lanjutkan
        }

        Log::info('User type mismatch: expected ' . $role . ', got ' . $user->type);
        return redirect('/');
    }
}
