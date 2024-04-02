<?php

namespace App\Models;

use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;
    protected $table = 'hrms_r1_tables';
    protected $fillable = ['name', 'price',  'guest_number', 'status',];

    protected $cast = [
        'status' => TableStatus::class,
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function table(){
        return $this->belongsTo(Reservation::class, 'id' ,'id');
    }
    
}
