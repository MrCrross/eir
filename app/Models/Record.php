<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_id',
        'room_id',
        'seance'
    ];


    public function  clients(){
        return $this->belongsTo(Client::class);
    }
    public function  rooms(){
        return $this->belongsTo(Room::class);
    }
}
