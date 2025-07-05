<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CustomizeCampaignController extends Controller
{
    public function index($campaign_id){
        $campaign = Campaign::findOrFail($campaign_id);

        return view('bloodBridge.Forms.customizeCampaign', compact('campaign'));
    }
    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $campaign = Campaign::findOrFail($request->input('id'));

        $campaign->campaign_name = $request->input('name');
        $campaign->date = $request->input('date');
        $campaign->time = $request->input('time');
        $campaign->location = $request->input('location');
        $campaign->description = $request->input('description');

        $campaign->save();

        return redirect()->route('dashboard')->with('success', 'updated successfully');
    }
}
