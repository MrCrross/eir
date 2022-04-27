<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'worker_id',
        'seance',
        'description'
    ];


    public function  client(){
        return $this->belongsTo(Client::class);
    }
    public function  worker(){
        return $this->belongsTo(Worker::class);
    }
}
