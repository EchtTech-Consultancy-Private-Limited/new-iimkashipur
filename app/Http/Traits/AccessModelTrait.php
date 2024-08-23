<?php

namespace App\Http\Traits;

use Log;
use App;
use DB;
use Request;

trait AccessModelTrait
{
    private function abortIfAccessNotAllowed()
    {
        if(!$this->checkUserHasAccess()){
            abort(403, "You don't have permission to perform this action!"); // No access allowed
        }else{
            
            $data =[];
            $userLogin = Auth()->user();
            
            if(isset($this->checkUserHasAccess()->create) && $this->checkUserHasAccess()->create =='Y'){
                $data['create'] = 'Y';
            }elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['create'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->view) && $this->checkUserHasAccess()->view =='Y'){
                $data['view'] = 'Y';
            }elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['view'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->update) && $this->checkUserHasAccess()->update =='Y'){
                $data['update'] = 'Y';
            }elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['update'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->read) && $this->checkUserHasAccess()->read =='Y'){
                $data['read'] = 'Y';
            }elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['read'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->delete) && $this->checkUserHasAccess()->delete =='Y'){
                $data['delete'] = 'Y';
            }
            elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['delete'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->approver) && $this->checkUserHasAccess()->approver =='Y'){
                $data['approver'] = 'Y';
            }
            elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['approver'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->publisher) && $this->checkUserHasAccess()->publisher =='Y'){
                $data['publisher'] = 'Y';
            }
            elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['publisher'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->import) && $this->checkUserHasAccess()->import =='Y'){
                $data['import'] = 'Y';
            }
            elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['import'] = 'Y';
            }
            if(isset($this->checkUserHasAccess()->export) && $this->checkUserHasAccess()->export =='Y'){
                $data['export'] = 'Y';
            }
            elseif(isset($userLogin->role_id) && $userLogin->role_id ==1 || $userLogin->role_id ==2){
                $data['export'] = 'Y';
            }
           //dd($data);
            return $data;
        }
    }
    private function checkUserHasAccess() 
    {
      $userLogin = Auth()->user();
      $segment = Request::segment(1);
      if(isset($userLogin->role_id) && $userLogin->role_id !=1 && $userLogin->role_id !=2){
            $modelName = DB::table('roles_and_permissions')->where('role_id',$userLogin->role_id)->where('prefix',$segment)->first();
            return $modelName;
        }else{
            return true;
        }
    }

    private function checkAccessMessage() 
    {
       return "<div class='card-body'><p style='color:#009ef7'>You don't have permission to perform this action!</p>
        </div>"; // No access allowed
    }

}