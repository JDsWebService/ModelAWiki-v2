<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Traits\UsernameTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
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
    use UsernameTrait;

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback()
    {
        $socialiteUser = Socialite::driver('facebook')->user();

        if($this->loginSocialiteUser($socialiteUser)) {
            return redirect()->route('user.profile.self');
        } else {
            abort(401);
        }
    }

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToTwitterProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleTwitterProviderCallback()
    {
        $socialiteUser = Socialite::driver('twitter')->user();

        if($this->loginSocialiteUser($socialiteUser)) {
            return redirect()->route('user.profile.self');
        } else {
            abort(401);
        }
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        $socialiteUser = Socialite::driver('google')->user();

        if($this->loginSocialiteUser($socialiteUser)) {
            return redirect()->route('user.profile.self');
        } else {
            abort(401);
        }
    }

    /**
     * Login the Socialite User.
     *
     * @return bool
     */
    public function loginSocialiteUser($socialiteUser) {
        // Find the User
        $user = User::where('email', $socialiteUser->getEmail())->first();

        if($user) {
            // Update User Profile Image
            $user->profile_image = $socialiteUser->getAvatar();
            
            $user->save();

            // Log the User In
            Auth::guard('user')->login($user);
            return true;
        } else {
            // Create the new user
            $user = new User;

            $name = explode(' ', $socialiteUser->getName());
            $user->first_name = $name[0];
            $user->last_name = $name[1];
            $user->email = $socialiteUser->getEmail();
            $user->username = $this->generateRandomUserNumber('user');
            $user->profile_image = $socialiteUser->getAvatar();
            $user->password = Hash::make(str_random(10));
            // $user->profile_image = $socialiteUser->getAvatar();
            // $user->profile_image_thumbnail = $socialiteUser->getAvatar();
            $user->save();

            Auth::guard('user')->login($user);
            return true;
        }
        // Something Went Wrong
        return false;
    }

    


}
