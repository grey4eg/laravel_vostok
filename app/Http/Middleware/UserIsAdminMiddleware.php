<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle (Request $request, Closure $next)
    {

        // TODO :: ПРОВЕРКА ПРАВ АДМИНИСТАРТОРА

        if ( true ) {
          return $next($request);
        } else {
          // abort(403, 'Недостаточно прав для доступа к разделу');
          abort(403);
        }

    }
}
