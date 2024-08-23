<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App, Route, DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

// Call Helper

class CmsComposer
{
    protected $request;

    /**
     * Create a new cms composer.
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        
        $menuData = array('Home', 'Contact US');
        $userLogin = Auth()->user();
        //dd($userLogin->role_id);
        if(isset($userLogin->role_id) && $userLogin->role_id !=1){
            $modelName = DB::table('roles_and_permissions')->where('role_id',$userLogin->role_id)->orderBy('sort_order','asc')->get();
        }else{
            $modelName = DB::table('module_management')->where('soft_delete','0')->orderBy('sort_order','asc')->get();
        }
        
        $aside_color = (config('dashboard_color.color.aside_color') !='') ?config('dashboard_color.color.aside_color'):'#1e1e2d';
        $top_header_color = (config('dashboard_color.color.top_header_color') !='') ?config('dashboard_color.color.top_header_color'):'#1e1e2d';
        $menu_text_color = (config('dashboard_color.color.text_color') !='') ?config('dashboard_color.color.text_color'):'#888C9F';
        $hover_color = (config('dashboard_color.color.hover_color') !='') ?config('dashboard_color.color.hover_color'):'#ffffff';
        $selected_color = (config('dashboard_color.color.selected_color') !='') ?config('dashboard_color.color.selected_color'):'#009ef7';
        $selected_text_color = (config('dashboard_color.color.selected_text_color') !='') ?config('dashboard_color.color.selected_text_color'):'#ffffff';

            $view->with([
                'menu' => $menuData, 
                'modelname' => $modelName,
                'aside_color' => $aside_color,
                'top_header_color' => $top_header_color,
                'menu_text_color' => $menu_text_color,
                'hover_color' => $hover_color,
                'selected_color' => $selected_color,
                'selected_text_color' => $selected_text_color,
            ]);
    }
}
