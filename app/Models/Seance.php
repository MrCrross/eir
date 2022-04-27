<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function workers(){
        return $this->belongsToMany(Worker::class,'worker_seances');
    }

    public function visits(){
        return $this->hasMany(Visit::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }
}
