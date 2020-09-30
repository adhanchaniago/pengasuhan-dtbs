<?php

namespace App\Contracts;

// Vendor
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Exception;

// Model
use App\Models\User;

// Model tools
use App\Models\User\Account;

trait ProcessingLoginRequest
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Country Code
     *
     * @var string
     */
    static protected $countryCode;

    /**
     * variable contains error message when authenticating
     *
     * @var array
     */
    static protected $credentialsErrorMessage = [
        'email'             => 'Email belum terdaftar nih sob!',
        'username'          => 'Nama pengguna belum terdaftar nih sob!',
        'number_phone'      => 'Nomor telepon belum terdaftar nih sob!',
        'password_wrong'    => 'Kata sandi salah sob!',
        'is_soft_deleted'   => 'Akun kamu telah dihapus sob, coba hubungi admin yaa!',
    ];

    /**
     * The main function in authenticating user logins
     *
     * @param object $request
     * @return void
     */
    public static function loginAttempt($request)
    {
        /**
         * App country code
         * 
         * @param string
         */
        self::$countryCode = env('APP_LOCALE');

        /**
         * Error Message
         * 
         * @return object
         */
        $errorMessage = (object) self::$credentialsErrorMessage;

        /** 
         * Request Credentials
         * 
         * @return string
         */
        $username   = $request->username;
        $password   = $request->password;

        /**
         * Remember Variable
         * 
         * @return string
         */
        $remember   = ($request->remember) ? $request->remember : '';

        /**
         * Is Email ?
         * 
         * @return boolean
         */
        $isEmail    = filter_var($username, FILTER_VALIDATE_EMAIL);

        /**
         * Is Number Phone?
         * 
         * @return boolean
         */
        $isNumberPhone = preg_match('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/', $username);

        /**
         * Check the country code from the phone number
         *
         * Check the authentication using a phone number, 
         * whether the number matches the country code with 
         * the application configuration
         * 
         * @param string $credentials
         * @param string $username
         * @return void
         */
        $CheckCountryCodeOfNumberPhone  = self::CheckCountryCodeOfNumberPhone(self::$countryCode, $username, $isNumberPhone);

        // $CheckCountryCodeOfNumberPhone validation
        if(isset($CheckCountryCodeOfNumberPhone) && !$CheckCountryCodeOfNumberPhone->status)
        {
            return redirect()
                        ->back()
                        ->withErrors(['error' => $CheckCountryCodeOfNumberPhone->message])
                        ->withInput();
        }

        /**
         * Login With
         *
         * @param object $credentials
         * @param boolean $isEmail
         * @param boolean $isNumberPhone
         * @return App\Contracts\ProcessingLoginRequest::loginAttempt
         */
        $loginWith = self::loginWith($request, $isEmail, $isNumberPhone);
        
        // Validate $loginWith
        if(isset($loginWith) && !empty($loginWith))
        {
            return redirect()
                        ->back()
                        ->withErrors(['error' => $loginWith])
                        ->withInput();
        }

        /**
         * Soft Deletes
         * 
         * @param string $account
         * @return App\Contracts\isSoftDeleted::check
         */
        $isSoftDeleted = self::isSoftDeleted($username);
        
         // Validating requests $isSoftDeleted
         if($isSoftDeleted)
        {
            return redirect()
                        ->back()
                        ->withErrors(['error' => self::$credentialsErrorMessage['is_soft_deleted']])
                        ->withInput();
        }

        /**
         * Packaging and executing functions loginDetenctionUsing()
         * 
         * @param boolean $isEmail
         * @param boolean $isNumberPhone
         * @return string
         */
        $loginDetectionUsing = self::loginDetectionUsing($isEmail, $isNumberPhone);

        /**
         * Packaging and executing functions CheckErrorStatusAccount()
         * 
         * @param string $loginDetectionUsing
         * @param string $username
         * @return object
         */
        $CheckErrorStatusAccount = Account::CheckErrorStatusAccount($loginDetectionUsing, $username);

        // Filtering the results of the run CheckErrorStatusAccount function
        if(isset($CheckErrorStatusAccount->status) && $CheckErrorStatusAccount->status)
        {
            return redirect()
                        ->back()
                        ->withErrors(['error' => $CheckErrorStatusAccount->message])
                        ->withInput();
        }
            
        /**
         * Run the Auth::attempt authentication function
         * 
         * @param string $username
         * @param string $password
         * @param boolean $remember
         * @param string $loginDetectionUsing
         * @return boolean
         */
        $RunAuthAttempt = self::RunAuthAttempt($username, $password, $remember, $loginDetectionUsing);

        // Check the result of the $RunAuthAttempt variable
        if($RunAuthAttempt)
        {
            // Successful authentication, redirecting users to their respective roles
            return redirect()->route('home');

        } else
        {
            // Authentication failed, redirect error as wrong password
            return redirect()
                        ->back()
                        ->withInput($request->only('username'))
                        ->withErrors([
                            'password' => $errorMessage->password_wrong,
                        ]);
        }
    }

    /**
     * RunAuthAttempt
     *
     * Performs login authentication for user requests
     * 
     * @param string $username
     * @param string $password
     * @param boolean $isRemember
     * @param string $loginDetectionUsing
     * @return boolean
     */
    protected static function RunAuthAttempt($username, $password, $isRemember, $loginDetectionUsing)
    {
        // Wrap the Auth::attempt command in the $ run variable
        $run = Auth::attempt([$loginDetectionUsing => $username, 'password' => $password], $isRemember);

        // Returns result in boolean form (true) if authentication is successful
        if($run) 
            return true;
    }

    /**
     * loginDetectionUsing
     * 
     * Check for authentication requests using username, email or phone number
     *
     * @param boolean $isEmail
     * @param boolean $isNumberPhone
     * @return string
     */
    protected static function loginDetectionUsing($isEmail, $isNumberPhone)
    {
        // Request based on email
        if($isEmail)
            return 'email';

        // Request based on number phone
        if($isNumberPhone)
            return 'nohp';

        // Request based on username
        if(!$isEmail && !$isNumberPhone)
            return 'username';
    }

    /**
     * loginWith
     * 
     * Validate login requests using username, email, or 
     * phone number whether the data provided is correct 
     * or not. As well as other mistakes
     *
     * @param object $credentials
     * @param boolean $isEmail
     * @param boolean $isNumberPhone
     * @return string
     */
    protected static function loginWith($credentials = null, $isEmail, $isNumberPhone)
    {
        try 
        {
            // Wraps and changes into the object data type for the $credentialsErrorMessage 
            // variable into the $errorMessage variable
            $errorMessage = (object) self::$credentialsErrorMessage;

            // Authentication requests using email
            if($isEmail)
            {
                $loginWith = User::where('email', $credentials->username)
                        ->withTrashed()
                        ->first();
            }
            
            // Authentication requests using a username
            if(!$isEmail && !$isNumberPhone)
            {
                $loginWith = User::where('username', $credentials->username)
                    ->withTrashed()
                    ->first();
            }
        
            // Authentication requests using a phone number
            if($isNumberPhone)
            {
                $loginWith = User::where('nohp', $credentials->username)
                                ->withTrashed()
                                ->first();
                    
            }

            // Check for errors from the results of the request, 
            // if no errors are found it will return in void
            if(is_null($loginWith) && $isEmail)
            {
                // The requested email was not found
                throw new Exception($errorMessage->email);

            } else if(is_null($loginWith) && $isNumberPhone)
            {
                // The phone number requested was not found
                throw new Exception($errorMessage->number_phone);

            } else if(is_null($loginWith) && !$isEmail)
            {
                // The requested username was not found
                throw new Exception($errorMessage->username);
            }
            
        } catch (\Exception $res) 
        {
            // Return the throw to $res
            return $res->getMessage();
        }
    }

    /**
     * CheckCountryCodeOfNumberPhone
     * 
     * Check that the request for a phone number matches 
     * the region / country code configuration in the application
     *
     * @param string $countryCode
     * @param string $numberPhone
     * @return object
     */
    protected static function CheckCountryCodeOfNumberPhone($countryCode, $numberPhone, $isNumberPhone)
    {
        if($isNumberPhone)
            return Account::ValidateCountryCodeNumberPhone($countryCode, $numberPhone);
    }

    /**
     * isSoftDeleted
     * 
     * Check if the account you want to authenticate has been temporarily deleted
     *
     * @param string $username
     * @return boolean
     */
    protected static function isSoftDeleted($username)
    {
        return Account::isSoftDeleted($username);
    }

    

    
}
