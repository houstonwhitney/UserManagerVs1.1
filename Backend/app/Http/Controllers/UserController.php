<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\ Support \Str;
use App\User;

class UserController extends Controller
{
    //
   public function ajoutUser(Request $request){
       
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
        $User = new User();
        if($file = $request->file('profil_image')){
            $request->validate(['profil_image'=>'image|mimes: jpeg,jpg,png,svg']);
            $extension = $file->getClientOriginalExtension();
            $relativeDestination = "uploads/users";
            $destinationPath = public_path($relativeDestination);
            $safeName = str_replace(' ','_',$request->email).time().'.'.$extension;
            $file->move($destinationPath, $safeName);
            $User->profil_image = url("$relativeDestination/$safeName");
            echo $User->profil_image;
        }

        
        $User->first_name = request('first_name');
        $User->last_name = request('last_name');
        $User->email = request('email');
        $email = $User->email;
        $password=$this->getPasssword();
        $User->password = bcrypt($password);
        $name = $User->first_name . ' ' . $User->last_name;
        $User->save();
        $this->send_maill($password,$email, $name);
        return response()->json([
            'User' => $User
        ]);
    }


    public function getAllUser(){
        return User::all();
    }

    public function deleteUser($id){
        $user= User::find($id);
        $user->delete();
        return response()->json();
    }
    // public function getListeUserRoleOf($id){
    //     // User::whereFirstName($param)->first();
    //     // User::whereFirstName($param)->get();
     
    // }

    // public function listeRole($id){
    //     $list = UserRole::whereUserId($id)->get();;
    //     $roles = [];
    //     for ($i=0; $i < count($list); $i++) { 
    //         # code...
    //         $roles[$i] = role::find($list[$i]->role_id);
    //     }
    //     return $roles;
    // }

    public function findById($id){
        return User::find($id);
    }

    public function findByName($name){
        return User::whereFirstName($name)->get();
    }

    public function updateUser(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'id' => 'required'
        ]);
        $id = $request->id;
        $user = User::find($id);

        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        

        if ($file = $request->file('profil_image')) {
            $request->validate(['profil_image' => 'image|mimes:jpeg,png,jpg,svg,PNG']);
            $extension = $file->getClientOriginalExtension();
            $relativeDestination = "uploads/users";
            $destinationPath = public_path($relativeDestination);
            $safeName = str_replace(' ', '_', $user->name) . time() . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $data['profil_image'] = url("$relativeDestination/$safeName");
            //Delete old user image if exxists
            if ($user->profil_image) {
                $oldImagePath = str_replace(url('/'), public_path(), $user->profil_image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }
        }
        $user->update($data);
        return response()->json($data);
    }

    public function getPasssword(){
        return Str::random(10);
    }

    
    public function send_maill($password, $email, $name) {
        $data = array('name'=>$name,'password'=>$password);

        Mail::send('mail', $data, function($message) use ($email) {
           $message->to($email, 'Get Your Password')->subject
              ('Welsome To UserManager');
        //    $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        //    $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
           $message->from('simulateurramses75@gmail.com','Send The Password');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }

     public function getRolesById($id){
         $users = User::find($id);
         return $users->roles;
     }
    
}
