<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getSearchData(Request $request)
    {
        $keyword = $request->search_key;
        $databaseName = env('DB_DATABASE');
        $tables = DB::select("SHOW TABLES FROM $databaseName");
        $finalArray = collect();
        foreach ($tables as $table) {
            $tableName = current($table);
            $searchResults = [];

            if (Schema::hasColumns($tableName, ['title_name_en', 'title_name_hi', 'description_en', 'description_hi'])) {
                $searchResults = array_merge($searchResults, DB::table($tableName)->where('title_name_en', 'like', '%' . $keyword . '%')
                    ->orWhere('title_name_hi', 'like', '%' . $keyword . '%')
                    ->orWhere('description_en', 'like', '%' . $keyword . '%')
                    ->orWhere('description_hi', 'like', '%' . $keyword . '%')
                    ->get()->toArray());
            }
            if (Schema::hasColumns($tableName, ['title_name_en', 'title_name_hi'])) {
                $searchResults = array_merge($searchResults, DB::table($tableName)->where('title_name_en', 'like', '%' . $keyword . '%')
                    ->orWhere('title_name_hi', 'like', '%' . $keyword . '%')
                    ->get()->toArray());
            }

            if (Schema::hasColumns('dynamic_content_page_metatag', ['page_title_en', 'page_title_hi', 'meta_tag_description'])) {
                $searchResults = array_merge($searchResults, DB::table('dynamic_content_page_metatag')->where('page_title_en', 'like', '%' . $keyword . '%')
                    ->orWhere('page_title_hi', 'like', '%' . $keyword . '%')
                    ->orWhere('meta_tag_description', 'like', '%' . $keyword . '%')
                    ->get()->toArray());
            }

            if (Schema::hasColumns('website_menu_management', ['name_en', 'name_hi'])) {
                $searchResults = array_merge($searchResults, DB::table('website_menu_management')->where('name_en', 'like', '%' . $keyword . '%')
                    ->orWhere('name_hi', 'like', '%' . $keyword . '%')
                    ->get()->toArray());
            }
            foreach ($searchResults as $item) {               
                if (isset($item->title_name_en) || isset($item->page_title_en) || isset($item->name_en)) {
                    if(isset($item->footer_url) && $item->footer_url != 0){
                        $finalArray->push([
                            'link' => $item->footer_url ?? '',
                            'title' => $item->title_name_en ?? $item->page_title_en ?? $item->name_en,
                            'description' => $item->description_en ?? $item->meta_tag_description ?? '',
                        ]);
                    }
                    if(isset($item->menu_uid)){
                        $mainMenu = DB::table('website_menu_management')->where('uid',$item->menu_uid)->first();                     
                        if(isset($mainMenu->parent_id) && $mainMenu->parent_id != 0){
                            $parentMenu = DB::table('website_menu_management')->where('uid',$mainMenu->parent_id)->first();                    
                            $link = $parentMenu->url?$parentMenu->url.'/'.$mainMenu->url: '';
                            $finalArray->push([
                                'link' => $link ?? '',
                                'title' => $item->title_name_en ?? $item->page_title_en ?? $item->name_en,
                                'description' => $item->description_en ?? $item->meta_tag_description ?? '',
                            ]);
                        }
                    }elseif(isset($item->parent_id)){                      
                        $mainMenu = DB::table('website_menu_management')->where('parent_id',$item->parent_id)->first();  
                        if(isset($mainMenu->parent_id) && $mainMenu->parent_id != 0){
                            
                            $parentMenu = DB::table('website_menu_management')->where('uid',$mainMenu->parent_id)->first();
                            $link = $parentMenu->url?$parentMenu->url.'/'.$mainMenu->url: '';
                            $finalArray->push([
                                'link' => $link ?? '',
                                'title' => $item->title_name_en ?? $item->page_title_en ?? $item->name_en,
                                'description' => $item->description_en ?? $item->meta_tag_description ?? '',
                            ]);
                        }else{
                            $finalArray->push([
                                'link' => $item->url ?? '',
                                'title' => $item->title_name_en ?? $item->page_title_en ?? $item->name_en,
                                'description' => $item->description_en ?? $item->meta_tag_description ?? '',
                            ]);
                        }
                    }else{
                        // echo $tableName;
                        // die;
                        if($tableName == 'purchase_works_committees'){
                            $link = 'purchase-works-committee';
                        }
                        if($tableName == 'tender_management'){
                            $link = 'tender';
                        }
                        if($tableName == 'career_management'){
                            $link = 'careers';
                        }
                        if($tableName == 'rti_assets'){
                            $link = 'rti';
                        }
                        if($tableName == 'gallery_management'){
                            $link = 'photo-gallery';
                        }
                        $finalArray->push([
                            'link' => $link ?? '',
                            'title' => $item->title_name_en ?? $item->page_title_en ?? $item->name_en,
                            'description' => $item->description_en ?? $item->meta_tag_description ?? '',
                        ]);
                    }
                    
                } elseif (isset($item->title_name_hi) || isset($item->page_title_hi) || isset($item->name_hi)) {
                    $finalArray->push([
                        'link' => $item->menu_uid ?? '',
                        'title' => $item->title_name_hi ?? $item->page_title_hi ?? $item->name_hi,
                        'description' => $item->description_hi ?? $item->meta_tag_description ?? '',
                    ]);
                }
            } 
        }               
        // Paginate the final array
        $perPage = 10;
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage() ?? 1;
        $finalCollection = collect($finalArray);
        $uniqueCollection = $finalCollection->unique();
        $currentItems = $uniqueCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator(
            $currentItems,
            $uniqueCollection->count(),
            $perPage,
            $currentPage
        );
        // dd($paginatedItems);
        return view('pages.search', ['data' => $paginatedItems]);
    }

}
