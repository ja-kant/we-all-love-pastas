<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\SocialAccount;
use App\User;

class SocialController extends Controller {

    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {
        $socialiteUser = Socialite::driver($provider)->stateless()->user();

        if (is_array($socialiteUser->accessTokenResponseBody) && array_key_exists("email", $socialiteUser->accessTokenResponseBody) && $socialiteUser->accessTokenResponseBody["email"]
        ) {
            $socialiteUser->email = $socialiteUser->accessTokenResponseBody["email"];
        }

        $user = $this->findOrCreateUser($provider, $socialiteUser);
        auth()->login($user, true);
        return redirect('/');
    }

    public function findOrCreateUser($provider, $socialiteUser) {
        if ($user = $this->findUserBySocialId($provider, $socialiteUser->getId())) {
            return $user;
        }

        if ($user = $this->findUserByEmail($provider, $socialiteUser->getEmail())) {
            $this->addSocialAccount($provider, $user, $socialiteUser);
            return $user;
        }

        $user = User::create([
                    'name' => $socialiteUser->getName(),
                    'email' => $socialiteUser->getEmail(),
                    'password' => bcrypt(\Str::random(25)),
        ]);

        $this->addSocialAccount($provider, $user, $socialiteUser);

        return $user;
    }

    public function findUserBySocialId($provider, $id) {
        $socialAccount = SocialAccount::where('provider', $provider)
                ->where('provider_id', $id)
                ->first();

        return $socialAccount ? $socialAccount->user : false;
    }

    public function findUserByEmail($provider, $email) {
        return !$email ? null : User::where('email', $email)->first();
    }

    public function addSocialAccount($provider, $user, $socialiteUser) {
        SocialAccount::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
            'token' => $socialiteUser->token,
        ]);
    }

}
