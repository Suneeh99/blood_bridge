<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonationDonor extends Model
{
    use HasFactory;
    protected $table = 'blood_donation_donor';
    
    protected $primaryKey = 'blood_donor_id';
    
    protected $fillable = [
        'campaign_id', 
        'donor_id'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
    public $timestamps = false;
}
