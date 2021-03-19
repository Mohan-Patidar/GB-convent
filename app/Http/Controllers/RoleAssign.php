<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Session;
class RoleAssign extends Controller
{

    public function index()
    {
        $users = User::get();
      
        return view('backend.assignrole.index', compact('users'));
    }

    public function create()
    {
    
        return view('backend.assignrole.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'password'  => 'required|string|min:8',
            'user_type' =>'required',
        ]);
        $user= new User();
        $user->name = $request->name;
        $user->user_type=$request->user_type;
        $user->password= Hash::make($request->password);
        $user->save();
        // $user = User::create([
        //     'name'      => $request->name,
        //     'user_type' =>$request->user_type,
        //     'password'  => Hash::make($request->password),
           
        // ]);

        Session::flash('message', 'Role assign added successfuly!');

        return redirect()->route('assignrole.index');
    }

    public function edit($id)
    {
        $user = User::where("id", "=", $id)->first();
        
        return view('backend.assignrole.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            
        ]);
        $user = User::where("id", "=", $id)->first();
        
        $user->name = $request->name;
        $user->user_type=$request->user_type;
        $user->password= Hash::make($request->password);
        $user->update();
        

        return redirect()->route('assignrole.index');
    }

    public function destroy(request $request){
        $id = $request->all();
        User::destroy($id);
        // Session::flash('message', ' data delete successfuly!');
       

    }
    // NOT DONE
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
        
    //     // $user->removeRole('writer');
    //     // $user->syncRoles(['writer', 'admin']);

    //     // if ($user->delete()) {

    //     //     if($user->profile_picture != 'avatar.png') {

    //     //         $image_path = public_path() . '/images/profile/' . $user->profile_picture;

    //     //         if (is_file($image_path) && file_exists($image_path)) {

    //     //             unlink($image_path);
    //     //         }
    //     //     }
            
    //     // }

    //     return back();
    // }
}
