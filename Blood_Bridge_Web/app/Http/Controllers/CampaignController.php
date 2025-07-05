<?php

namespace App\Http\Controllers;
use App\Models\BloodDonationDonor;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Auth;

class CampaignController extends Controller
{
    public function index()
    {
        
        $pendingCampaigns = Campaign::where('status', 'ongoing')->with('organizer')->get();

        $locations = $pendingCampaigns->pluck('location')->map(function($location) {
            return strtoupper(substr($location, 0, 1)); // Get the first letter in uppercase
        })->unique()->sort();

        return view('bloodBridge.campaigns', compact('pendingCampaigns', 'locations'));
    }
    public function enroll($campaign_id){

        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();


        
        $ongoingCampaign = BloodDonationDonor::where('donor_id', $user->donor->donor_id)->where('status', 'pending')->get();

        if($ongoingCampaign->count() > 0){
            return redirect()->route('campaigns')->with('error', 'You are rgf enrolled in a campaign');
        }

        $existingEnrollment = BloodDonationDonor::where('campaign_id', $campaign_id)->where('donor_id', $user->donor->donor_id)->first();
        if ($existingEnrollment) {
            return redirect()->back()->with('error', 'You are already enrolled in this campaign.');
        }
        
        BloodDonationDonor::create([
            'campaign_id' => $campaign_id,
            'donor_id' => $user->donor->donor_id
        ]);
        return redirect(route('dashboard'))->with('success','Successfully Enrolled');
        
    }
}