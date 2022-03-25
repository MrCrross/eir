<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'birthday',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function visits(){
        return $this->hasMany(Visit::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }
}
