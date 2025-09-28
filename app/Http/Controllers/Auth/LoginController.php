<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{ 
     public function showLoginForm()
    {
        return view('auth.login');
    }
   protected function authenticated(Request $request, $user)
   
{
    if ($user->hasRole('Admin')) {
        return redirect()->route('home');
    }

    if ($user->hasRole('Schooldmin')) {
        return redirect()->route('school.dash');
    }

    if ($user->hasRole('teacher')) {
        return redirect()->route('teacher.dash');
    }

    if ($user->hasRole('staff')) {
        return redirect()->route('staff.dash');
    }

    if ($user->hasRole('student')) {
        return redirect()->route('student.dash');
    }

    if ($user->hasRole('parent')) {
        return redirect()->route('parent.dash');
    }

    return redirect('/home'); // fallback
}
}


//     return redirect('/home'); // fallback

// class LoginController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Login Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles authenticating users for the application and
//     | redirecting them to your home screen. The controller uses a trait
//     | to conveniently provide its functionality to your applications.
//     |
//     */

//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = '/home';

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//         $this->middleware('auth')->only('logout');
//     }
// }

