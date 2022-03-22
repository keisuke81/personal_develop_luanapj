<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth; //追記
use Laravel\Socialite\Facades\Socialite; //追記
use App\Models\User; //追記
use Illuminate\Http\Request;//追記


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

    public function redirectToProvider()
    {
        return Socialite::driver('line')->redirect(route('callbacking'));
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        $provided_user = Socialite::driver('line')->user();

        $user = User::where('line_id', $provided_user->id)
            ->first();

        if ($user === null) {
            // redirect confirm
            $user = User::create([
                'name'               => $provided_user->name,
                'provider'           => 'line',
                'line_id'   => $provided_user->id,
            ]);
        }

        Auth::login($user);
        $user_id = Auth::id();

        return redirect()->route('getMypage',['user_id' => $user_id]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('welcome');
    }

}
