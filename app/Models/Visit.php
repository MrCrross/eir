<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'room_id',
        'seance',
        'description'
    ];


    public function  clients(){
        return $this->belongsTo(Client::class);
    }
    public function  rooms(){
        return $this->belongsTo(Room::class);
    }
}
