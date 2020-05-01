<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\permition;

class permitionController extends Controller
{
    //
   public function ajoutPermition(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $permition = new permition();
        $permition->name = request('name');
        $permition->description = request('description');
        $permition->save();

        return response()->json([
            'permition' => $permition
        ]);
    }

    public function findById($id){
        return permition::find($id);
    }

    public function deletepermition($id){
        $user= permition::find($id);
        $user->delete();
        return response()->json();
    }
    public function getAllpermition(){
        return permition::all();
    }

    public function updates(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'id' => 'required'
        ]);
        $id = $request->id;
        $user = permition::find($id);

        $data = $request->all();
        
        $user->update($data);
        return response()->json($data);
    }
}
