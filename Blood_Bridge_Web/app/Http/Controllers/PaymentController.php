<?php

namespace App\Http\Controllers;
use App\Models\Campaign;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($campaign_id)
    {
        return view('bloodBridge.payment', compact('campaign_id'));
    }

    public function process(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => $request->amount * 100, 
                'currency' => 'lkr',
                'description' => 'Example charge',
                'source' => $request->stripeToken,
            ]);
            $campaign = Campaign::where('campaign_id', $request->campaign_id)->first();

            if ($campaign) {
                $campaign->status = 'ongoing'; 
                $campaign->save();
            }
            return redirect()->route('dashboard')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }
}
