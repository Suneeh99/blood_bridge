<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    
    protected $primaryKey = 'message_id';
    
    protected $fillable = [
        'name', 
        'email', 
        'message'
    ];
    public $timestamps = false;
}
