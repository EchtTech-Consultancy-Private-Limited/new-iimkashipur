<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use DB;
use Auth;

class SessionTimeout {

    protected $session;
   // protected $timeout = 60;

    public function __construct(Store $session){
        $this->session = $session;
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
        $timeout = env('SESSION_LIFETIME');
        $isLoggedIn = $request->path() != 'dashboard/logout';
        if(!session('lastActivityTime'))
            $this->session->put('lastActivityTime', time());
        elseif(time() - $this->session->get('lastActivityTime') > $timeout){
            $this->session->forget('lastActivityTime');
            $cookie = cookie('intend', $isLoggedIn ? url()->current() : 'dashboard');
           // $email = $request->user()->email;

            $userId = Auth::user()->id;

            $sqlUpdate = DB::table('users')->where('id', $userId)->update(array('last_login'=>date('d-m-Y H:i:s'),'ip'=>$request->ip(),'login_status'=>'0'));
            auth()->logout();
            // return message('You had not activity in '.$timeout/60 .' minutes ago.', 'warning', 'login')->withInput(compact('email'))->withCookie($cookie);
        }
        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
        return $next($request);
    }

}
