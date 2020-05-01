<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UserGroup;

class UserGroupController extends Controller
{
    //
   public function ajoutUserGroup(Request $request){
       
          
    $request->validate([
        'user_id' => 'required',
        'goup_id' => 'required',
        'isCreator' => 'required',
        'isAdmin' => 'required',
    ]);
    $UserGroup = new UserGroup();

    
    $UserGroup->user_id = request('user_id');
    $UserGroup->group_id = request('goup_id');
    $UserGroup->isCreator = request('isCreator');
    $UserGroup->isAdmin = request('isAdmin');
    $UserGroup->isActive = true;
    $UserGroup->save();

    return response()->json([
        'UserGroup' => $UserGroup
    ]);

        return response()->json([
            'UserGroup' => $UserGroup
        ]);
    }


    public function getAllUserGroup(){
        return UserGroup::all();
    }

    public function deleteUserGroup($id){
        $UserGroup= UserGroup::find($id);
        $UserGroup->delete();
        return response()->json();
    }
    // public function getListeUserGroupRoleOf($id){
    //     // UserGroup::whereFirstName($param)->first();
    //     // UserGroup::whereFirstName($param)->get();
     
    // }

    // public function listeRole($id){
    //     $list = UserGroupRole::whereUserGroupId($id)->get();;
    //     $roles = [];
    //     for ($i=0; $i < count($list); $i++) { 
    //         # code...
    //         $roles[$i] = role::find($list[$i]->role_id);
    //     }
    //     return $roles;
    // }

    public function findById($id){
        return UserGroup::find($id);
    }


    public function makeAdmin($id){
        $user = UserGroup::whereUserId($id);
        if($user->isAdmin){
            return  response()->json([
                'message' => 'this user is admin'
            ], 400);
        }
        $user->isAdmin = true;
        $user->update($user);
        return response()->json($data);
    }

    public function removeAdmin($id){
        $user = UserGroup::whereUserId($id);
        if($user->isCreator){
            return  response()->json([
                'message' => 'this user is creator'
            ], 400);
        }
        $user->isAdmin = false;
        $user->update($data);
        return response()->json($data);
    }

}
