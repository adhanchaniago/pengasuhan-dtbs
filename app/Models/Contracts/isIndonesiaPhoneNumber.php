<?php

namespace App\Models\Contracts;

trait isIndonesiaPhoneNumber
{
    /**
     * isIndonesiaPhoneNumber
     *
     * @param string|boolean $phoneNumber
     * @return object
     */
    public static function isIndonesiaPhoneNumber($phoneNumber)
    {
        $regexIndonesiaPhoneNumber = preg_match("/^(^\62\s?|^62)(\d{3,4}-?){2}\d{3,4}$/", $phoneNumber);

        if(!$regexIndonesiaPhoneNumber)
        {
            return (object)[
                'status'    => false,
                'message'   => 'Nomor telepon harus berawalan 62 sob!'
            ];
        }
    }
}