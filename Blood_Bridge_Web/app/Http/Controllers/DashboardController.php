<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BloodDonationDonor;
use App\Models\Campaign;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = Auth::user(); 

        $completeCampaignIds = BloodDonationDonor::where('donor_id', $user->donor->donor_id)->where('status', 'completed')->pluck('campaign_id');
        $prevCampaigns = Campaign::whereIn('campaign_id', $completeCampaignIds)->get();

        $donationCount = $prevCampaigns->count();

        $ongoingCampaignIds = BloodDonationDonor::where('donor_id', $user->donor->donor_id)->where('status', 'pending')->pluck('campaign_id');
        $ongoingCampaigns = Campaign::whereIn('campaign_id', $ongoingCampaignIds)->get();

        $pendingOrgCampaign = Campaign::where('organizer_id' , $user->donor->user_id)->where('status', 'pending')->get();
        $acceptedOrgCampaign = Campaign::where('organizer_id' , $user->donor->user_id)->where('status', 'accepted')->first();
        $ongoingOrgCampaign = Campaign::where('organizer_id' , $user->donor->user_id)->where('status', 'ongoing')->get();
        
        return view('bloodBridge.dashboard', compact('user', 'prevCampaigns', 'donationCount', 'ongoingCampaigns', 'pendingOrgCampaign', 'acceptedOrgCampaign', 'ongoingOrgCampaign'));
    }
}

