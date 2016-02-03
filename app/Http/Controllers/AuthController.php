<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Method to return login view
     *
     * @return login view
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Method to validate login credentials
     *
     * @return request view if not admin and dashboard if admin
     */
    public function postLogin(Request $request)
    {
        // Validate the information given
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // Confirm that the user does in deed exist
        if (! Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            alert()->error('Could not log you in with those credentials', 'Sorry');
            return redirect()->route('login');
        } else {
            if (Auth::user()->access_level === 1) {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->access_level === 0) {
                return redirect()->route('request');
            }
        }
    }

    /**
     * Method to return Signup view
     *
     * @return Signup view
     */
    public function getSignUp()
    {
        return view('auth.signup');
    }

    /**
     * Method to validate Signup credentials and register users
     *
     * @return login view
     */
    public function postSignUp(Request $request)
    {
        // Validate the information given
        $this->validate($request, [
            'first_name' => 'required|unique:users|alpha_dash|min:3|max:20',
            'last_name' => 'required|unique:users|alpha_dash|min:3|max:20',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        // Create a new user with the validated information
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'access_level' => 0,
            'password' => bcrypt($request->input('password'))
        ]);

        // Provide a sweet alert pop up
        alert()->success('Your account has been created and you can now log in', 'Success');

        return redirect()->route('login');
    }

    /**
     * Method to logout users
     * @return home route
     */
    public function getSignOut()
    {
        Auth::logout();

        alert()->success('You are now Logged out', 'Success');

        return redirect()->route('home');
    }
}
