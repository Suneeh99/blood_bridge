<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityForm extends Model
{
    use HasFactory;
    protected $table = 'eligibilityform';
    
    protected $primaryKey = 'form_id';
    
    protected $fillable = [
        'donor_id', 
        'campaign_id',
        'previous_donation',
        'chronic_illnesses',
        'recent_surgeries',
        'current_medications',
        'allergies',
        'blood_transfusion',
        'smoking_alcohol',
        'recent_travel',
        'tattoos_piercings',
        'risk_behavior',
        'current_symptoms',
        'recent_illnesses',
        'pregnancy_status',
        'valid_id'
    ];

    public $timestamps = false;

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
