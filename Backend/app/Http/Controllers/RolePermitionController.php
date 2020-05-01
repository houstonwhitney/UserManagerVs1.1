<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\RolePermission;

class RolePermitionController extends Controller
{
    //
   public function ajoutRolePermission(Request $request){
       
        $request->validate([
            'role_id' => 'required',
            'permition_id' => 'required'
        ]);
        $RolePermission = new RolePermission();
        
        $RolePermission->role_id = request('role_id');
        $RolePermission->permition_id = request('permition_id');
        $RolePermission->isActive = true;
        $RolePermission->save();

        return response()->json([
            'RolePermission' => $RolePermission
        ]);
    }


    public function getAllRolePermission(){
        return RolePermission::all();
    }

    public function deleteRolePermission($id){
        $RolePermission= RolePermission::find($id);
        $RolePermission->delete();
        return response()->json();
    }
    // public function getListeRolePermissionRoleOf($id){
    //     // RolePermission::whereFirstName($param)->first();
    //     // RolePermission::whereFirstName($param)->get();
     
    // }

    // public function listeRole($id){
    //     $list = RolePermissionRole::whereRolePermissionId($id)->get();;
    //     $roles = [];
    //     for ($i=0; $i < count($list); $i++) { 
    //         # code...
    //         $roles[$i] = role::find($list[$i]->role_id);
    //     }
    //     return $roles;
    // }

    public function findById($id){
        return RolePermission::find($id);
    }

    public function findByName($name){
        return RolePermission::whereFirstName($name)->get();
    }

}
