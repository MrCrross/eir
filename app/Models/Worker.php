<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'room_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function seances()
    {
        return $this->belongsToMany(Seance::class, 'worker_seances');
    }

}
