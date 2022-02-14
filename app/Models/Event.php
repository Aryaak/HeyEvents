<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discussion;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'photo',
        'name',
        'address',
        'description',
        'quota',
        'date',
        'price',
        'slug',
        'status_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(EventStatus::class);
    }
    
    public function reports()
    {
        return $this->hasMany(EventReport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('status_id', 'document');
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
