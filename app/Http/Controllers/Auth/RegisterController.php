<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Flash;
use App\Models\Patient;


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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $ktp = $data['ktp'];
        $ktp = $data['patient_id'];

        if(!empty($ktp)&&$data['role']=='patient'){
            $patient = Patient::where('ktp',$ktp)->first();
            $exist = User::where('patient_id',$ktp)->first();
            if (!empty($exist)){
                Flash::warning('KTP already used');

                return;
            }

            if (empty($patient)){
                Flash::warning('KTP not found');

                // return redirect(route('register'));
                return;
            }
        }
        return User::create([
            'name' => $data['name'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            // 'password' => Hash::make($data['password']),
            // 'patient_id' => $data['ktp'],
            'patient_id' => $data['patient_id'],
            'status' => 'non-active',
        ]);
    }

    public function register(Request $data)
    {
        $this->validator($data->all())->validate();

        $ktp = $data->input('ktp');

        if(!empty($ktp)&&$data->input('role')=='patient'){
            $patient = Patient::where('ktp',$ktp)->first();
            $exist = User::where('patient_id',$ktp)->first();
            if (!empty($exist)){
                Flash::warning('KTP already used');

                return;
            }

            if (empty($patient)){
                Flash::warning('KTP not found');

                // return redirect(route('register'));
                return;
            }
        }

        event(new Registered($user = $this->create([
            'name' => $data->input('name'),
            'role' => $data->input('role'),
            'email' => $data->input('email'),
            // 'password' => Hash::make($data->input('password')),
            'password' => $data->input('password'),
            'patient_id' => $data->input('ktp'),
            'status' => 'non-active',
        ])));
        Flash::success('Wait for Your Data Validation');

        return redirect("login")->with('message', 'Wait for Your Data Validation');
    }
}
