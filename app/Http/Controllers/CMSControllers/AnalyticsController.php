<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Ramsey\Uuid\Uuid;
use DB;

class AnalyticsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Store analytics data.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(!env('ENABLE_INTERNAL_ANALYTICS')) return; // do nothing
        
        $userId = null;
        $academyId = null;

        if(Auth::check()) {
            $userId = $request->user()->id;
        }

        $sessionId = $request->session()->getId();
        $ip = $request->header('CF-Connecting-IP', $request->ip());
        $uuid = Uuid::uuid4();

        $eventType = $request->input('eventType', 'no_type');
        $eventCategory = $request->input('eventCategory');
        $eventAction = $request->input('eventAction');
        $eventLabel = $request->input('eventLabel');
        $page = $request->input('page');
        $referrer = $request->input('referrer');
        $userAgent = $request->input('userAgent');
        $miscData = json_encode($request->input('miscData'));

        DB::table("analytics")->insert([
            'id' => $uuid,
            'user_id' => $userId,
            'session_id'=> $sessionId,
            'event_type'=> $eventType,
            'event_category'=> $eventCategory,
            'event_action'=> $eventAction,
            'event_label'=> $eventLabel,
            'page'=> $page,
            'referrer'=> $referrer,
            'ip'=> $ip,
            'user_agent'=> $userAgent,
            'misc_data'=> $miscData,
        ]);
    }
}