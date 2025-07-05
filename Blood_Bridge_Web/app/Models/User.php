<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    
    protected $primaryKey = 'user_id'; 

    protected $fillable = [
        'username', 
        'password', 
        'user_type', 
        'fname', 
        'lname', 
        'contact'
    ];
    public $timestamps = false;

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'organizer_id');
    }
    public function donor()
    {
        return $this->hasOne(Donor::class, 'user_id');
    }
    protected $hidden = [
        'password', 
    ];
}