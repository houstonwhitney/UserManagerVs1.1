<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts \ Support;
use Carbon\Carbon;
use App\invitation;

class InvitationController extends Controller
{
    public function ajoutInvitation(Request $request){
        $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'group_id' => 'required'
        ]);
        
        $invitation = new invitation();
        $invitation->sender_id = request('sender_id');
        $invitation->receiver_id = request('receiver_id');
        $invitation->group_id = request('group_id');
        $invitation->isActive = true;
        $invitation->status = 1;

        $invitation->save();

        return response()->json([
            'invitation' => $invitation
        ]);
    }

    
    
    public function findById($id){
        return invitation::find($id);
    }

    public function deleteInv($id){
        $group= invitation::find($id);
        $group->delete();
        return response()->json();
    }
    public function getAllInv(){
        return invitation::all();
    }

    public function accept($id){
        $data = invitation::find($id);
        $data->status = 2;
        $data->answered_at = Carbon::now();
        $data->update($data);
        return response()->json($data);
    }

    public function refuse($id){
        $user = invitation::find($id);
        $user->status = 3;
        $user->answered_at = Carbon::now();
        $user->update($user);
        return response()->json($data);
    }
}
