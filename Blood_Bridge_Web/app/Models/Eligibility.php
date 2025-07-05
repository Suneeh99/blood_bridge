<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligibility extends Model
{
    use HasFactory;

    protected $table = 'eligibility';
    
    protected $primaryKey = null; // Since the primary key is composite
    public $incrementing = false; // Disable auto-incrementing1

    protected $fillable = [
        'donor_id', 
        'campaign_id', 
        'eligibility_1', 
        'eligibility_2'
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public $timestamps = false;
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
