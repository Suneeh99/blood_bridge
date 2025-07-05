<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Auth;

class CampaignRequestController extends Controller
{
    public function index(){
        return view('bloodBridge.Forms.campaignRequest');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $user = Auth::user();
        Campaign::create([
            'campaign_name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'description' => $request->description,
            'organizer_id' => $user->user_id
        ]);

        return redirect()->route('dashboard')->with('success', 'Campaign Request Sent');

    }
}
