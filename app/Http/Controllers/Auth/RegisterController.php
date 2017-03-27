<?php

namespace App\Http\Controllers\Auth;

use App\Modules\Auth\User;
use App\Http\Controllers\Controller;
use App\Modules\Auth\UserMailer;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Styde\Html\Facades\Alert;

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
    protected $redirectTo;

    private $userMailer;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('web.home');

        $this->middleware('guest')->except('getConfirmation');

        $this->userMailer = new UserMailer();
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
            'first_name'   => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'last_name'    => 'required|string|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            'email'        => 'required|email|max:60|unique:users',
            'password'     => 'required|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name'         => $data['first_name'],
            'last_name'          => $data['last_name'],
            'email'              => $data['email'],
            'password'           => $data['password'],
            'registration_token' => str_random(60),
        ]);

        $this->userMailer->confirmation($user, $data['password']);

        Alert::success('users.register.create', ['name' => $user->fullname]);

        return $user;
    }

    public function getConfirmation($token)
    {
        try {

            $user = User::where('registration_token', $token)->firstOrFail();

            $user->registration_token = null;

            $user->save();

            Alert::success(trans('users.register.confirm'));

        } catch (Exception $e) {

            Alert::info(trans('users.register.confirm_ok'));
        }

        return redirect($this->redirectPath());
    }
}
