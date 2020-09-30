<?php

namespace App\Models\Contracts;

use App\Models\User;

trait isSoftDeleted
{
    /**
     * isSoftDeleted
     *
     * @param string $request
     * @var string username
     * @var string email
     * @var string number phone
     * 
     * @return boolean
     */
    public static function isSoftDeleted($request)
    {
        $getUser = User::where('username', $request)
                    ->orWhere('email', $request)
                    ->orWhere('nohp', $request)
                    ->withTrashed()
                    ->first();

        if(!is_null($getUser) && !is_null($getUser->deleted_at))
            return true;
    }
}