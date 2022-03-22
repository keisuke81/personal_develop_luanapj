<?php

namespace App\Http\Controllers\Companion\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth; //追記
use Laravel\Socialite\Facades\Socialite; //追記
use App\Models\User; //追記
use App\Models\Companion;
use Illuminate\Http\Request; //追記
use Illuminate\Support\Str;//追記


class CompanionLoginController extends Controller
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

    public function cast_redirectToProvider()
    {
        $state = Str::random(32);
        $nonce  = Str::random(32);

        $uri = "https://access.line.me/oauth2/v2.1/authorize?";
        $response_type = "response_type=code";
        $client_id = "&client_id=" . config('services.line2.client_id');
        $redirect_uri = "&redirect_uri=" . config('services.line2.redirect');
        $state_uri = "&state=" . $state;
        $scope = "&scope=openid%20profile";
        $prompt = "&prompt=consent";
        $nonce_uri = "&nonce=";

        $uri = $uri . $response_type . $client_id . $redirect_uri . $state_uri . $scope . $prompt . $nonce_uri;
        dd($uri);

        return redirect($uri);
    }

    // アクセストークン取得
    public function getAccessToken($req)
    {

        $headers = ['Content-Type: application/x-www-form-urlencoded'];
        $post_data = array(
            'grant_type'    => 'authorization_code',
            'code'          => $req['code'],
            'redirect_uri'  => config('services.line2.redirect'),
            'client_id'     =>  config('services.line2.client_id'),
            'client_secret' => config('services.line2.client_secret'),
        );
        $url = 'https://api.line.me/oauth2/v2.1/token';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));

        $res = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($res);
        $accessToken = $json->access_token;

        return $accessToken;
    }

    // プロフィール取得
    public function getProfile($at)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $at));
        curl_setopt($curl, CURLOPT_URL, 'https://api.line.me/v2/profile');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST,
            'GET'
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($res);

        return $json;
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function cast_handleProviderCallback(Request $request)
    {
        $accessToken = $this->getAccessToken($request);
        $profile = $this->getProfile($accessToken);

        // ユーザー情報あるか確認
        $user = Companion::where('line_id', $profile->userId)->first();

        // あったらログイン
        if ($user) {
            Auth::login($user);
            $user_id = Auth::id();
            return redirect('getMypage',[$user_id]);

            // なければ登録してからログイン
        } else {
            $user = new Companion();
            $user->provider = 'line';
            $user->line_id = $profile->userId;
            $user->name = $profile->displayName;
            $user->save();
            Auth::login($user);
            $user_id = Auth::id();
            return redirect('getMypage',[$user_id]);
        }
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
