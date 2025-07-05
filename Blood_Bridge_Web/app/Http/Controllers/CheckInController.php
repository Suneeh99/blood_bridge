<?php

namespace App\Http\Controllers;

use App\Models\BloodDonationDonor;
use App\Models\Eligibility;
use App\Models\Campaign;

use App\Models\EligibilityForm;
use Auth;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index($campaign_id){
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $eligibility = [];
        $donor = Auth::user()->donor;
        $campaign_name = Campaign::where('campaign_id', $campaign_id)->pluck('campaign_name')->first();
        $eligibility = Eligibility::where('campaign_id', $campaign_id)->where('donor_id', $donor->donor_id)->first();

        $existForm = EligibilityForm::where('campaign_id', $campaign_id)->where('donor_id',$donor->donor_id)->exists();

        return view('bloodBridge.Process.checkIn', compact('campaign_name', 'eligibility', 'existForm'));
    }

    public function update($campaign_name){

        $user = Auth::user();

        $campaign_id = Campaign::where('campaign_name', $campaign_name)->pluck('campaign_id');
        BloodDonationDonor::where('campaign_id', $campaign_id)->where('donor_id', $user->donor->donor_id)->update([
            'status' => 'completed'
        ]);
        return redirect()->route('dashboard')->with('success', 'blood Donated Successfully');
    }

    public function reject($campaign_name){

        $user = Auth::user();

        $campaign_id = Campaign::where('campaign_name', $campaign_name)->pluck('campaign_id');
        BloodDonationDonor::where('campaign_id', $campaign_id)->where('donor_id', $user->donor->donor_id)->update([
            'status' => 'failed'
        ]);
        return redirect()->route('dashboard')->with('error', 'blood Donated failed');
    }
}
