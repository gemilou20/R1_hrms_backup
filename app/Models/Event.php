<?php

namespace App\Models;

use App\Enums\EventType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table  = 'hrms_r1_events';
    protected $fillable = [
        'name', 
        'email', 
        'tel_number', 
        'res_date', 
        'guest_number', 
        'event_type', 
        'other_request',
        'payment_status', 
        'downpayment'
    ];

    protected $cast = [
        'event_type' => EventType::class,
    ];

    protected $dates = [
        'res_date'
    ];

    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
