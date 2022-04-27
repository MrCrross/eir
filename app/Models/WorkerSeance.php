<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerSeance extends Model
{
    use HasFactory;

    protected $fillable=[
        'worker_id',
        'seance_id'
    ];

    public function worker(){
        $this->belongsTo(Worker::class);
    }

    public function seance(){
        $this->belongsTo(Seance::class);
    }

}
