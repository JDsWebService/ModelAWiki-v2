<?php

namespace App\Http\Controllers\Auth\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    // show the admin login form
    public function showLoginForm() {
        return view('auth.admin.login');
    }

    public function login(Request $request) {
        // Validate the Form Data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to login the admin
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // redirect if successful
            return redirect()->intended(route('admin.dashboard'));
        }

        // redirect if unsuccessful w/ form data
        return redirect()->back()->withInputs($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.dashboard');
    }
}
