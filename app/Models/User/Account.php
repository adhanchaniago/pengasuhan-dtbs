<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contracts\CheckErrorStatusAccount;
use App\Models\Contracts\isIndonesiaPhoneNumber;
use App\Models\Contracts\isSoftDeleted;

class Account extends Model
{
    use HasFactory;
    use isIndonesiaPhoneNumber;
    use isSoftDeleted;
    use CheckErrorStatusAccount;

    /**
     * ValidateCountryCodeNumberPhone
     *
     * This function is used to check which part of the 
     * requested telephone number matches the requested country code
     * 
     * @param string $countryCode
     * @param string $request
     * @return boolean
     */
    public static function ValidateCountryCodeNumberPhone($countryCode = null, $request = null)
    {
        if(is_null($countryCode))
            return false;

        if(is_null($request))
            return false;

        switch ($countryCode) 
        {
            case 'id':
                return isIndonesiaPhoneNumber::isIndonesiaPhoneNumber($request);
                break;
            
            default:
                return false;
                break;
        }
    }

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
        return isSoftDeleted::isSoftDeleted($request);
    }

    /**
     * CheckErrorStatusAccount
     *
     * @param string $key
     * @param string $value
     * @return object
     */
    public static function CheckErrorStatusAccount($key, $value)
    {
        return CheckErrorStatusAccount::CheckErrorStatusAccount($key, $value);
    }
}
