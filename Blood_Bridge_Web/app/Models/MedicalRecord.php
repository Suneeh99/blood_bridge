<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $table = 'medical_record';
    
    protected $primaryKey = 'record_id';
    
    protected $fillable = [
        'donor_id', 
        'allergies', 
        'surgeries', 
        'illnesses'
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
