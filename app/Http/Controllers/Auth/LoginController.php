<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     public function login(Request $request)
//     {
//         $credentials = $request->only('email', 'password'); 

//         if (Auth::attempt($credentials)) {
//             $user = Auth::user();

//             // Redirect based on role
//             if ($user->hasRole('Admin')) {
//                 return redirect()->route('home');
//             } elseif ($user->hasRole('School Admin')) {
//                 return redirect()->route('schools.index');
//             } elseif ($user->hasRole('Staff')) {
//                 return redirect()->route('staff.dashboard');
//             } elseif ($user->hasRole('Student')) {
//                 return redirect()->route('student.dashboard');
//             } elseif ($user->hasRole('Parent')) {
//                 return redirect()->route('parent.dashboard');
//             }
//         }

//         return back()->withErrors(['email' => 'Invalid credentials']);
//     }

//     public function logout()
//     {
//         Auth::logout();
//         return redirect()->route('login');
//     }
// }



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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}

