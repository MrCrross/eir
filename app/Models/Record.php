<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_id',
        'worker_id',
        'seance_id',
        'day'
    ];


    public function  client(){
        return $this->belongsTo(Client::class);
    }
    public function  seance(){
        return $this->belongsTo(Seance::class);
    }
    public function  worker(){
        return $this->belongsTo(Worker::class);
    }
}
