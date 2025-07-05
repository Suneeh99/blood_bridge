<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaign';

    protected $primaryKey = 'campaign_id';

    protected $fillable = [
        'time', 
        'location', 
        'description', 
        'campaign_name', 
        'status', 
        'date', 
        'organizer_id'
    ];
    public $timestamps = false;

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
}
