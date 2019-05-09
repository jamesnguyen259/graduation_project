<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\FacebookAccount;

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

    protected function authenticated(Request $request, $user)
    {
        $notification = array(
            'message' => 'Sign-in successful!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        auth()->login($authUser, true);
        $notification = array(
            'message' => 'Sign-in successful!',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }


    public function findOrCreateUser($providerUser, $provider)
    {
        $account = FacebookAccount::whereProvider($provider)
                  ->whereProviderId($providerUser->getId())
                  ->first();

        if ($account) {
            return $account->user;
        } else {
            #create a new accounts
            $account = new FacebookAccount([
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
            ]);

            $email = !empty($providerUser->getEmail()) ? $providerUser->getEmail() : $providerUser->getId() . '@' . $provider . '.com';

            /** Get User Auth */
            if (auth()->check()) {
                $user = auth()->user();
            }

            else{
                $user = User::whereEmail($email)->first();
            }

            if (! $user) {
                $user = User::create([
                   'email' => $email,
                   'name'  => $providerUser->getName(),
               ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
