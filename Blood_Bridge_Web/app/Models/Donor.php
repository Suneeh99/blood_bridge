<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $table = 'donor';
    
    protected $primaryKey = 'donor_id';
    
    protected $fillable = [
        'user_id', 
        'nic', 
        'dob', 
        'email', 
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bloodDonations()
    {
        return $this->hasMany(BloodDonationDonor::class, 'donor_id');
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'donor_id');
    }

    public function eligibilityForms()
    {
        return $this->hasMany(EligibilityForm::class, 'donor_id');
    }

    public function eligibilities()
    {
        return $this->hasMany(Eligibility::class, 'donor_id');
    }
    public $timestamps = false;
}
