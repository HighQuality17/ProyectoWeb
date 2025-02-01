<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
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
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo;


    public function __construct()
    {
        $this->middleware('guest');
        $redirectTo = '/profile/home';
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
            'idcard' => ['required', 'integer', 'min:8', 'unique:users,idcard'],
            'phone' => ['required', 'integer', 'min:8', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        dd($data);
        $role = 2;
        $status = 1;
        $redirectPath = '/profile/home';
        
        if($data['rol_seleccionado'] == 'proveedor'){
            $role = 3;
            $status = 0;
            $redirectPath = '/provider/home';
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'idcard' => $data['idcard'],
            'phone' => $data['phone'],
            'status' => $status,
            'password' => Hash::make($data['password']),
            'role_id' => $role,
        ]);

        // dd($user);
        // Asignar la ruta de redirección
        $this->redirectTo = $redirectPath;

        return $user;
    }


        // return redirect()->intended(RouteServiceProvider::HOME);

        // if($data['solicitar_ser_proveedor'] ==1){
        //     $role= 3;
        //     $status=0;
        //     $redirectTo='provider.home';
        // }else{
        //     $role= 2;
        //     $status=1;
        //     $redirectTo='profile.home';
        // }
        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'idcard' => $data['idcard'],
        //     'phone' => $data['phone'],
        //     'password' => Hash::make($data['password']),
        //     'role_id' => $role,
        //     'status' => $status,
        // ]);

    
//     }
}
