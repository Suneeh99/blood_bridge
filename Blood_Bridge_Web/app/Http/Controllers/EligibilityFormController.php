<?php

namespace App\Http\Controllers;

use App\Models\Eligibility;
use Illuminate\Http\Request;
use Auth;
use App\Models\Campaign;
use App\Models\EligibilityForm;

class EligibilityFormController extends Controller
{
    public function index($campaign_name)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        return view('bloodBridge.Forms.eligibility', compact('user', 'campaign_name'));
    }

    public function store(Request $request, $campaign_name)
    {
        $user = Auth::user();
        $campaign = Campaign::where('campaign_name', $campaign_name)->first();
        $previousDonation = $request->has('previousDonation') ? 1 : 0;
        $riskBehavior = $request->has('riskBehavior') ? 1 : 0;
        $validId = $request->has('validId') ? 1 : 0;
        $campaign_id = $campaign->campaign_id;

        EligibilityForm::create([
            'donor_id' => $user->donor->donor_id,
            'campaign_id' => $campaign_id,
            'previous_donation' => $previousDonation,
            'chronic_illnesses' => $request->chronicIllnesses,
            'recent_surgeries' => $request->recentSurgeries,
            'current_medications' => $request->currentMedications,
            'allergies' => $request->allergies,
            'blood_transfusion' => $request->bloodTransfusion,
            'smoking_alcohol' => $request->smokingAlcohol,
            'recent_travel' => $request->recentTravel,
            'tattoos_piercings' => $request->tattoosPiercings,
            'risk_behavior' => $riskBehavior,
            'current_symptoms' => $request->currentSymptoms,
            'recent_illnesses' => $request->recentIllnesses,
            'pregnancy_status' => $request->pregnancyStatus,
            'valid_id' => $validId
        ]);$eligibility = Eligibility::where('donor_id', $user->donor->donor_id)
        ->where('campaign_id', $campaign_id)
        ->first();

if (!$eligibility) {
Eligibility::create([
'donor_id' => $user->donor->donor_id,
'campaign_id' => $campaign_id,
]);
}
        return redirect()->route('process.checkin.index', $campaign_id);
    }
}
