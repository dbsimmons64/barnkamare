<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureNurseryIsSelected
{

    protected $nurserySelectPage = [
        'Admin' => 'filament.nursery.pages.select-nursery',
        'Nurse' => 'filament.nursery.pages.select-nursery'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $selectPage = $this->nurserySelectPage[auth()->user()->role];
        Log::info('Select Page :'.$selectPage.' + nursery_id :'.$request->session()->get('nursery_id'));
        if (!$request->session()->has('nursery_id') && $request->route()->getName() != $selectPage) {


            return redirect(route($selectPage));
        }

        return $next($request);
    }
}
