<?php

namespace App\Models\Contracts;

use App\Models\User;

trait CheckErrorStatusAccount
{
    /**
     * CheckErrorStatusAccount
     *
     * @param string $key
     * @param string $value
     * @return object
     */
    public static function CheckErrorStatusAccount($key, $value)
    {
        // Get user account information
        $getAccount = User::where($key, $value)
        ->withTrashed()
        ->first();

        // Check if user avaible
        if(!empty($getAccount))
        {
            $userStatus = $getAccount->status;
        } else 
        {
            $userStatus = 'notfound';
        }

        // Filter status
        switch ($userStatus) 
        {
            // The account is nonactive
            case 'nonactive':
                return (object)[
                    'status'    => true,
                    'message'   => 'Mohon maaf akun kamu belum aktif, hubungi layanan bantuan'
                ];
                break;

            // The account is unverified
            case 'unverified':
                return (object)[
                    'status'    => true,
                    'message'   => 'Mohon maaf akun kamu belum terverifikasi, hubungu layanan bantuan'
                ];
                break;

            // The account is suspended
            case 'suspended':
                return (object)[
                    'status'    => true,
                    'message'   => 'Mohon maaf akun kamu di tangguhkan, hubungi layanan bantuan'
                ];
                break;

            // The account is deleted
            case 'deleted':
                return (object)[
                    'status'    => true,
                    'message'   => 'Mohon maaf akun kamu sudah dihapus, hubungi layanan bantuan'
                ];
                break;

            // The account status is notfound
            case 'notfound':
                return (object)[
                    'status'    => true,
                    'message'   => 'Akun belum terdaftar atau tidak ditemukan'
                ];
                break;

            // Default result
            default:
                return (object)[
                    'status'    => false,
                    'message'   => 'Account is active'
                ];
                break;
        }
    }
}
