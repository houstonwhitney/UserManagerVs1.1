<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UserRole;

class UserRoleController extends Controller
{
    //
   public function ajoutUserRole(Request $request){
       
        $request->validate([
            'role_id' => 'required',
            'user_id' => 'required',
        ]);
        $User = new UserRole();

        
        $User->role_id = request('role_id');
        $User->user_id = request('user_id');
        $User->isActive = true;
        $User->save();

        return response()->json([
            'User' => $User
        ]);
    }


    public function getAllUserRole(){
        return UserRole::all();
    }

    public function deleteUserRole($id){
        $user= UserRole::find($id);
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
        return UserRole::find($id);
    }

    public function updateUserRole(Request $request){
        
    }

}
