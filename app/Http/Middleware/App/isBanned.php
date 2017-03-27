<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class isBanned
{
    private $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->guard->check()){

            if ($this->guard->user()->status == 'banned') {

                Auth::logout();

                $request->session()->flush();

                $request->session()->regenerate();

                Alert::danger('Su cuenta se encuentra suspendida');

                return redirect('/login');
            }
            
        }
        
        return $next($request);
    }
}
