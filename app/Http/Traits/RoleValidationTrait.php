<?php

namespace App\Http\Traits;

use Log;
use App;
use DB;

trait RoleValidationTrait
{
    private function abortIfAccessNotAllowed($user, $access)
    {
        if(!$this->checkUserHasAccess($user, $access))
            abort(403, "You don't have permission to perform this action!"); // No access allowed
    }

    /**
     * check if user role allows requested access level
     *
     * @return true|false
     */
    private function checkUserHasAccess($user, $access) 
    {
        // make sure we have an array
        if (!is_array($access)) {
            $accessList = [$access];
        } else {
            $accessList = $access;
        }

        foreach ($accessList as $accessValue) {
            // if any one access is allowed then we return back the function call
            if ($this->checkUserHasValidRole($user, $accessValue)) {
                return true;
            }
        }

        // user role does not match access level
        return false;
    }
}