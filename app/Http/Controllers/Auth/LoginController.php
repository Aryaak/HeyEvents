<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Event;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm()
    {
        $event = Event::inRandomOrder()->first();
        return view('auth.login', compact('event'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //tambahkan script di bawah ini
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
  
  
    //tambahkan script di bawah ini 
    public function handleProviderCallback()
    {
        try {
            $user_google    = \Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();

            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_google menyimpan data google account seperti email, foto, dsb

            if($user != null){
                \auth()->login($user, true);
                return redirect()->route('home');
            }else{
                $create = User::Create([
                    'email'             => $user_google->getEmail(),
                    'photo'             => 'default/' . rand(1, 8) . '.png',
                    'name'              => $user_google->getName(),
                    'slug'              => Str::slug($user_google->getName()),
                    'password'          => 0,
                    'email_verified_at' => now()
                ]);
        
                
                \auth()->login($create, true);
                return redirect()->route('home');
            }

        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('login');
        }


    }
}
