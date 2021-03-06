<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function loginPage()
    // {
    //     return view('auth.login');
    // }
    // public function loginProcess(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $credentials = $request->except(['_token']);

    //     $user = User::where('email',$request->email)->first();

    //     if (auth()->attempt($credentials)) {

    //         return redirect()->route('home');

    //     }else{
    //         session()->flash('error', 'Invalid credentials');
    //         return redirect()->back();
    //     }
    // }

    // public function logout()
    // {
    //     \Auth::logout();

    //     return redirect()->route('home');
    // }
}
