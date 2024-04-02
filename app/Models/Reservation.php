<?php

namespace App\Models;

use App\Models\Table;
use App\Enums\TableLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'hrms_r1_reservations';
    protected $fillable = [
        'name', 
        'email', 
        'tel_number', 
        'res_date', 
        'table_id', 
        'guest_number', 
        'location',
        'payment_status'
    ];

    protected $cast = [
        'location' => TableLocation::class,
    ];
    protected $dates = [
        'res_date'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'id', 'id');
    }
}
