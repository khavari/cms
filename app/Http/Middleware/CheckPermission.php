<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Access\Gate;

class CheckPermission
{

    protected $gate;

    /**
     * CheckPermission constructor.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     */
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role->slug === 'admin') {
            return $next($request);
        }
        return redirect('/');
    }
}
