<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->user();
        try {

            $create = User::firstOrCreate([
                'email' => $user->getEmail()
            ], [
                'socialite_name' => $driver,
                'socialite_id' => $user->getId(),
                'name' => $user->getName(),
                'photo' => $user->getAvatar(),
                'email_verified_at' => now()
            ]);

            auth()->login($create, true);
            return redirect($this->redirectPath());
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        // $user->token;
    }
}
