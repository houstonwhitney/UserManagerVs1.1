<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\group;

class GroupController extends Controller
{
    //
   public function ajoutGroup(Request $request){
        $request->validate([
            'name' => 'required',
            'creatorName' => 'required',
            'description' => 'required',
            'creator_id' => 'required',
        ]);
        $group = new group();
        $group->name = request('name');
        $group->creatorName = request('creatorName');
        $group->description = request('description');
        $group->creator_id = request('creator_id');
        $group->save();

        return response()->json([
            'group' => $group
        ]);
    }

    
    public function findById($id){
        return group::find($id);
    }

    public function deleteGroup($id){
        $group= group::find($id);
        $group->delete();
        return response()->json();
    }
    public function getAllGroup(){
        return group::all();
    }

    public function updates(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'id' => 'required'
        ]);

        $id = $request->id;
        echo $request->id;
        $user = group::find($id);
        echo $user;
        $data = $request->all();
        

        $user->update($data);
        return response()->json($user);
    }
}
