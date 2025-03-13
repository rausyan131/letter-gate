<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->role !== 'admin') {
                $allowedRoutes = ['dashboard', 'surat.index', 'surat.show', 'surat.create', 'surat.store', 'surat.edit', 'surat.update', 'surat.destroy', 'pegawai.edit', 'pegawai.update'];

                if (!in_array($request->route()->getName(), $allowedRoutes)) {
                    return redirect()->route('dashboard');
                }
            }
        }

        return $next($request);
    }
}
