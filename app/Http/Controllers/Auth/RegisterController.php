<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Developer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use File;

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
    protected function create(array $data)
    {
        $request = request();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
        ]);

        $avatar = $request->file('avatar');
        
        $upload_path = 'avatar/'.$user['id'];

        if (! File::exists(public_path().'/'.$upload_path)) {
            File::makeDirectory(public_path().'/'.$upload_path,0777,true);
        }

        $avatarSaveAsName = $upload_path.'/'. $avatar->getClientOriginalName();
        
        //$avatar_url = $upload_path.'/'.$avatarSaveAsName;
        $avatar->move($upload_path, $avatarSaveAsName);

        User::where('id', $user['id'])
        ->update([
            'avatar' => $avatarSaveAsName,
        ]);

        // $developer = new Developer;

        //     $developer->fill([
        //         'user_id' => $user['id'],
        //         'avatar' => $avatar_url,
        //     ]);

        //     $developer->save([$developer]);

        return $user;
    }
}
