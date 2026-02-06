<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices';
    protected $primaryKey = 'device_id'; 
    public $incrementing = false; 
    protected $keyType = 'string';  
    
    public $timestamps = false;

    protected $fillable = [
        'device_id',
        'device_name',
        'type',
        'whatsapp_number',
        'threshold_temp',
        'threshold_gas',
        'owned_by',
        'created_at'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owned_by', 'user_id');
    }

    public function getStatusLabelAttribute()
    {
        return $this->owned_by ? 'Disewa' : 'Available';
    }

    public function getStatusColorAttribute()
    {
        return $this->owned_by 
            ? 'bg-orange-100 text-orange-600' 
            : 'bg-green-100 text-green-600'; 
    }
}