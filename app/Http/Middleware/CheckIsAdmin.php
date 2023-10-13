<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_super_admin) {
            return $next($request);
        }

        // Rediriger l'utilisateur vers une page d'erreur ou une autre page appropriée.
        abort(403, 'Accès interdit.'); // Vous pouvez personnaliser le message d'erreur.

        // Vous pouvez également rediriger l'utilisateur vers une autre page.
        // return redirect('/')->with('error', 'Accès interdit.');
    }
}
