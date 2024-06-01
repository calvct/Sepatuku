<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
class ShouldAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userCookie=Cookie::get('ACCOUNT_ID');
        $userSession=Session::get('ACCOUNT_ID');
        $DBuser= $DBuser = DB::table('Account')
        ->where('ACCOUNT_ID', '=',$userCookie )
        ->orWhere('ACCOUNT_ID', '=', $userSession )
        ->first();
        //dd($DBuser);

        if($DBuser !== null){
            if ($DBuser->ROLES != 'Admin') {
                return \redirect('/')
                    ->withErrors(["msg" => "You are not admin, you are not allowed to check contact list"]);
            }
            else{
                return $next($request);
            }
        }
        else{
            return redirect("/")
            ->withErrors(["msg" => "You are not admin, you are not allowed to check contact list"]);
        }
    }
}
