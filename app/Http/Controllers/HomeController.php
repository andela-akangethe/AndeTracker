<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Method to redirect you to view based on your status
     *
     * @return dashboard view if admin, book view if a regular
     * user and homepage view if not logged in
     */
    
    public function index()
    {
        // Get current year
        $year = date("Y");

        if (Auth::check() !== false) {
            if (Auth::user()->access_level === 1) {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->access_level === 0) {
                return redirect()->route('request');
            }
        }

        return view('homepage', compact('year'));
    }

    /**
     * Method to take admin user to view to make request
     *
     * @return dashboard view
     */
    public function getDashboard()
    {
        if (Auth::user()->access_level === 1) {
            return view('dashboard');
        }
        alert()->success('Your account has been created and you can now log in', 'Success');
        return redirect()->route('login');
    }
}
