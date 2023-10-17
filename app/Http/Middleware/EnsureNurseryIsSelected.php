<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureNurseryIsSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('nursery_id') && $request->route()->getName() != 'filament.nursery.resources.nurseries.index') {
            Log::info('route :'.$request->route()->getName());

            return redirect(route('filament.nursery.resources.nurseries.index'));
        }

        return $next($request);
    }
}
