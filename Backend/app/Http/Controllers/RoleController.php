<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;

class RoleController extends Controller
{
    //
   public function ajoutRole(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'creator_id' => 'required',
        ]);
        $role = new role();
        $role->name = request('name');
        $role->description = request('description');
        $role->creator_id = request('creator_id');
        $role->save();

        return response()->json([
            'role' => $role
        ]);
    }

    public function findById($id){
        return role::find($id);
    }

    public function deleteRole($id){
        $user= role::find($id);
        $user->delete();
        return response()->json();
    }
    public function getAllRole(){
        return role::all();
    }

    public function updates(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'id'=> 'required'
        ]);
        $id = $request->id;
        $user = role::find($id);

        $data = $request->all();
        
        $user->update($data);
        return response()->json($data);
    }
}
