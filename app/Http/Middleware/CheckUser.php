<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        $user = Auth::user();
            if($user)
            {
                if ($user->authorizeRoles('normal')) {
                    return redirect('activeproject');
                }
        else
        {

        }
        }
        return $next($request);
    }
}
