<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $developers = DB::table('users')
                    ->where('role', '=', "Developer")
                    ->get();
        
        return view('home', compact('developers'));
    }

    public function newUser()
    {
        return view('developer.newUser');
    }

    public function createUser(Request $request)
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'phone_number' => $request['phone_number'],
            'address' => $request['address'],
            'role' => "Developer",
        ]);

        $avatar = $request->file('avatar');
        
        $upload_path = 'avatar/'.$user['id'];

        if (! File::exists(public_path().'/'.$upload_path)) {
            File::makeDirectory(public_path().'/'.$upload_path,0777,true);
        }

        $avatarSaveAsName = $upload_path.'/'. $avatar->getClientOriginalName();

        $avatar->move($upload_path, $avatarSaveAsName);

        User::where('id', $user['id'])
        ->update([
            'avatar' => $avatarSaveAsName,
        ]);

        return back()->with('message','New develepor has been created'); 
    }

    public function edituser($id)
    {
        $user_details = User::find($id); 
        
        return view('developer.userdetail', compact('user_details'));
    }

    public function updateuser(Request $request, $id)
    {
        $oldavatar = DB::table('users')
        ->where('id','=', $id)
        ->value('avatar');

        if ($request->file('avatar'))
        {
            unlink(public_path($oldavatar));

            $upload_path = 'avatar/'.$id;

            $avatar_file = $request->file('avatar');
            $avatarSaveAsName = $upload_path.'/'. $avatar_file->getClientOriginalName();
            $avatar_file->move($upload_path, $avatarSaveAsName);

            User::where('id', $id)
            ->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'avatar' => $avatarSaveAsName,
            ]);
        }
        else{
            User::get()->contains('avatar', $oldavatar);

            User::where('id', $id)
            ->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
            ]);
        }

        return back()->with('message','User Updated');
    }

    public function deleteuser($id)
    {
        $users = User::find($id);

        $users->delete();

        return back()->with('message', 'Users has been succesfully removed.'); 
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        $oldavatar = DB::table('users')
        ->where('id','=', $ids)
        ->value('avatar');

        File::delete(public_path($oldavatar));

        User::whereIn('id',$ids)->delete();

        return response()->json(['success'=>"Users deleted successfully."]);
    }
}
