<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'type_class',
        'date_hour'
    ];

    public function users()
    {
        // Un evento puede tener muchos usuarios asistentes
        return $this->belongsToMany(User::class, 'event_user')
            ->withTimestamps();
    }

    public function instructor()
    {
        // El evento pertenece a un usuario que es instructor
        return $this->belongsTo(User::class, 'user_id');
    }
}
