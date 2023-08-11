<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
		$emailFlag = User::where('email', '=', $request->email)->get();
		if (count($emailFlag) > 0){
			//MailController::sendSignupEmail($request->firstname, $request->email, $emailFlag->verification_code);
			return redirect()->back()->with(session()->flash('error', 'Register_success1'));
		} else{
        	$user = new User();
			$user->firstname = $request->firstname; 
			$user->lastname = $request->lastname; 
			$user->email = $request->email; 
			$user->password = Hash::make($request->password); 
			$user->role     = 'client';
			$user->verification_code = sha1(time());
			$user->save();

			if($user != null){  
				MailController::sendSignupEmail($user->firstname, $user->email, $user->verification_code);
				return redirect()->back()->with(session()->flash('success', 'Register_success2'));
			} else{
				return redirect()->back()->with(session()->flash('error', 'Register_error'));
			}
		}

        //show error message
    }

    public function verifyUser(Request $request)
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code'=>$verification_code])->first();

        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('success', 'Register_success3'));
        } else{
			return redirect()->route('login')->with(session()->flash('error', 'Register_error'));
		}
    }

    // Register
    public function showRegistrationForm()
    {
        $pageConfigs = ['bodyCustomClass' => 'register-bg', 'isCustomizer' => true];

        return view('/auth/register', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}
