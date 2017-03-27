<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class isRoot
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
        if (! $this->guard->user()->can('isRoot')) {
            
            abort(404);
        }
        
        return $next($request);
    }
}
